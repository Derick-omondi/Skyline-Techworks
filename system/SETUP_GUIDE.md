# Skyline Techworks - Setup Guide

## 🚀 Quick Start Guide

### Step 1: Database Setup
1. Create a MySQL database named `skyline_techworks`
2. Import the database schema:
   ```sql
   mysql -u root -p skyline_techworks < database_schema.sql
   ```

### Step 2: Configuration
1. Update database credentials in `config/database.php`:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_NAME', 'skyline_techworks');
   define('DB_USER', 'your_username');
   define('DB_PASS', 'your_password');
   ```

2. Update email settings in `config/database.php`:
   ```php
   define('SMTP_USERNAME', 'your-email@gmail.com');
   define('SMTP_PASSWORD', 'your-app-password');
   ```

### Step 3: Access the Website
- **Website**: `http://localhost/skyline-techworks`
- **Admin Panel**: `http://localhost/skyline-techworks/admin/login.php`

### Step 4: Admin Login
- **Username**: `admin`
- **Password**: `admin123`
- **⚠️ Change password immediately!**

## 📁 File Structure Created

```
skyline-techworks/
├── assets/
│   ├── css/style.css          # Custom responsive CSS
│   └── js/script.js           # Interactive JavaScript
├── config/
│   └── database.php           # Database configuration
├── includes/
│   ├── header.php             # Shared header
│   └── footer.php             # Shared footer
├── admin/
│   ├── login.php              # Admin login
│   ├── logout.php             # Admin logout
│   ├── auth-check.php         # Authentication
│   ├── dashboard.php          # Admin dashboard
│   ├── posts.php              # Blog management
│   └── messages.php           # Message management
├── index.php                  # Home page
├── services.php               # Services page
├── about.php                  # About us page
├── blog.php                   # Blog listing
├── blog-post.php              # Single blog post
├── contact.php                # Contact page
├── newsletter-signup.php      # Newsletter handler
├── database_schema.sql        # Database schema
├── README.md                  # Documentation
└── SETUP_GUIDE.md            # This file
```

## ✅ Features Implemented

### 🏠 Public Website
- **Responsive Design**: Works on all devices
- **Modern UI/UX**: Clean, professional design
- **Navigation**: Home, Services, About, Blog, Contact
- **Hero Section**: Agency branding with call-to-action
- **Services Overview**: Web Dev, Design, IT Support, Training
- **Testimonials**: Client feedback section
- **Blog System**: Database-driven blog with pagination
- **Contact Form**: Email notifications + database storage
- **Footer**: Links, contact info, social media

### 🔐 Admin Panel
- **Secure Login**: Session-based authentication
- **Dashboard**: Statistics and quick actions
- **Blog Management**: Create, edit, delete posts
- **Message Management**: View and manage contact messages
- **Responsive Admin**: Works on mobile devices

### 🛠️ Technical Features
- **PHP 7.4+**: Modern PHP with PDO
- **MySQL Database**: Secure database operations
- **Bootstrap 5.3**: Responsive framework
- **Font Awesome**: Professional icons
- **Custom CSS**: Brand-specific styling
- **JavaScript**: Interactive features
- **Security**: XSS protection, SQL injection prevention
- **Performance**: Optimized loading and animations

## 🎨 Customization Options

### Colors and Branding
Edit `assets/css/style.css`:
```css
:root {
    --primary-color: #667eea;    /* Main brand color */
    --secondary-color: #764ba2;  /* Secondary color */
    --success-color: #28a745;    /* Success messages */
    --warning-color: #ffc107;    /* Warning/CTA color */
}
```

### Content Management
- **Blog Posts**: Use admin panel at `/admin/posts.php`
- **Static Content**: Edit PHP files directly
- **Images**: Replace placeholder icons with actual images
- **Contact Info**: Update in `includes/footer.php` and `contact.php`

## 📧 Email Configuration

### Gmail Setup (Recommended)
1. Enable 2-Factor Authentication
2. Generate App Password
3. Update `config/database.php`:
   ```php
   define('SMTP_HOST', 'smtp.gmail.com');
   define('SMTP_PORT', 587);
   define('SMTP_USERNAME', 'your-email@gmail.com');
   define('SMTP_PASSWORD', 'your-16-char-app-password');
   ```

### Other Email Providers
- **Outlook**: `smtp-mail.outlook.com:587`
- **Yahoo**: `smtp.mail.yahoo.com:587`
- **Custom SMTP**: Update host and port accordingly

## 🔒 Security Checklist

- [ ] Change default admin password
- [ ] Update database credentials
- [ ] Configure email settings
- [ ] Set proper file permissions (755 for directories, 644 for files)
- [ ] Enable HTTPS in production
- [ ] Regular database backups
- [ ] Update PHP and MySQL regularly

## 🚀 Deployment Options

### Shared Hosting
1. Upload files via FTP/cPanel
2. Create MySQL database
3. Import `database_schema.sql`
4. Update `config/database.php`
5. Test all functionality

### VPS/Cloud
1. Install LAMP/LEMP stack
2. Clone repository
3. Set up virtual host
4. Configure SSL certificate
5. Set up automated backups

## 🐛 Troubleshooting

### Common Issues

**Database Connection Error**
```php
// Check in config/database.php
define('DB_HOST', 'localhost');     // Usually 'localhost'
define('DB_NAME', 'skyline_techworks');
define('DB_USER', 'your_username');
define('DB_PASS', 'your_password');
```

**Email Not Sending**
- Check SMTP credentials
- Verify firewall settings
- Test with simple mail() function first

**Admin Login Issues**
- Check database connection
- Verify admin user exists in database
- Clear browser cache

**Styling Issues**
- Check CSS file paths
- Clear browser cache
- Verify Bootstrap CDN links

## 📱 Mobile Responsiveness

The website is fully responsive and includes:
- **Mobile-first design**
- **Touch-friendly navigation**
- **Optimized images**
- **Readable typography**
- **Fast loading on mobile**

## 🎯 Next Steps

1. **Content**: Add your actual content and images
2. **SEO**: Add meta tags and optimize for search engines
3. **Analytics**: Integrate Google Analytics
4. **Backups**: Set up automated database backups
5. **SSL**: Enable HTTPS for security
6. **Performance**: Optimize images and enable caching

## 📞 Support

For technical support or customization requests:
- **Email**: info@skyline-techworks.com
- **Documentation**: Check README.md for detailed information

---

**Skyline Techworks** - Innovating Beyond Limits 🚀

*Built with ❤️ using PHP, MySQL, Bootstrap, and modern web technologies.*
