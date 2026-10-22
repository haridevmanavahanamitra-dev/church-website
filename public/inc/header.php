<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'Adon Gospel Church Ministry'; ?></title>
    <meta name="description" content="Adon Gospel Church Ministry is a community of faith, hope, and love. Join us for worship, biblical teaching, and service.">
    <link rel="icon" type="image/png" href="images/a_logo_transparent.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=support_agent">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,500;0,9..144,600;0,9..144,700;1,9..144,500&family=Public+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="inc/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.0/pdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</head>
<body>
    <?php include 'preloader.php'; ?>

    <!-- Header -->
    <header class="header" id="header">
        <div class="container">
            <a class="logo" href="index.php" aria-label="Adon Gospel Church Ministry home">
                <img class="site-logo-image" src="images\n_logo-no_bg.png" alt="Adon Gospel Church Ministry logo">
                <span class="logo-word">Adon Gospel Church Ministry</span>
            </a>
            <nav class="nav-menu" id="navMenu">
                <a class="mobile-nav-brand" href="index.php" aria-label="Adon Gospel Church Ministry home">
                    <img src="images\n_logo-no_bg.png" alt="">
                    <span>Adon Gospel Church Ministry</span>
                </a>
                <a href="index.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">Home</a>
                <a href="about.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : ''; ?>">About</a>
                <a href="locations.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'locations.php' ? 'active' : ''; ?>">Locations</a>
                <a href="ministries.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'ministries.php' ? 'active' : ''; ?>">Ministries</a>
                <a href="resources.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'resources.php' ? 'active' : ''; ?>">Resources</a>
                <!-- <a href="counselling.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'counselling.php' ? 'active' : ''; ?>">Counseling</a> -->
                <!-- <a href="faq.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'faq.php' ? 'active' : ''; ?>">FAQ</a> -->
                <a href="contact.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : ''; ?>">Contact</a>
            </nav>
            <div class="nav-actions">
                <a class="btn-apply-nav" href="watch-online.php" aria-label="Watch Online">
                    <i class="fas fa-play"></i> Watch Online
                </a>
                <button class="hamburger" id="hamburger" aria-label="Toggle menu">
                    <span></span><span></span><span></span>
                </button>
            </div>
        </div>
    </header>

    <main>