# Skyline Techworks Website

**Tagline:** *Innovating Beyond Limits*  
A responsive PHP-based website for **Skyline Techworks**, a tech agency providing services in Web Development, Graphic Design, IT Support, and Digital Training.  

---

## 🚀 Features
- Modern, responsive UI (works on desktop & mobile).
- Pages:
  - **Home** – Hero section, services overview, testimonials, CTA.
  - **Services** – Detailed list of offered services.
  - **About Us** – Company mission, vision, and team profiles.
  - **Blog** – Dynamic blog system with posts stored in MySQL.
  - **Single Blog Post** – Detailed article page.
  - **Contact** – Contact form that:
    - Saves messages into the database.
    - Sends email notifications to admin via PHPMailer/SMTP.
- Admin Dashboard (with login) for:
  - Managing blog posts (add, edit, delete).
  - Viewing contact form messages.
- Clean file structure with reusable header/footer includes.

---

## 🛠️ Tech Stack
- **Frontend:** HTML5, CSS3, JavaScript (with Bootstrap for responsiveness).
- **Backend:** PHP 8+
- **Database:** MySQL (phpMyAdmin)
- **Email Handling:** PHPMailer (SMTP/Gmail support)

---

## 📂 Project Structure
system/
│── index.php # Home page
│── about.php # About Us page
│── services.php # Services page
│── blog.php # Blog listing
│── post.php # Single blog post
│── contact.php # Contact form
│── admin/ # Admin dashboard
│── includes/ # Shared header/footer
│── assets/ # CSS, JS, images
│── uploads/ # Uploaded images/files
│── config/ # Database & config files
└── README.md

---

## ⚙️ Installation

1. Clone/download the project:
   ```bash
   git clone https://github.com/your-username/skyline-techworks.git
