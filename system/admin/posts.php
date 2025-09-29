<?php
require_once 'auth-check.php';
include '../config/database.php';

$success_message = '';
$error_message = '';

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'] ?? '';
    
    if ($action == 'create' || $action == 'update') {
        $title = trim($_POST['title'] ?? '');
        $content = trim($_POST['content'] ?? '');
        $excerpt = trim($_POST['excerpt'] ?? '');
        $author = trim($_POST['author'] ?? '');
        $status = $_POST['status'] ?? 'draft';
        $post_id = $_POST['post_id'] ?? null;
        
        // Validation
        if (empty($title) || empty($content) || empty($author)) {
            $error_message = 'Title, content, and author are required.';
        } else {
            try {
                $pdo = getDBConnection();
                
                if ($action == 'create') {
                    $stmt = $pdo->prepare("
                        INSERT INTO blog_posts (title, content, excerpt, author, status) 
                        VALUES (:title, :content, :excerpt, :author, :status)
                    ");
                } else {
                    $stmt = $pdo->prepare("
                        UPDATE blog_posts 
                        SET title = :title, content = :content, excerpt = :excerpt, 
                            author = :author, status = :status, updated_at = CURRENT_TIMESTAMP 
                        WHERE id = :id
                    ");
                    $stmt->bindValue(':id', $post_id, PDO::PARAM_INT);
                }
                
                $stmt->bindValue(':title', $title, PDO::PARAM_STR);
                $stmt->bindValue(':content', $content, PDO::PARAM_STR);
                $stmt->bindValue(':excerpt', $excerpt, PDO::PARAM_STR);
                $stmt->bindValue(':author', $author, PDO::PARAM_STR);
                $stmt->bindValue(':status', $status, PDO::PARAM_STR);
                
                if ($stmt->execute()) {
                    $success_message = $action == 'create' ? 'Blog post created successfully!' : 'Blog post updated successfully!';
                } else {
                    $error_message = 'Failed to save blog post.';
                }
            } catch (PDOException $e) {
                $error_message = 'Database error: ' . $e->getMessage();
            }
        }
    } elseif ($action == 'delete') {
        $post_id = $_POST['post_id'] ?? null;
        
        if ($post_id) {
            try {
                $pdo = getDBConnection();
                $stmt = $pdo->prepare("DELETE FROM blog_posts WHERE id = :id");
                $stmt->bindValue(':id', $post_id, PDO::PARAM_INT);
                
                if ($stmt->execute()) {
                    $success_message = 'Blog post deleted successfully!';
                } else {
                    $error_message = 'Failed to delete blog post.';
                }
            } catch (PDOException $e) {
                $error_message = 'Database error: ' . $e->getMessage();
            }
        }
    }
}

// Get posts for listing
try {
    $pdo = getDBConnection();
    $stmt = $pdo->query("
        SELECT id, title, author, status, created_at, updated_at 
        FROM blog_posts 
        ORDER BY created_at DESC
    ");
    $posts = $stmt->fetchAll();
} catch (PDOException $e) {
    $posts = [];
}

// Get post for editing
$edit_post = null;
if (isset($_GET['edit'])) {
    $edit_id = (int)$_GET['edit'];
    try {
        $pdo = getDBConnection();
        $stmt = $pdo->prepare("SELECT * FROM blog_posts WHERE id = :id");
        $stmt->bindValue(':id', $edit_id, PDO::PARAM_INT);
        $stmt->execute();
        $edit_post = $stmt->fetch();
    } catch (PDOException $e) {
        $edit_post = null;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Blog Posts - Skyline Techworks</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: white;
        }
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 12px 20px;
            border-radius: 8px;
            margin: 2px 0;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }
        .main-content {
            padding: 2rem;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar p-0">
                <div class="p-3">
                    <h4 class="fw-bold mb-4">
                        <i class="fas fa-rocket me-2"></i>Skyline Techworks
                    </h4>
                </div>
                
                <nav class="nav flex-column px-3">
                    <a class="nav-link" href="dashboard.php">
                        <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                    </a>
                    <a class="nav-link active" href="posts.php">
                        <i class="fas fa-edit me-2"></i>Blog Posts
                    </a>
                    <a class="nav-link" href="messages.php">
                        <i class="fas fa-envelope me-2"></i>Messages
                    </a>
                    <a class="nav-link" href="../index.php" target="_blank">
                        <i class="fas fa-external-link-alt me-2"></i>View Website
                    </a>
                    <hr class="my-3">
                    <a class="nav-link" href="logout.php">
                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                    </a>
                </nav>
            </div>
            
            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 main-content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h3 fw-bold">Manage Blog Posts</h1>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#postModal">
                        <i class="fas fa-plus me-2"></i>New Post
                    </button>
                </div>
                
                <?php if ($success_message): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    <?php echo $success_message; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                <?php endif; ?>
                
                <?php if ($error_message): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <?php echo $error_message; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                <?php endif; ?>
                
                <!-- Posts Table -->
                <div class="card">
                    <div class="card-body">
                        <?php if (empty($posts)): ?>
                        <div class="text-center py-5">
                            <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">No blog posts yet</h5>
                            <p class="text-muted">Create your first blog post to get started.</p>
                        </div>
                        <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($posts as $post): ?>
                                    <tr>
                                        <td>
                                            <strong><?php echo htmlspecialchars($post['title']); ?></strong>
                                        </td>
                                        <td><?php echo htmlspecialchars($post['author']); ?></td>
                                        <td>
                                            <span class="badge bg-<?php echo $post['status'] == 'published' ? 'success' : 'warning'; ?>">
                                                <?php echo ucfirst($post['status']); ?>
                                            </span>
                                        </td>
                                        <td><?php echo date('M j, Y', strtotime($post['created_at'])); ?></td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <a href="?edit=<?php echo $post['id']; ?>" class="btn btn-outline-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="../blog-post.php?id=<?php echo $post['id']; ?>" target="_blank" class="btn btn-outline-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <button class="btn btn-outline-danger" onclick="deletePost(<?php echo $post['id']; ?>)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Post Modal -->
    <div class="modal fade" id="postModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="POST" action="">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <?php echo $edit_post ? 'Edit Post' : 'Create New Post'; ?>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="action" value="<?php echo $edit_post ? 'update' : 'create'; ?>">
                        <?php if ($edit_post): ?>
                        <input type="hidden" name="post_id" value="<?php echo $edit_post['id']; ?>">
                        <?php endif; ?>
                        
                        <div class="mb-3">
                            <label for="title" class="form-label">Title *</label>
                            <input type="text" class="form-control" id="title" name="title" 
                                   value="<?php echo htmlspecialchars($edit_post['title'] ?? ''); ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="author" class="form-label">Author *</label>
                            <input type="text" class="form-control" id="author" name="author" 
                                   value="<?php echo htmlspecialchars($edit_post['author'] ?? ''); ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="excerpt" class="form-label">Excerpt</label>
                            <textarea class="form-control" id="excerpt" name="excerpt" rows="3"><?php echo htmlspecialchars($edit_post['excerpt'] ?? ''); ?></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="content" class="form-label">Content *</label>
                            <textarea class="form-control" id="content" name="content" rows="10" required><?php echo htmlspecialchars($edit_post['content'] ?? ''); ?></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="draft" <?php echo ($edit_post['status'] ?? 'draft') == 'draft' ? 'selected' : ''; ?>>Draft</option>
                                <option value="published" <?php echo ($edit_post['status'] ?? '') == 'published' ? 'selected' : ''; ?>>Published</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            <?php echo $edit_post ? 'Update Post' : 'Create Post'; ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Delete Form -->
    <form id="deleteForm" method="POST" style="display: none;">
        <input type="hidden" name="action" value="delete">
        <input type="hidden" name="post_id" id="deletePostId">
    </form>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function deletePost(postId) {
            if (confirm('Are you sure you want to delete this post?')) {
                document.getElementById('deletePostId').value = postId;
                document.getElementById('deleteForm').submit();
            }
        }
        
        // Show modal if editing
        <?php if ($edit_post): ?>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = new bootstrap.Modal(document.getElementById('postModal'));
            modal.show();
        });
        <?php endif; ?>
    </script>
</body>
</html>
