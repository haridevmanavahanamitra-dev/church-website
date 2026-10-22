<?php
$pageTitle = "Contact Us - Adon Gospel Church Ministry";
include 'inc/header.php';
?>

<!-- <div class="page-hero">
    <h1>Contact Us</h1>
    <div class="breadcrumb"><a href="index.php">Home</a> <i class="fas fa-chevron-right" style="font-size:0.65rem;"></i> Contact</div>
</div> -->

<section class="section">
    <div class="container">
        <div class="section-header reveal">
            <span class="section-tag">Get in Touch</span>
            <h2 class="section-title">We'd love to <em>hear from you</em></h2>
            <p class="section-subtitle">Questions, prayer requests, or just want to say hello?</p>
        </div>
        <div style="max-width:640px;margin:0 auto;">
            <form id="supportForm" class="form-card reveal">
                <div class="form-grid">
                    <div class="form-group"><label class="form-label">Full Name</label><input type="text" placeholder="Your name" required></div>
                    <div class="form-group"><label class="form-label">Email</label><input type="email" placeholder="your@email.com" required></div>
                    <div class="form-group"><label class="form-label">Subject</label>
                        <select>
                            <option>General Inquiry</option>
                            <option>Prayer Request</option>
                            <option>Church information</option>
                            <option>Volunteer</option>
                        </select>
                    </div>
                    <div class="form-group"><label class="form-label">Phone</label><input type="tel" placeholder="+91 00000 00000"></div>
                    <div class="form-group form-group-full"><label class="form-label">Message</label><textarea placeholder="How can we help you?" required></textarea></div>
                    <div class="form-group form-group-full"><button type="submit" class="btn-primary" style="width:100%;justify-content:center;"><i class="fas fa-paper-plane"></i> Send Message</button></div>
                </div>
            </form>
        </div>
        <div style="text-align:center;margin-top:32px;" class="reveal">
            <p style="color:var(--ink-muted);font-size:0.9rem;"><i class="fas fa-phone" style="color:var(--evergreen-deep);"></i> +91 00000 00000 &nbsp;|&nbsp; <i class="fas fa-envelope" style="color:var(--evergreen-deep);"></i> test@example.com</p>
        </div>
    </div>
</section>

<?php include 'inc/footer.php'; ?>
