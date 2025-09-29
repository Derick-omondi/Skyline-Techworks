<?php
session_start();
$page_title = "Blog";
include 'config/database.php';

// Get page number from URL, default to 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$posts_per_page = 6;
$offset = ($page - 1) * $posts_per_page;

try {
    $pdo = getDBConnection();
    
    // Get total number of published posts
    $count_stmt = $pdo->prepare("SELECT COUNT(*) FROM blog_posts WHERE status = 'published'");
    $count_stmt->execute();
    $total_posts = $count_stmt->fetchColumn();
    $total_pages = ceil($total_posts / $posts_per_page);
    
    // Get posts for current page
    $stmt = $pdo->prepare("
        SELECT id, title, excerpt, author, created_at 
        FROM blog_posts 
        WHERE status = 'published' 
        ORDER BY created_at DESC 
        LIMIT :limit OFFSET :offset
    ");
    $stmt->bindValue(':limit', $posts_per_page, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $posts = $stmt->fetchAll();
    
} catch (PDOException $e) {
    $posts = [];
    $total_pages = 0;
    $error_message = "Unable to load blog posts. Please try again later.";
}

include 'includes/header.php';
?>

<!-- Page Header -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">Our Blog</h1>
                <p class="lead">Insights, tips, and updates from the world of technology</p>
            </div>
        </div>
    </div>
</section>

<!-- Blog Posts -->
<section class="py-5">
    <div class="container">
        <?php if (isset($error_message)): ?>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="alert alert-danger text-center">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <?php echo htmlspecialchars($error_message); ?>
                </div>
            </div>
        </div>
        <?php elseif (empty($posts)): ?>
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <div class="empty-state">
                    <i class="fas fa-newspaper fa-3x text-muted mb-4"></i>
                    <h3 class="fw-bold mb-3">No Posts Yet</h3>
                    <p class="text-muted">Check back soon for our latest insights and updates!</p>
                </div>
            </div>
        </div>
        <?php else: ?>
        <div class="row g-4">
            <?php foreach ($posts as $post): ?>
            <div class="col-lg-4 col-md-6">
                <article class="blog-card h-100">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="blog-meta mb-3">
                                <span class="badge bg-primary me-2">
                                    <i class="fas fa-calendar me-1"></i>
                                    <?php echo date('M j, Y', strtotime($post['created_at'])); ?>
                                </span>
                                <span class="badge bg-secondary">
                                    <i class="fas fa-user me-1"></i>
                                    <?php echo htmlspecialchars($post['author']); ?>
                                </span>
                            </div>
                            
                            <h3 class="card-title fw-bold mb-3">
                                <a href="blog-post.php?id=<?php echo $post['id']; ?>" class="text-decoration-none text-dark">
                                    <?php echo htmlspecialchars($post['title']); ?>
                                </a>
                            </h3>
                            
                            <p class="card-text text-muted mb-4">
                                <?php 
                                $excerpt = $post['excerpt'] ?: substr(strip_tags($post['content']), 0, 150) . '...';
                                echo htmlspecialchars($excerpt);
                                ?>
                            </p>
                            
                            <a href="blog-post.php?id=<?php echo $post['id']; ?>" class="btn btn-outline-primary">
                                Read More <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </article>
            </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Pagination -->
        <?php if ($total_pages > 1): ?>
        <div class="row mt-5">
            <div class="col-lg-8 mx-auto">
                <nav aria-label="Blog pagination">
                    <ul class="pagination justify-content-center">
                        <?php if ($page > 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?php echo $page - 1; ?>">
                                <i class="fas fa-chevron-left"></i> Previous
                            </a>
                        </li>
                        <?php endif; ?>
                        
                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                        <?php endfor; ?>
                        
                        <?php if ($page < $total_pages): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?php echo $page + 1; ?>">
                                Next <i class="fas fa-chevron-right"></i>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
        <?php endif; ?>
        <?php endif; ?>
    </div>
</section>

<!-- Newsletter Signup -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h3 class="fw-bold mb-3">Stay Updated</h3>
                <p class="text-muted mb-4">Subscribe to our newsletter for the latest technology insights and updates.</p>
                
                <form class="newsletter-form" method="POST" action="newsletter-signup.php">
                    <div class="row g-3 justify-content-center">
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" placeholder="Enter your email address" required>
                        </div>
                        <div class="col-md-auto">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-envelope me-2"></i>Subscribe
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
