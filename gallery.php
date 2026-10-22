<?php
$pageTitle = "Gallery - Adon Gospel Church Ministry";
include 'inc/header.php';
?>

<!-- Optional hero (uncomment if needed)
<div class="page-hero">
    <h1>Gallery</h1>
    <div class="breadcrumb"><a href="index.php">Home</a> <i class="fas fa-chevron-right" style="font-size:0.65rem;"></i> Gallery</div>
</div>
-->

<section class="section gallery-section">
    <div class="container">
        <div class="section-title text-center toggle-reveal">
            <span class="section-subtitle">Our Moments</span>
            <h2>Church Gallery</h2>
            <div class="title-divider"><span></span><i class="fas fa-cross"></i><span></span></div>
        </div>

        <div class="gallery-grid">
            <?php
                $galleryImages = [
                    'images/g_1.jpeg',
                    'images/g_2.jpeg',
                    'images/g_3.jpeg',
                    // 'images/g_4.jpeg',
                    'images/g_5.jpeg',
                    'images/g_6.jpeg',
                    'images/g_7.jpeg',
                    'images/g_8.png',
                    'images/b_1.jpeg',
                    'images/b_2.jpeg',
                    'images/b_3.jpeg',
                    'images/b_4.jpeg',
                    'images/b_5.jpeg',
                    'images/b_6.jpeg',
                ];
                foreach ($galleryImages as $index => $img):
                    $delay = ($index % 4) * 0.08;
            ?>
                <div class="gallery-item toggle-reveal" style="transition-delay:<?= $delay ?>s;" data-index="<?= $index ?>">
                    <div class="gallery-inner">
                        <img src="<?= $img ?>" alt="Gallery image <?= $index + 1 ?>" loading="lazy">
                        <div class="gallery-hover">
                            <span class="gallery-icon"><i class="fas fa-expand"></i></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Lightbox -->
<div class="gallery-lightbox" id="galleryLightbox">
    <button class="lb-close" aria-label="Close"><i class="fas fa-times"></i></button>
    <button class="lb-prev" aria-label="Previous"><i class="fas fa-chevron-left"></i></button>
    <button class="lb-next" aria-label="Next"><i class="fas fa-chevron-right"></i></button>
    <div class="lb-content">
        <img src="" alt="Gallery preview" id="lbImage">
        <div class="lb-counter"><span id="lbCurrent">1</span> / <span id="lbTotal">1</span></div>
    </div>
</div>

<style>
/* ===== Gallery Section ===== */
.gallery-section {
    padding: 70px 0 90px;
    background: linear-gradient(180deg, #faf7f2 0%, #ffffff 100%);
}

.section-subtitle {
    display: inline-block;
    font-size: 0.9rem;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: #b8935a;
    font-weight: 600;
    margin-bottom: 10px;
}

.title-divider {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    margin-top: 15px;
    color: #b8935a;
}
.title-divider span {
    width: 60px;
    height: 1px;
    background: #b8935a;
    opacity: 0.6;
}
.title-divider i { font-size: 0.9rem; }

/* ===== Toggle Reveal animation =====
   Elements start hidden and are revealed when they enter the viewport.
   The class is REMOVED when they leave, so they re-animate on every
   scroll down AND scroll up. */
.toggle-reveal {
    opacity: 0;
    transform: translateY(40px) scale(0.92);
    transition: opacity 0.7s cubic-bezier(0.22, 0.8, 0.28, 1),
                transform 0.7s cubic-bezier(0.22, 0.8, 0.28, 1);
    will-change: opacity, transform;
}
.toggle-reveal.is-visible {
    opacity: 1;
    transform: translateY(0) scale(1);
}

/* ===== Gallery Grid ===== */
.gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 22px;
    margin-top: 50px;
}

.gallery-item {
    position: relative;
    border-radius: 14px;
    overflow: hidden;
    cursor: pointer;
    background: #eee;
    aspect-ratio: 4 / 3;
    box-shadow: 0 6px 20px rgba(0,0,0,0.06);
}

/* Hover lift is handled on the inner element so it doesn't fight
   with the reveal transform on .gallery-item */
.gallery-inner {
    position: relative;
    width: 100%;
    height: 100%;
    overflow: hidden;
    transition: transform 0.5s ease, box-shadow 0.5s ease;
}

.gallery-item:hover .gallery-inner {
    transform: translateY(-6px);
    box-shadow: 0 18px 40px rgba(0,0,0,0.15);
}

@media (min-width: 900px) {
    .gallery-item:first-child {
        grid-column: span 2;
        aspect-ratio: 16 / 9;
    }
}

.gallery-inner img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.8s cubic-bezier(0.2, 0.8, 0.2, 1);
}

.gallery-item:hover .gallery-inner img {
    transform: scale(1.08);
}

/* Hover overlay — icon only */
.gallery-hover {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(0,0,0,0) 40%, rgba(0,0,0,0.55) 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.4s ease;
}

.gallery-item:hover .gallery-hover { opacity: 1; }

.gallery-icon {
    width: 52px;
    height: 52px;
    border-radius: 50%;
    background: rgba(255,255,255,0.9);
    color: #1a1a1a;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    transform: scale(0.7);
    transition: transform 0.4s cubic-bezier(0.2, 0.8, 0.2, 1);
}

.gallery-item:hover .gallery-icon { transform: scale(1); }

/* ===== Lightbox ===== */
.gallery-lightbox {
    position: fixed;
    inset: 0;
    background: rgba(10,10,10,0.95);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    padding: 40px 20px;
    opacity: 0;
    transition: opacity 0.3s ease;
}
.gallery-lightbox.active {
    display: flex;
    opacity: 1;
}

.lb-content {
    position: relative;
    max-width: 90vw;
    max-height: 85vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    transform: scale(0.95);
    transition: transform 0.3s ease;
}
.gallery-lightbox.active .lb-content { transform: scale(1); }

#lbImage {
    max-width: 90vw;
    max-height: 80vh;
    object-fit: contain;
    border-radius: 8px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.6);
    background: #111;
}

.lb-counter {
    margin-top: 14px;
    color: rgba(255,255,255,0.75);
    font-size: 0.85rem;
    letter-spacing: 2px;
}

.lb-close, .lb-prev, .lb-next {
    position: absolute;
    background: rgba(255,255,255,0.08);
    border: 1px solid rgba(255,255,255,0.2);
    color: #fff;
    width: 48px;
    height: 48px;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.3s ease, transform 0.3s ease;
    z-index: 2;
}
.lb-close:hover, .lb-prev:hover, .lb-next:hover {
    background: rgba(184, 147, 90, 0.9);
    transform: scale(1.08);
}

.lb-close { top: 24px; right: 24px; }
.lb-prev  { left: 24px; top: 50%; transform: translateY(-50%); }
.lb-next  { right: 24px; top: 50%; transform: translateY(-50%); }
.lb-prev:hover, .lb-next:hover { transform: translateY(-50%) scale(1.08); }

@media (max-width: 600px) {
    .gallery-grid {
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 12px;
    }
    .gallery-item:first-child {
        grid-column: span 2;
        aspect-ratio: 16 / 10;
    }
    .lb-prev, .lb-next { width: 40px; height: 40px; }
    .lb-close { top: 12px; right: 12px; width: 40px; height: 40px; }
    .lb-prev { left: 8px; }
    .lb-next { right: 8px; }
}
</style>

<script>
/* =========================================================
   1) TOGGLE-REVEAL ON SCROLL (both directions)
   =========================================================
   - Elements with .toggle-reveal start hidden (opacity:0, translated).
   - When they enter the viewport  -> add .is-visible  (fade + slide in).
   - When they leave the viewport  -> remove .is-visible (fade + slide out).
   This gives the appear/disappear effect on BOTH scroll down and scroll up.
*/
(function () {
    const revealEls = document.querySelectorAll('.toggle-reveal');
    if (!revealEls.length) return;

    // Fallback for very old browsers: just show everything.
    if (!('IntersectionObserver' in window)) {
        revealEls.forEach(el => el.classList.add('is-visible'));
        return;
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
            } else {
                // Remove on leaving the viewport -> re-animates on re-entry
                entry.target.classList.remove('is-visible');
            }
        });
    }, {
        // Fire slightly before the element fully enters / after it fully leaves
        threshold: 0.15,
        rootMargin: '0px 0px -8% 0px'
    });

    revealEls.forEach(el => observer.observe(el));
})();

/* =========================================================
   2) LIGHTBOX
   ========================================================= */
(function () {
    const items = document.querySelectorAll('.gallery-item');
    const lightbox = document.getElementById('galleryLightbox');
    const lbImage  = document.getElementById('lbImage');
    const lbCurrent= document.getElementById('lbCurrent');
    const lbTotal  = document.getElementById('lbTotal');
    const btnClose = lightbox.querySelector('.lb-close');
    const btnPrev  = lightbox.querySelector('.lb-prev');
    const btnNext  = lightbox.querySelector('.lb-next');

    const images = Array.from(items).map(it => it.querySelector('img').src);
    let currentIndex = 0;

    lbTotal.textContent = images.length;

    function openLightbox(index) {
        currentIndex = index;
        updateLightbox();
        lightbox.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
    function closeLightbox() {
        lightbox.classList.remove('active');
        document.body.style.overflow = '';
    }
    function updateLightbox() {
        lbImage.src = images[currentIndex];
        lbCurrent.textContent = currentIndex + 1;
    }
    function next() {
        currentIndex = (currentIndex + 1) % images.length;
        updateLightbox();
    }
    function prev() {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        updateLightbox();
    }

    items.forEach((item, i) => item.addEventListener('click', () => openLightbox(i)));

    btnClose.addEventListener('click', closeLightbox);
    btnNext.addEventListener('click', next);
    btnPrev.addEventListener('click', prev);

    lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox) closeLightbox();
    });

    document.addEventListener('keydown', (e) => {
        if (!lightbox.classList.contains('active')) return;
        if (e.key === 'Escape')     closeLightbox();
        if (e.key === 'ArrowRight') next();
        if (e.key === 'ArrowLeft')  prev();
    });
})();
</script>

<?php include 'inc/footer.php'; ?>