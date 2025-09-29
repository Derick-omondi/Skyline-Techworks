<?php
session_start();
$page_title = "Services";
include 'includes/header.php';
?>

<!-- Page Header -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">Our Services</h1>
                <p class="lead">Comprehensive technology solutions to drive your business forward</p>
            </div>
        </div>
    </div>
</section>

<!-- Services Details -->
<section class="py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Web Development -->
            <div class="col-lg-6">
                <div class="service-detail-card p-4 h-100">
                    <div class="service-icon mb-4">
                        <i class="fas fa-code fa-3x text-primary"></i>
                    </div>
                    <h3 class="fw-bold mb-3">Web Development</h3>
                    <p class="text-muted mb-4">We create stunning, responsive websites and web applications that deliver exceptional user experiences and drive business growth.</p>
                    
                    <h5 class="fw-bold mb-3">What We Offer:</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Custom Website Development</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>E-commerce Solutions</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Web Application Development</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Content Management Systems</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>API Development & Integration</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Mobile-Responsive Design</li>
                    </ul>
                    
                    <div class="service-features mt-4">
                        <span class="badge bg-primary me-2 mb-2">PHP</span>
                        <span class="badge bg-primary me-2 mb-2">JavaScript</span>
                        <span class="badge bg-primary me-2 mb-2">React</span>
                        <span class="badge bg-primary me-2 mb-2">Node.js</span>
                        <span class="badge bg-primary me-2 mb-2">MySQL</span>
                    </div>
                </div>
            </div>
            
            <!-- Graphic Design -->
            <div class="col-lg-6">
                <div class="service-detail-card p-4 h-100">
                    <div class="service-icon mb-4">
                        <i class="fas fa-palette fa-3x text-success"></i>
                    </div>
                    <h3 class="fw-bold mb-3">Graphic Design</h3>
                    <p class="text-muted mb-4">Our creative team delivers visually stunning designs that capture your brand essence and communicate your message effectively.</p>
                    
                    <h5 class="fw-bold mb-3">What We Offer:</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Logo Design & Branding</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Print Design</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Digital Marketing Materials</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>UI/UX Design</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Social Media Graphics</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Infographics & Presentations</li>
                    </ul>
                    
                    <div class="service-features mt-4">
                        <span class="badge bg-success me-2 mb-2">Adobe Creative Suite</span>
                        <span class="badge bg-success me-2 mb-2">Figma</span>
                        <span class="badge bg-success me-2 mb-2">Sketch</span>
                        <span class="badge bg-success me-2 mb-2">Canva</span>
                    </div>
                </div>
            </div>
            
            <!-- IT Support -->
            <div class="col-lg-6">
                <div class="service-detail-card p-4 h-100">
                    <div class="service-icon mb-4">
                        <i class="fas fa-tools fa-3x text-warning"></i>
                    </div>
                    <h3 class="fw-bold mb-3">IT Support</h3>
                    <p class="text-muted mb-4">Keep your business running smoothly with our comprehensive IT support services, available 24/7 to address any technical issues.</p>
                    
                    <h5 class="fw-bold mb-3">What We Offer:</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>24/7 Technical Support</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Network Setup & Maintenance</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Hardware & Software Installation</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Data Backup & Recovery</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Security Monitoring</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Remote Desktop Support</li>
                    </ul>
                    
                    <div class="service-features mt-4">
                        <span class="badge bg-warning me-2 mb-2">Windows</span>
                        <span class="badge bg-warning me-2 mb-2">Linux</span>
                        <span class="badge bg-warning me-2 mb-2">macOS</span>
                        <span class="badge bg-warning me-2 mb-2">Cloud Services</span>
                    </div>
                </div>
            </div>
            
            <!-- Digital Training -->
            <div class="col-lg-6">
                <div class="service-detail-card p-4 h-100">
                    <div class="service-icon mb-4">
                        <i class="fas fa-graduation-cap fa-3x text-info"></i>
                    </div>
                    <h3 class="fw-bold mb-3">Digital Training</h3>
                    <p class="text-muted mb-4">Empower your team with cutting-edge digital skills through our comprehensive training programs designed for modern businesses.</p>
                    
                    <h5 class="fw-bold mb-3">What We Offer:</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Web Development Training</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Digital Marketing Courses</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Data Analysis & Visualization</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Cloud Computing Training</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Cybersecurity Awareness</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Project Management Tools</li>
                    </ul>
                    
                    <div class="service-features mt-4">
                        <span class="badge bg-info me-2 mb-2">Online Learning</span>
                        <span class="badge bg-info me-2 mb-2">Hands-on Practice</span>
                        <span class="badge bg-info me-2 mb-2">Certification</span>
                        <span class="badge bg-info me-2 mb-2">Group Training</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">Our Process</h2>
                <p class="lead text-muted">We follow a proven methodology to deliver exceptional results</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="process-step text-center">
                    <div class="process-number mb-3">
                        <span class="badge bg-primary rounded-circle p-3">1</span>
                    </div>
                    <h5 class="fw-bold mb-3">Discovery</h5>
                    <p class="text-muted">We start by understanding your business goals, challenges, and requirements through detailed consultation.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="process-step text-center">
                    <div class="process-number mb-3">
                        <span class="badge bg-primary rounded-circle p-3">2</span>
                    </div>
                    <h5 class="fw-bold mb-3">Planning</h5>
                    <p class="text-muted">We create a comprehensive project plan with timelines, milestones, and deliverables tailored to your needs.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="process-step text-center">
                    <div class="process-number mb-3">
                        <span class="badge bg-primary rounded-circle p-3">3</span>
                    </div>
                    <h5 class="fw-bold mb-3">Development</h5>
                    <p class="text-muted">Our expert team implements the solution using cutting-edge technologies and best practices.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="process-step text-center">
                    <div class="process-number mb-3">
                        <span class="badge bg-primary rounded-circle p-3">4</span>
                    </div>
                    <h5 class="fw-bold mb-3">Support</h5>
                    <p class="text-muted">We provide ongoing support and maintenance to ensure your solution continues to perform optimally.</p>
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
                <h3 class="fw-bold mb-3">Ready to Get Started?</h3>
                <p class="lead mb-0">Contact us today to discuss your project requirements and get a free consultation.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="contact.php" class="btn btn-warning btn-lg">
                    <i class="fas fa-phone me-2"></i>Contact Us
                </a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
