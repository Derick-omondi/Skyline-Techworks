-- Skyline Techworks Database Schema
-- Create database
CREATE DATABASE IF NOT EXISTS skyline_techworks;
USE skyline_techworks;

-- Blog posts table
CREATE TABLE blog_posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    excerpt TEXT,
    author VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    status ENUM('draft', 'published') DEFAULT 'published'
);

-- Contact messages table
CREATE TABLE contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('new', 'read', 'replied') DEFAULT 'new'
);

-- Admin users table
CREATE TABLE admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample blog posts
INSERT INTO blog_posts (title, content, excerpt, author, status) VALUES
('Welcome to Skyline Techworks', 'We are excited to launch our new website and share our journey in the tech industry. At Skyline Techworks, we believe in pushing boundaries and delivering innovative solutions that transform businesses.', 'We are excited to launch our new website and share our journey in the tech industry.', 'Admin', 'published'),
('The Future of Web Development', 'Web development is evolving rapidly with new frameworks, tools, and methodologies. In this post, we explore the latest trends and how they can benefit your business.', 'Web development is evolving rapidly with new frameworks, tools, and methodologies.', 'Admin', 'published'),
('Digital Transformation: A Complete Guide', 'Digital transformation is no longer optional for businesses. Learn how to successfully navigate this journey with our comprehensive guide.', 'Digital transformation is no longer optional for businesses.', 'Admin', 'published');

-- Insert default admin user (password: admin123)
INSERT INTO admin_users (username, password, email) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin@skyline-techworks.com');
