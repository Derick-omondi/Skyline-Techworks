<?php
session_start();
include 'config/database.php';

// Get post ID from URL
$post_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if (!$post_id) {
    header('Location: blog.php');
    exit;
}

try {
    $pdo = getDBConnection();
    
    // Get the specific blog post
    $stmt = $pdo->prepare("
        SELECT id, title, content, author, created_at, updated_at 
        FROM blog_posts 
        WHERE id = :id AND status = 'published'
    ");
    $stmt->bindValue(':id', $post_id, PDO::PARAM_INT);
    $stmt->execute();
    $post = $stmt->fetch();
    
    if (!$post) {
        header('Location: blog.php');
        exit;
    }
    
    // Get related posts (same author or recent posts)
    $related_stmt = $pdo->prepare("
        SELECT id, title, excerpt, created_at 
        FROM blog_posts 
        WHERE status = 'published' AND id != :id 
        ORDER BY created_at DESC 
        LIMIT 3
    ");
    $related_stmt->bindValue(':id', $post_id, PDO::PARAM_INT);
    $related_stmt->execute();
    $related_posts = $related_stmt->fetchAll();
    
} catch (PDOException $e) {
    header('Location: blog.php');
    exit;
}

$page_title = $post['title'];
include 'includes/header.php';
?>

<!-- Blog Post Content -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Home</a></li>
                        <li class="breadcrumb-item"><a href="blog.php" class="text-decoration-none">Blog</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($post['title']); ?></li>
                    </ol>
                </nav>
                
                <!-- Post Header -->
                <header class="blog-post-header mb-5">
                    <h1 class="display-5 fw-bold mb-3"><?php echo htmlspecialchars($post['title']); ?></h1>
                    
                    <div class="blog-meta mb-4">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="author-info d-flex align-items-center">
                                    <i class="fas fa-user-circle fa-2x text-primary me-3"></i>
                                    <div>
                                        <h6 class="fw-bold mb-0"><?php echo htmlspecialchars($post['author']); ?></h6>
                                        <small class="text-muted">Author</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="post-dates text-md-end">
                                    <p class="text-muted mb-1">
                                        <i class="fas fa-calendar me-2"></i>
                                        Published: <?php echo date('F j, Y', strtotime($post['created_at'])); ?>
                                    </p>
                                    <?php if ($post['updated_at'] != $post['created_at']): ?>
                                    <p class="text-muted mb-0">
                                        <i class="fas fa-edit me-2"></i>
                                        Updated: <?php echo date('F j, Y', strtotime($post['updated_at'])); ?>
                                    </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <hr class="my-4">
                </header>
                
                <!-- Post Content -->
                <article class="blog-post-content">
                    <div class="post-content">
                        <?php 
                        // Convert line breaks to HTML paragraphs
                        $content = nl2br(htmlspecialchars($post['content']));
                        echo $content;
                        ?>
                    </div>
                </article>
                
                <!-- Post Footer -->
                <footer class="blog-post-footer mt-5">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="social-share">
                                <h6 class="fw-bold mb-3">Share this post:</h6>
                                <div class="social-buttons">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>" 
                                       target="_blank" class="btn btn-outline-primary btn-sm me-2">
                                        <i class="fab fa-facebook-f me-1"></i>Facebook
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>&text=<?php echo urlencode($post['title']); ?>" 
                                       target="_blank" class="btn btn-outline-info btn-sm me-2">
                                        <i class="fab fa-twitter me-1"></i>Twitter
                                    </a>
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>" 
                                       target="_blank" class="btn btn-outline-primary btn-sm">
                                        <i class="fab fa-linkedin-in me-1"></i>LinkedIn
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <a href="blog.php" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Back to Blog
                            </a>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</section>

<!-- Related Posts -->
<?php if (!empty($related_posts)): ?>
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h3 class="fw-bold mb-4">Related Posts</h3>
                <div class="row g-4">
                    <?php foreach ($related_posts as $related_post): ?>
                    <div class="col-md-4">
                        <div class="related-post-card">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body p-4">
                                    <div class="related-meta mb-2">
                                        <small class="text-muted">
                                            <i class="fas fa-calendar me-1"></i>
                                            <?php echo date('M j, Y', strtotime($related_post['created_at'])); ?>
                                        </small>
                                    </div>
                                    <h5 class="card-title fw-bold">
                                        <a href="blog-post.php?id=<?php echo $related_post['id']; ?>" class="text-decoration-none text-dark">
                                            <?php echo htmlspecialchars($related_post['title']); ?>
                                        </a>
                                    </h5>
                                    <p class="card-text text-muted small">
                                        <?php 
                                        $excerpt = $related_post['excerpt'] ?: substr(strip_tags($related_post['content']), 0, 100) . '...';
                                        echo htmlspecialchars($excerpt);
                                        ?>
                                    </p>
                                    <a href="blog-post.php?id=<?php echo $related_post['id']; ?>" class="btn btn-outline-primary btn-sm">
                                        Read More
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Newsletter Signup -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h3 class="fw-bold mb-3">Enjoyed This Post?</h3>
                <p class="text-muted mb-4">Subscribe to our newsletter for more insights and updates from Skyline Techworks.</p>
                
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
