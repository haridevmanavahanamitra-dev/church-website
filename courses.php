<?php
$pageTitle = "Our Courses - Adon Gospel Church Ministry";
include 'inc/header.php';
?>

<!-- <div class="page-hero">
    <h1>Our Courses</h1>
    <div class="breadcrumb"><a href="index.php">Home</a> <i class="fas fa-chevron-right" style="font-size:0.65rem;"></i> Courses</div>
</div> -->

<!-- ===== COURSES PAGE STYLES ===== -->
<style>
    .courses-page-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
    }
    @media (max-width: 992px) {
        .courses-page-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 600px) {
        .courses-page-grid { grid-template-columns: 1fr; }
    }

    .course-detail-card {
        background: #ffffff;
        border-radius: 16px;
        padding: 28px 24px;
        border: 1px solid rgba(15,118,110,0.08);
        box-shadow: 0 4px 16px rgba(0,0,0,0.04);
        transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        display: flex;
        flex-direction: column;
        height: 100%;
    }
    .course-detail-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 14px 34px rgba(15,118,110,0.12);
        border-color: rgba(15,118,110,0.2);
    }
</style>

<section class="section">
    <div class="container">
        <div class="section-header reveal">
            <span class="section-tag">Our Courses</span>
            <h2 class="section-title">Courses we <em>offer</em></h2>
            <p class="section-subtitle">Grow deeper in the knowledge of God through our biblical and theological courses.</p>
        </div>

        <div class="courses-page-grid">
            <!-- 1. Biblical Theology -->
            <!-- <div class="course-detail-card reveal">
                <div class="feature-icon teal" style="margin-bottom:16px;"><i class="fas fa-book-bible"></i></div>
                <h3 style="margin:0 0 10px;font-size:1.25rem;color:#0b2d2a;font-weight:700;">Biblical Theology</h3>
                <p style="color:#475569;line-height:1.65;font-size:0.95rem;margin:0;">Trace God's unfolding revelation through Scripture and its unified message.</p>
            </div> -->

            <!-- 2. OT Theology -->
            <div class="course-detail-card reveal" style="transition-delay:0.05s;">
                <div class="feature-icon amber" style="margin-bottom:16px;"><i class="fas fa-scroll"></i></div>
                <h3 style="margin:0 0 10px;font-size:1.25rem;color:#0b2d2a;font-weight:700;">OT Theology</h3>
                <p style="color:#475569;line-height:1.65;font-size:0.95rem;margin:0;">Explore God's revelation in the Old Testament, from creation to the prophets.</p>
            </div>

            <!-- 3. NT Theology -->
            <div class="course-detail-card reveal" style="transition-delay:0.1s;">
                <div class="feature-icon blue" style="margin-bottom:16px;"><i class="fas fa-book-open"></i></div>
                <h3 style="margin:0 0 10px;font-size:1.25rem;color:#0b2d2a;font-weight:700;">NT Theology</h3>
                <p style="color:#475569;line-height:1.65;font-size:0.95rem;margin:0;">Study the fulfilment of Scripture in Christ and the teaching of the apostles.</p>
            </div>

            <!-- 4. Pauline Letters -->
            <div class="course-detail-card reveal" style="transition-delay:0.15s;">
                <div class="feature-icon rose" style="margin-bottom:16px;"><i class="fas fa-envelope-open-text"></i></div>
                <h3 style="margin:0 0 10px;font-size:1.25rem;color:#0b2d2a;font-weight:700;">Pauline Letters</h3>
                <p style="color:#475569;line-height:1.65;font-size:0.95rem;margin:0;">Study the epistles of Paul and their enduring teaching for the Church.</p>
            </div>

            <!-- 5. Major Religions -->
            <div class="course-detail-card reveal" style="transition-delay:0.2s;">
                <div class="feature-icon teal" style="margin-bottom:16px;"><i class="fas fa-globe"></i></div>
                <h3 style="margin:0 0 10px;font-size:1.25rem;color:#0b2d2a;font-weight:700;">Major Religions</h3>
                <p style="color:#475569;line-height:1.65;font-size:0.95rem;margin:0;">Understand the beliefs and practices of the world's major faith traditions.</p>
            </div>

            <!-- 6. Systematic Theology -->
            <div class="course-detail-card reveal" style="transition-delay:0.25s;">
                <div class="feature-icon amber" style="margin-bottom:16px;"><i class="fas fa-sitemap"></i></div>
                <h3 style="margin:0 0 10px;font-size:1.25rem;color:#0b2d2a;font-weight:700;">Systematic Theology</h3>
                <p style="color:#475569;line-height:1.65;font-size:0.95rem;margin:0;">Organise biblical truth into a coherent whole, covering all major doctrines.</p>
            </div>

            <!-- 7. Prophetic Moments -->
            <div class="course-detail-card reveal" style="transition-delay:0.3s;">
                <div class="feature-icon blue" style="margin-bottom:16px;"><i class="fas fa-bullhorn"></i></div>
                <h3 style="margin:0 0 10px;font-size:1.25rem;color:#0b2d2a;font-weight:700;">Prophetic Moments</h3>
                <p style="color:#475569;line-height:1.65;font-size:0.95rem;margin:0;">Examine key prophetic passages and their significance for today.</p>
            </div>

            <!-- 8. Doctrine of God -->
            <!-- <div class="course-detail-card reveal" style="transition-delay:0.35s;">
                <div class="feature-icon rose" style="margin-bottom:16px;"><i class="fas fa-infinity"></i></div>
                <h3 style="margin:0 0 10px;font-size:1.25rem;color:#0b2d2a;font-weight:700;">Doctrine of God</h3>
                <p style="color:#475569;line-height:1.65;font-size:0.95rem;margin:0;">Study the nature, attributes, and triune character of the living God.</p>
            </div> -->

            <!-- 9. Doctrine of Christ -->
            <!-- <div class="course-detail-card reveal" style="transition-delay:0.4s;">
                <div class="feature-icon teal" style="margin-bottom:16px;"><i class="fas fa-cross"></i></div>
                <h3 style="margin:0 0 10px;font-size:1.25rem;color:#0b2d2a;font-weight:700;">Doctrine of Christ</h3>
                <p style="color:#475569;line-height:1.65;font-size:0.95rem;margin:0;">Explore the person, work, and saving significance of Jesus Christ.</p>
            </div> -->

            <!-- 10. Doctrine of Holy Spirit -->
            <!-- <div class="course-detail-card reveal" style="transition-delay:0.45s;">
                <div class="feature-icon amber" style="margin-bottom:16px;"><i class="fas fa-dove"></i></div>
                <h3 style="margin:0 0 10px;font-size:1.25rem;color:#0b2d2a;font-weight:700;">Doctrine of Holy Spirit</h3>
                <p style="color:#475569;line-height:1.65;font-size:0.95rem;margin:0;">Understand the person and ministry of the Holy Spirit in the Church.</p>
            </div> -->

            <!-- 11. Church History -->
            <!-- <div class="course-detail-card reveal" style="transition-delay:0.5s;">
                <div class="feature-icon blue" style="margin-bottom:16px;"><i class="fas fa-landmark"></i></div>
                <h3 style="margin:0 0 10px;font-size:1.25rem;color:#0b2d2a;font-weight:700;">Church History</h3>
                <p style="color:#475569;line-height:1.65;font-size:0.95rem;margin:0;">Journey through the story of the Church from the apostles to today.</p>
            </div> -->
        </div>

        <div style="text-align:center;margin-top:44px;" class="reveal">
            <a href="index.php" class="btn-secondary" style="display:inline-flex;align-items:center;gap:8px;"><i class="fas fa-arrow-left"></i> Back to Home</a>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="section" style="padding-top:20px;">
    <div class="container">
        <div class="cta-banner reveal">
            <h2>Ready to grow in God's Word?</h2>
            <p>Reach out to learn more about enrolment, schedules, and requirements.</p>
            <a href="contact.php" class="btn-white"><i class="fas fa-envelope"></i> Contact Us</a>
        </div>
    </div>
</section>

<?php include 'inc/footer.php'; ?>