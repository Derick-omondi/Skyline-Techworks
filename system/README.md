# Skyline Techworks - Responsive PHP Website

A modern, responsive website for a technology agency built with PHP, HTML, CSS, JavaScript, and MySQL.

## 🚀 Features

- **Responsive Design**: Works perfectly on desktop, tablet, and mobile devices
- **Modern UI/UX**: Clean, professional design with smooth animations
- **Blog System**: Full-featured blog with database integration
- **Contact Form**: Email notifications and database storage
- **Admin Panel**: Secure login system for content management
- **SEO Friendly**: Optimized for search engines
- **Fast Loading**: Optimized performance and lazy loading

## 📁 Project Structure

```
skyline-techworks/
├── assets/
│   ├── css/
│   │   └── style.css          # Custom CSS styles
│   └── js/
│       └── script.js         # Custom JavaScript
├── config/
│   └── database.php          # Database configuration
├── includes/
│   ├── header.php            # Site header
│   └── footer.php            # Site footer
├── admin/
│   ├── login.php             # Admin login page
│   ├── logout.php            # Admin logout handler
│   ├── auth-check.php        # Authentication check
│   ├── dashboard.php         # Admin dashboard
│   ├── posts.php             # Blog post management
│   └── messages.php          # Contact message management
├── index.php                 # Home page
├── services.php              # Services page
├── about.php                 # About us page
├── blog.php                  # Blog listing page
├── blog-post.php             # Single blog post page
├── contact.php               # Contact page
├── newsletter-signup.php     # Newsletter signup handler
├── database_schema.sql       # Database schema
└── README.md                 # This file
```

## 🛠️ Installation

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx)
- Composer (optional, for dependencies)

### Setup Instructions

1. **Clone or Download the Project**
   ```bash
   git clone [repository-url]
   cd skyline-techworks
   ```

2. **Database Setup**
   - Create a MySQL database named `skyline_techworks`
   - Import the database schema:
     ```bash
     mysql -u username -p skyline_techworks < database_schema.sql
     ```

3. **Configure Database Connection**
   - Edit `config/database.php`
   - Update database credentials:
     ```php
     define('DB_HOST', 'localhost');
     define('DB_NAME', 'skyline_techworks');
     define('DB_USER', 'your_username');
     define('DB_PASS', 'your_password');
     ```

4. **Email Configuration**
   - Update email settings in `config/database.php`:
     ```php
     define('SMTP_HOST', 'your-smtp-host');
     define('SMTP_USERNAME', 'your-email@domain.com');
     define('SMTP_PASSWORD', 'your-app-password');
     ```

5. **Set Permissions**
   ```bash
   chmod 755 assets/
   chmod 644 *.php
   ```

6. **Access the Website**
   - Open your web browser
   - Navigate to `http://localhost/skyline-techworks`

## 🔐 Admin Access

### Default Admin Credentials
- **Username**: `admin`
- **Password**: `admin123`

**⚠️ Important**: Change the default password immediately after first login!

### Admin Features
- **Dashboard**: Overview of site statistics
- **Blog Management**: Create, edit, delete blog posts
- **Message Management**: View and manage contact form submissions
- **User Management**: Admin account management

## 📱 Pages Overview

### Public Pages
- **Home**: Hero section, services overview, testimonials
- **Services**: Detailed service descriptions
- **About Us**: Company information and team
- **Blog**: Blog post listings with pagination
- **Contact**: Contact form with email notifications

### Admin Pages
- **Login**: Secure admin authentication
- **Dashboard**: Site statistics and quick actions
- **Posts**: Blog post management (CRUD operations)
- **Messages**: Contact message management

## 🎨 Customization

### Colors and Branding
Edit `assets/css/style.css` to customize:
- Color scheme (CSS variables)
- Typography
- Spacing and layout
- Animations and transitions

### Content Management
- **Blog Posts**: Use the admin panel to manage content
- **Static Content**: Edit PHP files directly
- **Images**: Replace placeholder images in the assets folder

### Database Schema
The database includes these tables:
- `blog_posts`: Blog post content
- `contact_messages`: Contact form submissions
- `admin_users`: Admin user accounts

## 🔧 Technical Details

### Technologies Used
- **Backend**: PHP 7.4+
- **Database**: MySQL 5.7+
- **Frontend**: HTML5, CSS3, JavaScript (ES6+)
- **Framework**: Bootstrap 5.3
- **Icons**: Font Awesome 6.0
- **Fonts**: Google Fonts (Inter)

### Security Features
- Password hashing (PHP password_hash)
- SQL injection prevention (PDO prepared statements)
- XSS protection (htmlspecialchars)
- Session management
- Input validation

### Performance Optimizations
- Lazy loading for images
- Minified CSS and JavaScript
- Optimized database queries
- Responsive images
- Caching headers

## 📧 Contact Form

The contact form includes:
- **Validation**: Client-side and server-side validation
- **Email Notifications**: Automatic email alerts
- **Database Storage**: All messages stored in database
- **Admin Management**: View and manage messages in admin panel

## 🚀 Deployment

### Production Checklist
1. Change default admin password
2. Update database credentials
3. Configure email settings
4. Set up SSL certificate
5. Configure web server (Apache/Nginx)
6. Set proper file permissions
7. Enable error logging
8. Set up backups

### Recommended Hosting
- **Shared Hosting**: Most shared hosting providers support PHP/MySQL
- **VPS/Dedicated**: For better performance and control
- **Cloud Platforms**: AWS, Google Cloud, DigitalOcean

## 🐛 Troubleshooting

### Common Issues

1. **Database Connection Error**
   - Check database credentials in `config/database.php`
   - Ensure MySQL service is running
   - Verify database exists

2. **Email Not Working**
   - Update SMTP settings in `config/database.php`
   - Check server email configuration
   - Verify firewall settings

3. **Admin Login Issues**
   - Check database connection
   - Verify admin user exists
   - Clear browser cache and cookies

4. **Styling Issues**
   - Check CSS file paths
   - Clear browser cache
   - Verify Bootstrap CDN links

## 📄 License

This project is open source and available under the [MIT License](LICENSE).

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## 📞 Support

For support and questions:
- **Email**: info@skyline-techworks.com
- **Phone**: +1 (555) 123-4567
- **Website**: [Your Website URL]

---

**Skyline Techworks** - Innovating Beyond Limits 🚀
