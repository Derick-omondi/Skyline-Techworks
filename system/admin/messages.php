<?php
require_once 'auth-check.php';
include '../config/database.php';

$success_message = '';
$error_message = '';

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'] ?? '';
    
    if ($action == 'update_status') {
        $message_id = $_POST['message_id'] ?? null;
        $status = $_POST['status'] ?? '';
        
        if ($message_id && in_array($status, ['new', 'read', 'replied'])) {
            try {
                $pdo = getDBConnection();
                $stmt = $pdo->prepare("UPDATE contact_messages SET status = :status WHERE id = :id");
                $stmt->bindValue(':status', $status, PDO::PARAM_STR);
                $stmt->bindValue(':id', $message_id, PDO::PARAM_INT);
                
                if ($stmt->execute()) {
                    $success_message = 'Message status updated successfully!';
                } else {
                    $error_message = 'Failed to update message status.';
                }
            } catch (PDOException $e) {
                $error_message = 'Database error: ' . $e->getMessage();
            }
        }
    } elseif ($action == 'delete') {
        $message_id = $_POST['message_id'] ?? null;
        
        if ($message_id) {
            try {
                $pdo = getDBConnection();
                $stmt = $pdo->prepare("DELETE FROM contact_messages WHERE id = :id");
                $stmt->bindValue(':id', $message_id, PDO::PARAM_INT);
                
                if ($stmt->execute()) {
                    $success_message = 'Message deleted successfully!';
                } else {
                    $error_message = 'Failed to delete message.';
                }
            } catch (PDOException $e) {
                $error_message = 'Database error: ' . $e->getMessage();
            }
        }
    }
}

// Get messages
try {
    $pdo = getDBConnection();
    $stmt = $pdo->query("
        SELECT id, name, email, subject, message, status, created_at 
        FROM contact_messages 
        ORDER BY created_at DESC
    ");
    $messages = $stmt->fetchAll();
} catch (PDOException $e) {
    $messages = [];
}

// Get message for viewing
$view_message = null;
if (isset($_GET['view'])) {
    $view_id = (int)$_GET['view'];
    try {
        $pdo = getDBConnection();
        $stmt = $pdo->prepare("SELECT * FROM contact_messages WHERE id = :id");
        $stmt->bindValue(':id', $view_id, PDO::PARAM_INT);
        $stmt->execute();
        $view_message = $stmt->fetch();
        
        // Mark as read if it's new
        if ($view_message && $view_message['status'] == 'new') {
            $update_stmt = $pdo->prepare("UPDATE contact_messages SET status = 'read' WHERE id = :id");
            $update_stmt->bindValue(':id', $view_id, PDO::PARAM_INT);
            $update_stmt->execute();
            $view_message['status'] = 'read';
        }
    } catch (PDOException $e) {
        $view_message = null;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Messages - Skyline Techworks</title>
    
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
        .message-card {
            border-left: 4px solid #dee2e6;
        }
        .message-card.new {
            border-left-color: #dc3545;
        }
        .message-card.read {
            border-left-color: #6c757d;
        }
        .message-card.replied {
            border-left-color: #28a745;
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
                    <a class="nav-link" href="posts.php">
                        <i class="fas fa-edit me-2"></i>Blog Posts
                    </a>
                    <a class="nav-link active" href="messages.php">
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
                    <h1 class="h3 fw-bold">Manage Messages</h1>
                    <div class="text-muted">
                        Total: <?php echo count($messages); ?> messages
                    </div>
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
                
                <div class="row">
                    <!-- Messages List -->
                    <div class="col-lg-8">
                        <?php if (empty($messages)): ?>
                        <div class="text-center py-5">
                            <i class="fas fa-envelope fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">No messages yet</h5>
                            <p class="text-muted">Messages from your contact form will appear here.</p>
                        </div>
                        <?php else: ?>
                        <div class="messages-list">
                            <?php foreach ($messages as $message): ?>
                            <div class="card message-card <?php echo $message['status']; ?> mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="flex-grow-1">
                                            <h6 class="fw-bold mb-1">
                                                <a href="?view=<?php echo $message['id']; ?>" class="text-decoration-none">
                                                    <?php echo htmlspecialchars($message['subject']); ?>
                                                </a>
                                            </h6>
                                            <p class="text-muted mb-1">
                                                <i class="fas fa-user me-1"></i>
                                                <?php echo htmlspecialchars($message['name']); ?> 
                                                <span class="mx-2">•</span>
                                                <i class="fas fa-envelope me-1"></i>
                                                <?php echo htmlspecialchars($message['email']); ?>
                                            </p>
                                            <p class="text-muted small mb-0">
                                                <i class="fas fa-clock me-1"></i>
                                                <?php echo date('M j, Y g:i A', strtotime($message['created_at'])); ?>
                                            </p>
                                        </div>
                                        <div class="text-end">
                                            <span class="badge bg-<?php 
                                                echo $message['status'] == 'new' ? 'danger' : 
                                                    ($message['status'] == 'read' ? 'secondary' : 'success'); 
                                            ?> mb-2">
                                                <?php echo ucfirst($message['status']); ?>
                                            </span>
                                            <div class="btn-group btn-group-sm">
                                                <a href="?view=<?php echo $message['id']; ?>" class="btn btn-outline-primary">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <button class="btn btn-outline-danger" onclick="deleteMessage(<?php echo $message['id']; ?>)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Message Detail -->
                    <div class="col-lg-4">
                        <?php if ($view_message): ?>
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="fw-bold mb-0">Message Details</h5>
                                <a href="messages.php" class="btn btn-sm btn-outline-secondary">
                                    <i class="fas fa-times"></i>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <h6 class="fw-bold">Subject</h6>
                                    <p class="mb-0"><?php echo htmlspecialchars($view_message['subject']); ?></p>
                                </div>
                                
                                <div class="mb-3">
                                    <h6 class="fw-bold">From</h6>
                                    <p class="mb-1"><?php echo htmlspecialchars($view_message['name']); ?></p>
                                    <p class="mb-0">
                                        <a href="mailto:<?php echo htmlspecialchars($view_message['email']); ?>" class="text-decoration-none">
                                            <?php echo htmlspecialchars($view_message['email']); ?>
                                        </a>
                                    </p>
                                </div>
                                
                                <div class="mb-3">
                                    <h6 class="fw-bold">Date</h6>
                                    <p class="mb-0"><?php echo date('M j, Y g:i A', strtotime($view_message['created_at'])); ?></p>
                                </div>
                                
                                <div class="mb-3">
                                    <h6 class="fw-bold">Message</h6>
                                    <div class="message-content">
                                        <?php echo nl2br(htmlspecialchars($view_message['message'])); ?>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <h6 class="fw-bold">Status</h6>
                                    <form method="POST" class="d-inline">
                                        <input type="hidden" name="action" value="update_status">
                                        <input type="hidden" name="message_id" value="<?php echo $view_message['id']; ?>">
                                        <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                            <option value="new" <?php echo $view_message['status'] == 'new' ? 'selected' : ''; ?>>New</option>
                                            <option value="read" <?php echo $view_message['status'] == 'read' ? 'selected' : ''; ?>>Read</option>
                                            <option value="replied" <?php echo $view_message['status'] == 'replied' ? 'selected' : ''; ?>>Replied</option>
                                        </select>
                                    </form>
                                </div>
                                
                                <div class="d-grid gap-2">
                                    <a href="mailto:<?php echo htmlspecialchars($view_message['email']); ?>?subject=Re: <?php echo urlencode($view_message['subject']); ?>" 
                                       class="btn btn-primary">
                                        <i class="fas fa-reply me-2"></i>Reply
                                    </a>
                                    <button class="btn btn-outline-danger" onclick="deleteMessage(<?php echo $view_message['id']; ?>)">
                                        <i class="fas fa-trash me-2"></i>Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="card">
                            <div class="card-body text-center py-5">
                                <i class="fas fa-envelope-open fa-3x text-muted mb-3"></i>
                                <h5 class="text-muted">Select a message to view details</h5>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Delete Form -->
    <form id="deleteForm" method="POST" style="display: none;">
        <input type="hidden" name="action" value="delete">
        <input type="hidden" name="message_id" id="deleteMessageId">
    </form>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function deleteMessage(messageId) {
            if (confirm('Are you sure you want to delete this message?')) {
                document.getElementById('deleteMessageId').value = messageId;
                document.getElementById('deleteForm').submit();
            }
        }
    </script>
</body>
</html>
