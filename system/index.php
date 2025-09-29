<?php
session_start();
$page_title = "Home";
include 'includes/header.php';
?>

<!-- Hero Section -->
<section class="hero-section bg-gradient-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center min-vh-75">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">
                    Welcome to <span class="text-warning">Skyline Techworks</span>
                </h1>
                <p class="lead mb-4">
                    <strong>Innovating Beyond Limits</strong><br>
                    We deliver cutting-edge technology solutions that transform businesses and drive unprecedented growth.
                </p>
                <div class="hero-buttons">
                    <a href="services.php" class="btn btn-warning btn-lg me-3 mb-3">
                        <i class="fas fa-rocket me-2"></i>Our Services
                    </a>
                    <a href="contact.php" class="btn btn-outline-light btn-lg mb-3">
                        <i class="fas fa-phone me-2"></i>Get Started
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="hero-image">
                    <i class="fas fa-laptop-code display-1 text-warning mb-4"></i>
                    <div class="floating-elements">
                        <i class="fas fa-code float-element-1"></i>
                        <i class="fas fa-database float-element-2"></i>
                        <i class="fas fa-cloud float-element-3"></i>
                        <i class="fas fa-mobile-alt float-element-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Overview -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">Our Services</h2>
                <p class="lead text-muted">Comprehensive technology solutions tailored to your business needs</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="service-card h-100 text-center p-4 border rounded-3 shadow-sm">
                    <div class="service-icon mb-3">
                        <i class="fas fa-code fa-3x text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Web Development</h5>
                    <p class="text-muted">Custom websites and web applications built with modern technologies and best practices.</p>
                    <a href="services.php" class="btn btn-outline-primary">Learn More</a>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="service-card h-100 text-center p-4 border rounded-3 shadow-sm">
                    <div class="service-icon mb-3">
                        <i class="fas fa-palette fa-3x text-success"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Graphic Design</h5>
                    <p class="text-muted">Creative visual solutions including logos, branding, and marketing materials.</p>
                    <a href="services.php" class="btn btn-outline-success">Learn More</a>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="service-card h-100 text-center p-4 border rounded-3 shadow-sm">
                    <div class="service-icon mb-3">
                        <i class="fas fa-tools fa-3x text-warning"></i>
                    </div>
                    <h5 class="fw-bold mb-3">IT Support</h5>
                    <p class="text-muted">24/7 technical support and maintenance for your IT infrastructure.</p>
                    <a href="services.php" class="btn btn-outline-warning">Learn More</a>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="service-card h-100 text-center p-4 border rounded-3 shadow-sm">
                    <div class="service-icon mb-3">
                        <i class="fas fa-graduation-cap fa-3x text-info"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Digital Training</h5>
                    <p class="text-muted">Comprehensive training programs to upskill your team in modern technologies.</p>
                    <a href="services.php" class="btn btn-outline-info">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">Why Choose Skyline Techworks?</h2>
                <p class="lead text-muted">We combine technical expertise with business acumen to deliver exceptional results</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="feature-item text-center">
                    <div class="feature-icon mb-3">
                        <i class="fas fa-lightning-bolt fa-2x text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Fast Delivery</h5>
                    <p class="text-muted">We understand the importance of time in business. Our agile development process ensures quick turnaround times.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="feature-item text-center">
                    <div class="feature-icon mb-3">
                        <i class="fas fa-shield-alt fa-2x text-success"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Secure Solutions</h5>
                    <p class="text-muted">Security is our top priority. We implement industry-standard security measures to protect your data.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="feature-item text-center">
                    <div class="feature-icon mb-3">
                        <i class="fas fa-headset fa-2x text-warning"></i>
                    </div>
                    <h5 class="fw-bold mb-3">24/7 Support</h5>
                    <p class="text-muted">Our dedicated support team is always ready to help you with any technical issues or questions.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">What Our Clients Say</h2>
                <p class="lead text-muted">Don't just take our word for it - hear from our satisfied clients</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="testimonial-card p-4 bg-white border rounded-3 shadow-sm h-100">
                    <div class="testimonial-content mb-3">
                        <p class="text-muted mb-3">"Skyline Techworks transformed our online presence completely. Their web development team delivered exactly what we needed, on time and within budget."</p>
                    </div>
                    <div class="testimonial-author d-flex align-items-center">
                        <div class="author-avatar me-3">
                            <i class="fas fa-user-circle fa-2x text-primary"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0">Sarah Johnson</h6>
                            <small class="text-muted">CEO, TechStart Inc.</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="testimonial-card p-4 bg-white border rounded-3 shadow-sm h-100">
                    <div class="testimonial-content mb-3">
                        <p class="text-muted mb-3">"The IT support team at Skyline Techworks is exceptional. They've kept our systems running smoothly and helped us scale our operations."</p>
                    </div>
                    <div class="testimonial-author d-flex align-items-center">
                        <div class="author-avatar me-3">
                            <i class="fas fa-user-circle fa-2x text-success"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0">Michael Chen</h6>
                            <small class="text-muted">CTO, InnovateCorp</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="testimonial-card p-4 bg-white border rounded-3 shadow-sm h-100">
                    <div class="testimonial-content mb-3">
                        <p class="text-muted mb-3">"Their digital training program helped our team master new technologies quickly. The instructors are knowledgeable and patient."</p>
                    </div>
                    <div class="testimonial-author d-flex align-items-center">
                        <div class="author-avatar me-3">
                            <i class="fas fa-user-circle fa-2x text-warning"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0">Emily Rodriguez</h6>
                            <small class="text-muted">HR Director, GlobalTech</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="fw-bold mb-3">Ready to Transform Your Business?</h3>
                <p class="lead mb-0">Let's discuss how we can help you achieve your technology goals and drive growth.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="contact.php" class="btn btn-warning btn-lg">
                    <i class="fas fa-rocket me-2"></i>Get Started Today
                </a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
