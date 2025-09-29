<?php
session_start();
$page_title = "Contact Us";
include 'config/database.php';

$success_message = '';
$error_message = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');
    
    // Validation
    $errors = [];
    
    if (empty($name)) {
        $errors[] = 'Name is required';
    }
    
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Valid email is required';
    }
    
    if (empty($subject)) {
        $errors[] = 'Subject is required';
    }
    
    if (empty($message)) {
        $errors[] = 'Message is required';
    }
    
    if (empty($errors)) {
        try {
            $pdo = getDBConnection();
            
            // Insert message into database
            $stmt = $pdo->prepare("
                INSERT INTO contact_messages (name, email, subject, message) 
                VALUES (:name, :email, :subject, :message)
            ");
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->bindValue(':subject', $subject, PDO::PARAM_STR);
            $stmt->bindValue(':message', $message, PDO::PARAM_STR);
            $stmt->execute();
            
            // Send email notification
            $to = 'info@skyline-techworks.com'; // Change this to your email
            $email_subject = 'New Contact Form Submission: ' . $subject;
            $email_body = "
                New contact form submission from Skyline Techworks website:
                
                Name: $name
                Email: $email
                Subject: $subject
                
                Message:
                $message
                
                ---
                This message was sent from the contact form on your website.
            ";
            
            $headers = "From: noreply@skyline-techworks.com\r\n";
            $headers .= "Reply-To: $email\r\n";
            $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
            
            if (mail($to, $email_subject, $email_body, $headers)) {
                $success_message = 'Thank you for your message! We will get back to you within 24 hours.';
            } else {
                $success_message = 'Your message has been received, but there was an issue sending the email notification. We will still get back to you soon.';
            }
            
            // Clear form data
            $name = $email = $subject = $message = '';
            
        } catch (PDOException $e) {
            $error_message = 'Sorry, there was an error processing your message. Please try again later.';
        }
    } else {
        $error_message = implode('<br>', $errors);
    }
}

include 'includes/header.php';
?>

<!-- Page Header -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">Contact Us</h1>
                <p class="lead">Get in touch with our team - we're here to help with your technology needs</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form & Info -->
<section class="py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Contact Form -->
            <div class="col-lg-8">
                <div class="contact-form-section">
                    <h2 class="fw-bold mb-4">Send us a Message</h2>
                    
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
                    
                    <form method="POST" action="" class="contact-form">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label fw-bold">Full Name *</label>
                                <input type="text" class="form-control" id="name" name="name" 
                                       value="<?php echo htmlspecialchars($name ?? ''); ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label fw-bold">Email Address *</label>
                                <input type="email" class="form-control" id="email" name="email" 
                                       value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
                            </div>
                            <div class="col-12">
                                <label for="subject" class="form-label fw-bold">Subject *</label>
                                <input type="text" class="form-control" id="subject" name="subject" 
                                       value="<?php echo htmlspecialchars($subject ?? ''); ?>" required>
                            </div>
                            <div class="col-12">
                                <label for="message" class="form-label fw-bold">Message *</label>
                                <textarea class="form-control" id="message" name="message" rows="6" 
                                          placeholder="Tell us about your project or how we can help you..." required><?php echo htmlspecialchars($message ?? ''); ?></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-paper-plane me-2"></i>Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Contact Information -->
            <div class="col-lg-4">
                <div class="contact-info-section">
                    <h3 class="fw-bold mb-4">Get in Touch</h3>
                    
                    <div class="contact-item mb-4">
                        <div class="contact-icon mb-2">
                            <i class="fas fa-map-marker-alt fa-2x text-primary"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Office Address</h5>
                        <p class="text-muted mb-0">
                            123 Tech Street<br>
                            Innovation City, IC 12345<br>
                            United States
                        </p>
                    </div>
                    
                    <div class="contact-item mb-4">
                        <div class="contact-icon mb-2">
                            <i class="fas fa-phone fa-2x text-success"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Phone</h5>
                        <p class="text-muted mb-0">
                            <a href="tel:+15551234567" class="text-decoration-none">+1 (555) 123-4567</a>
                        </p>
                    </div>
                    
                    <div class="contact-item mb-4">
                        <div class="contact-icon mb-2">
                            <i class="fas fa-envelope fa-2x text-warning"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Email</h5>
                        <p class="text-muted mb-0">
                            <a href="mailto:info@skyline-techworks.com" class="text-decoration-none">info@skyline-techworks.com</a>
                        </p>
                    </div>
                    
                    <div class="contact-item mb-4">
                        <div class="contact-icon mb-2">
                            <i class="fas fa-clock fa-2x text-info"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Business Hours</h5>
                        <p class="text-muted mb-0">
                            Monday - Friday: 9:00 AM - 6:00 PM<br>
                            Saturday: 10:00 AM - 4:00 PM<br>
                            Sunday: Closed
                        </p>
                    </div>
                    
                    <div class="social-links mt-4">
                        <h5 class="fw-bold mb-3">Follow Us</h5>
                        <div class="social-buttons">
                            <a href="#" class="btn btn-outline-primary me-2 mb-2">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="btn btn-outline-info me-2 mb-2">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="btn btn-outline-primary me-2 mb-2">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="btn btn-outline-danger me-2 mb-2">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">Frequently Asked Questions</h2>
                <p class="lead text-muted">Quick answers to common questions about our services</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq1">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                                How long does a typical web development project take?
                            </button>
                        </h2>
                        <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Project timelines vary based on complexity. A simple website typically takes 2-4 weeks, while complex web applications can take 2-6 months. We provide detailed timelines during our initial consultation.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                                Do you provide ongoing support after project completion?
                            </button>
                        </h2>
                        <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes! We offer comprehensive support packages including maintenance, updates, security monitoring, and technical support. Our support team is available 24/7 for critical issues.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
                                What technologies do you work with?
                            </button>
                        </h2>
                        <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                We work with a wide range of technologies including PHP, JavaScript, React, Node.js, Python, MySQL, and cloud platforms like AWS and Azure. We choose the best technology stack for each project.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq4">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4">
                                Do you offer training for our team?
                            </button>
                        </h2>
                        <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Absolutely! We provide comprehensive training programs covering web development, digital marketing, data analysis, and more. Training can be conducted on-site or remotely.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
