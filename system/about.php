<?php
session_start();
$page_title = "About Us";
include 'includes/header.php';
?>

<!-- Page Header -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">About Skyline Techworks</h1>
                <p class="lead">Innovating Beyond Limits - Your Trusted Technology Partner</p>
            </div>
        </div>
    </div>
</section>

<!-- Company Introduction -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="display-5 fw-bold mb-4">Who We Are</h2>
                <p class="lead text-muted mb-4">
                    Skyline Techworks is a leading technology company dedicated to delivering innovative solutions that transform businesses and drive growth.
                </p>
                <p class="mb-4">
                    Founded in 2020, we have quickly established ourselves as a trusted partner for businesses seeking to leverage technology for competitive advantage. Our team of experienced professionals combines technical expertise with deep industry knowledge to deliver solutions that exceed expectations.
                </p>
                <p class="mb-4">
                    We believe in the power of technology to solve complex problems and create opportunities. Our mission is to help businesses navigate the digital landscape and achieve their goals through innovative, reliable, and scalable technology solutions.
                </p>
            </div>
            <div class="col-lg-6">
                <div class="about-image text-center">
                    <i class="fas fa-building fa-5x text-primary mb-4"></i>
                    <div class="stats-row">
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="stat-item text-center">
                                    <h3 class="fw-bold text-primary">50+</h3>
                                    <p class="text-muted mb-0">Projects Completed</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stat-item text-center">
                                    <h3 class="fw-bold text-success">30+</h3>
                                    <p class="text-muted mb-0">Happy Clients</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stat-item text-center">
                                    <h3 class="fw-bold text-warning">3+</h3>
                                    <p class="text-muted mb-0">Years Experience</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stat-item text-center">
                                    <h3 class="fw-bold text-info">24/7</h3>
                                    <p class="text-muted mb-0">Support Available</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">Our Mission & Vision</h2>
                <p class="lead text-muted">Driving innovation and excellence in everything we do</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="mission-card p-4 h-100 text-center">
                    <div class="mission-icon mb-4">
                        <i class="fas fa-bullseye fa-3x text-primary"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Our Mission</h4>
                    <p class="text-muted">
                        To empower businesses with cutting-edge technology solutions that drive growth, enhance efficiency, and create competitive advantages in the digital marketplace.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="vision-card p-4 h-100 text-center">
                    <div class="vision-icon mb-4">
                        <i class="fas fa-eye fa-3x text-success"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Our Vision</h4>
                    <p class="text-muted">
                        To be the leading technology partner that businesses trust to transform their digital presence and achieve unprecedented success in the modern economy.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">Meet Our Team</h2>
                <p class="lead text-muted">The talented professionals behind Skyline Techworks</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="team-card text-center p-4">
                    <div class="team-avatar mb-3">
                        <i class="fas fa-user-circle fa-4x text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Alex Johnson</h5>
                    <p class="text-primary mb-3">CEO & Founder</p>
                    <p class="text-muted small">
                        Technology visionary with 10+ years of experience in software development and business strategy. Passionate about innovation and helping businesses grow.
                    </p>
                    <div class="team-social">
                        <a href="#" class="text-muted me-2"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-muted me-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-muted"><i class="fab fa-github"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="team-card text-center p-4">
                    <div class="team-avatar mb-3">
                        <i class="fas fa-user-circle fa-4x text-success"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Sarah Chen</h5>
                    <p class="text-success mb-3">Lead Developer</p>
                    <p class="text-muted small">
                        Full-stack developer with expertise in modern web technologies. Leads our development team and ensures high-quality code delivery.
                    </p>
                    <div class="team-social">
                        <a href="#" class="text-muted me-2"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-muted me-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-muted"><i class="fab fa-github"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="team-card text-center p-4">
                    <div class="team-avatar mb-3">
                        <i class="fas fa-user-circle fa-4x text-warning"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Michael Rodriguez</h5>
                    <p class="text-warning mb-3">Creative Director</p>
                    <p class="text-muted small">
                        Creative genius behind our design solutions. Specializes in user experience design and brand development for digital platforms.
                    </p>
                    <div class="team-social">
                        <a href="#" class="text-muted me-2"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-muted me-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-muted"><i class="fab fa-dribbble"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="team-card text-center p-4">
                    <div class="team-avatar mb-3">
                        <i class="fas fa-user-circle fa-4x text-info"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Emily Davis</h5>
                    <p class="text-info mb-3">IT Support Manager</p>
                    <p class="text-muted small">
                        IT infrastructure expert with a focus on security and reliability. Ensures our clients' systems run smoothly and securely.
                    </p>
                    <div class="team-social">
                        <a href="#" class="text-muted me-2"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-muted me-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-muted"><i class="fab fa-github"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="team-card text-center p-4">
                    <div class="team-avatar mb-3">
                        <i class="fas fa-user-circle fa-4x text-danger"></i>
                    </div>
                    <h5 class="fw-bold mb-2">David Kim</h5>
                    <p class="text-danger mb-3">Training Specialist</p>
                    <p class="text-muted small">
                        Education expert who develops and delivers comprehensive training programs to help teams master new technologies.
                    </p>
                    <div class="team-social">
                        <a href="#" class="text-muted me-2"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-muted me-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-muted"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="team-card text-center p-4">
                    <div class="team-avatar mb-3">
                        <i class="fas fa-user-circle fa-4x text-secondary"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Lisa Thompson</h5>
                    <p class="text-secondary mb-3">Project Manager</p>
                    <p class="text-muted small">
                        Project management professional who ensures timely delivery and client satisfaction across all our engagements.
                    </p>
                    <div class="team-social">
                        <a href="#" class="text-muted me-2"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-muted me-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-muted"><i class="fab fa-slack"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">Our Values</h2>
                <p class="lead text-muted">The principles that guide everything we do</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="value-item text-center">
                    <div class="value-icon mb-3">
                        <i class="fas fa-lightbulb fa-2x text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Innovation</h5>
                    <p class="text-muted">We constantly explore new technologies and methodologies to deliver cutting-edge solutions.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="value-item text-center">
                    <div class="value-icon mb-3">
                        <i class="fas fa-handshake fa-2x text-success"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Integrity</h5>
                    <p class="text-muted">We maintain the highest ethical standards in all our business relationships and practices.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="value-item text-center">
                    <div class="value-icon mb-3">
                        <i class="fas fa-star fa-2x text-warning"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Excellence</h5>
                    <p class="text-muted">We strive for perfection in every project, ensuring the highest quality deliverables.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="value-item text-center">
                    <div class="value-icon mb-3">
                        <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Collaboration</h5>
                    <p class="text-muted">We work closely with our clients as partners, ensuring their success is our success.</p>
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
                <h3 class="fw-bold mb-3">Ready to Work With Us?</h3>
                <p class="lead mb-0">Let's discuss how we can help transform your business with innovative technology solutions.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="contact.php" class="btn btn-warning btn-lg">
                    <i class="fas fa-rocket me-2"></i>Start Your Project
                </a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
