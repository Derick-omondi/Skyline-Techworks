<?php
require_once 'auth-check.php';
include '../config/database.php';

try {
    $pdo = getDBConnection();
    
    // Get statistics
    $stats = [];
    
    // Total blog posts
    $stmt = $pdo->query("SELECT COUNT(*) FROM blog_posts");
    $stats['total_posts'] = $stmt->fetchColumn();
    
    // Published posts
    $stmt = $pdo->query("SELECT COUNT(*) FROM blog_posts WHERE status = 'published'");
    $stats['published_posts'] = $stmt->fetchColumn();
    
    // Draft posts
    $stmt = $pdo->query("SELECT COUNT(*) FROM blog_posts WHERE status = 'draft'");
    $stats['draft_posts'] = $stmt->fetchColumn();
    
    // Total messages
    $stmt = $pdo->query("SELECT COUNT(*) FROM contact_messages");
    $stats['total_messages'] = $stmt->fetchColumn();
    
    // New messages
    $stmt = $pdo->query("SELECT COUNT(*) FROM contact_messages WHERE status = 'new'");
    $stats['new_messages'] = $stmt->fetchColumn();
    
    // Recent posts
    $stmt = $pdo->query("
        SELECT id, title, author, created_at, status 
        FROM blog_posts 
        ORDER BY created_at DESC 
        LIMIT 5
    ");
    $recent_posts = $stmt->fetchAll();
    
    // Recent messages
    $stmt = $pdo->query("
        SELECT id, name, email, subject, created_at, status 
        FROM contact_messages 
        ORDER BY created_at DESC 
        LIMIT 5
    ");
    $recent_messages = $stmt->fetchAll();
    
} catch (PDOException $e) {
    $stats = [
        'total_posts' => 0,
        'published_posts' => 0,
        'draft_posts' => 0,
        'total_messages' => 0,
        'new_messages' => 0
    ];
    $recent_posts = [];
    $recent_messages = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Skyline Techworks</title>
    
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
        .stat-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .stat-card:hover {
            transform: translateY(-2px);
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
                    <a class="nav-link active" href="dashboard.php">
                        <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                    </a>
                    <a class="nav-link" href="posts.php">
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
                    <h1 class="h3 fw-bold">Dashboard</h1>
                    <div class="text-muted">
                        Welcome back, <?php echo htmlspecialchars($_SESSION['admin_username']); ?>!
                    </div>
                </div>
                
                <!-- Statistics Cards -->
                <div class="row g-4 mb-5">
                    <div class="col-md-6 col-lg-3">
                        <div class="stat-card p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-newspaper fa-2x text-primary"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h3 class="fw-bold mb-0"><?php echo $stats['total_posts']; ?></h3>
                                    <p class="text-muted mb-0">Total Posts</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-3">
                        <div class="stat-card p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-check-circle fa-2x text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h3 class="fw-bold mb-0"><?php echo $stats['published_posts']; ?></h3>
                                    <p class="text-muted mb-0">Published</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-3">
                        <div class="stat-card p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-edit fa-2x text-warning"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h3 class="fw-bold mb-0"><?php echo $stats['draft_posts']; ?></h3>
                                    <p class="text-muted mb-0">Drafts</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-3">
                        <div class="stat-card p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-envelope fa-2x text-info"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h3 class="fw-bold mb-0"><?php echo $stats['new_messages']; ?></h3>
                                    <p class="text-muted mb-0">New Messages</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Recent Activity -->
                <div class="row g-4">
                    <!-- Recent Posts -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="fw-bold mb-0">Recent Blog Posts</h5>
                                <a href="posts.php" class="btn btn-sm btn-outline-primary">View All</a>
                            </div>
                            <div class="card-body">
                                <?php if (empty($recent_posts)): ?>
                                <p class="text-muted text-center py-3">No posts yet.</p>
                                <?php else: ?>
                                <div class="list-group list-group-flush">
                                    <?php foreach ($recent_posts as $post): ?>
                                    <div class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <h6 class="mb-1"><?php echo htmlspecialchars($post['title']); ?></h6>
                                            <small class="text-muted">
                                                by <?php echo htmlspecialchars($post['author']); ?> • 
                                                <?php echo date('M j, Y', strtotime($post['created_at'])); ?>
                                            </small>
                                        </div>
                                        <span class="badge bg-<?php echo $post['status'] == 'published' ? 'success' : 'warning'; ?>">
                                            <?php echo ucfirst($post['status']); ?>
                                        </span>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Recent Messages -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="fw-bold mb-0">Recent Messages</h5>
                                <a href="messages.php" class="btn btn-sm btn-outline-primary">View All</a>
                            </div>
                            <div class="card-body">
                                <?php if (empty($recent_messages)): ?>
                                <p class="text-muted text-center py-3">No messages yet.</p>
                                <?php else: ?>
                                <div class="list-group list-group-flush">
                                    <?php foreach ($recent_messages as $message): ?>
                                    <div class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <h6 class="mb-1"><?php echo htmlspecialchars($message['subject']); ?></h6>
                                            <small class="text-muted">
                                                from <?php echo htmlspecialchars($message['name']); ?> • 
                                                <?php echo date('M j, Y', strtotime($message['created_at'])); ?>
                                            </small>
                                        </div>
                                        <span class="badge bg-<?php echo $message['status'] == 'new' ? 'danger' : 'secondary'; ?>">
                                            <?php echo ucfirst($message['status']); ?>
                                        </span>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Actions -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="fw-bold mb-0">Quick Actions</h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <a href="posts.php?action=create" class="btn btn-primary w-100">
                                            <i class="fas fa-plus me-2"></i>New Blog Post
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="messages.php" class="btn btn-info w-100">
                                            <i class="fas fa-envelope me-2"></i>View Messages
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="posts.php" class="btn btn-success w-100">
                                            <i class="fas fa-edit me-2"></i>Manage Posts
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="../index.php" target="_blank" class="btn btn-outline-primary w-100">
                                            <i class="fas fa-external-link-alt me-2"></i>View Website
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
