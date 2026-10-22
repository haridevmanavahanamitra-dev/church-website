<?php
$pageTitle = "Primates Council - Global | Adon Gospel Church Ministry";
include 'inc/header.php';
?>

<section class="section" style="padding-top:60px;">
    <div class="container">
        <div class="section-header reveal">
            <span class="section-tag">Leadership</span>
            <h2 class="section-title">PRIMATES COUNCIL – GLOBAL</h2>
            <p class="section-subtitle">Meet the full global leadership team serving our international communion.</p>
        </div>
        <div class="council-grid" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:30px;">
            <div class="council-member reveal" style="text-align:center;">
                <img src="images/1.jpeg" alt="Archbishop Thomas Green" style="width:150px;height:150px;border-radius:50%;object-fit:cover;margin:0 auto 10px;">
                <h4 style="margin:0 0 4px;">Rev. Y. Steeven Babu. BA </h4>
                <!-- <p style="color:var(--text-muted);font-size:0.9rem;">Primate – CEEC Global</p> -->
            </div>
            <div class="council-member reveal" style="text-align:center;">
                <img src="images/2.jpeg" alt="Bishop David Wilson" style="width:150px;height:150px;border-radius:50%;object-fit:cover;margin:0 auto 10px;">
                <h4 style="margin:0 0 4px;">Rev. Suresh</h4>
                <!-- <p style="color:var(--text-muted);font-size:0.9rem;">Primate – Africa</p> -->
            </div>
            <div class="council-member reveal" style="text-align:center;">
                <img src="images/3.jpeg" alt="Archbishop John Sathiyakumar" style="width:150px;height:150px;border-radius:50%;object-fit:cover;margin:0 auto 10px;">
                <h4 style="margin:0 0 4px;">Rev. Sanjeev shaker</h4>
                <!-- <p style="color:var(--text-muted);font-size:0.9rem;">Primate – India</p> -->
            </div>
            <!--
                Add further global primate members below by duplicating a
                ".council-member" block above and updating the image, name,
                and title.
            -->
        </div>
        <div style="text-align:center;margin-top:40px;" class="reveal">
            <a href="index.php" class="btn-secondary" style="display:inline-flex;align-items:center;gap:8px;"><i class="fas fa-arrow-left"></i> Back to Home</a>
        </div>
    </div>
</section>

<?php include 'inc/footer.php'; ?>