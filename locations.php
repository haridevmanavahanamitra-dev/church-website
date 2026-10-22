<?php
$pageTitle = "Locations - Adon Gospel Church Ministry";
include 'inc/header.php';

$locations = [
    'Peddamadhuru',
    'Chavapadu',
    'Narakulapadu',
    'Amaravathi',
    'Dharanikota',
    'Bayyavaram',
    'Munnangi',
];
?>

<section class="section">
    <div class="container">
        <div class="section-header reveal">
            <span class="section-tag">Our Churches</span>
            <h1 class="section-title">Church <em>Locations</em></h1>
            <p class="section-subtitle">Find an Adon Gospel Church Ministry community in these locations.</p>
        </div>
        <div class="features-grid">
            <?php foreach ($locations as $location): ?>
                <article class="feature-card reveal">
                    <div class="feature-icon teal"><i class="fas fa-location-dot" aria-hidden="true"></i></div>
                    <h3><?php echo htmlspecialchars($location, ENT_QUOTES, 'UTF-8'); ?></h3>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include 'inc/footer.php'; ?>
