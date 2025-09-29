<?php
// Newsletter signup handler
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
    $email = trim($_POST['email']);
    
    // Basic email validation
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // In a real application, you would:
        // 1. Add the email to a newsletter subscribers table
        // 2. Send a confirmation email
        // 3. Integrate with an email marketing service
        
        // For now, we'll just redirect back with a success message
        $_SESSION['newsletter_success'] = 'Thank you for subscribing to our newsletter!';
    } else {
        $_SESSION['newsletter_error'] = 'Please enter a valid email address.';
    }
}

// Redirect back to the referring page
$referer = $_SERVER['HTTP_REFERER'] ?? 'index.php';
header('Location: ' . $referer);
exit;
?>
