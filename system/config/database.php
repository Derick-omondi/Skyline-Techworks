<?php
/**
 * Database Configuration
 * Skyline Techworks
 */

// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'skyline_techworks');
define('DB_USER', 'root');
define('DB_PASS', '');

// Create database connection
function getDBConnection() {
    try {
        $pdo = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
            DB_USER,
            DB_PASS,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]
        );
        return $pdo;
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
}

// Email configuration
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USERNAME', 'your-email@gmail.com'); // Change this to your email
define('SMTP_PASSWORD', 'your-app-password'); // Change this to your app password
define('FROM_EMAIL', 'noreply@skyline-techworks.com');
define('FROM_NAME', 'Skyline Techworks');
?>
