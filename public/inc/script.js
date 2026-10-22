// Preloader
document.body.style.overflow = 'hidden';
window.addEventListener('load', function() {
    setTimeout(function() {
        const pre = document.getElementById('preloader');
        if (pre) pre.classList.add('hidden');
        document.body.style.overflowY = 'visible';
        document.body.style.overflowX = 'hidden';
    }, 1200);
});

// Header scroll state
const header = document.getElementById('header');
const backToTop = document.getElementById('backToTop');
window.addEventListener('scroll', function() {
    if (header) header.classList.toggle('scrolled', window.scrollY > 40);
    if (backToTop) backToTop.classList.toggle('visible', window.scrollY > 400);
});

// Hamburger / mobile nav
const hamburger = document.getElementById('hamburger');
const navMenu = document.getElementById('navMenu');
if (hamburger && navMenu) {
    hamburger.addEventListener('click', function() {
        hamburger.classList.toggle('active');
        navMenu.classList.toggle('open');
    });
    navMenu.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', () => {
            hamburger.classList.remove('active');
            navMenu.classList.remove('open');
        });
    });
}

// Scroll reveal
const revealElements = document.querySelectorAll('.reveal, .reveal-left, .reveal-right, .reveal-scale');
const observer = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            observer.unobserve(entry.target);
        }
    });
}, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
revealElements.forEach(el => observer.observe(el));

// FAQ accordion
document.querySelectorAll('.faq-question').forEach(btn => {
    btn.addEventListener('click', function() {
        const item = this.parentElement;
        const isActive = item.classList.contains('active');
        document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('active'));
        if (!isActive) item.classList.add('active');
    });
});

// Contact / support form
const supportForm = document.getElementById('supportForm');
if (supportForm) {
    supportForm.addEventListener('submit', function(e) {
        e.preventDefault();
        showToast('Message sent successfully! We\'ll respond within 24 hours.');
        this.reset();
    });
}

// Membership form download - Combine all three form images into PDF
function downloadApplication() {
    // Using jsPDF with direct image embedding
    const { jsPDF } = window.jspdf;
    const pdf = new jsPDF('p', 'mm', 'a4');
    
    const images = [
        'images/form_1.jpeg',
        'images/form_2.jpeg',
        'images/form_3.jpeg'
    ];
    
    let loadedCount = 0;
    const imageData = [];
    
    // Load all images first
    images.forEach((imagePath, index) => {
        const img = new Image();
        img.crossOrigin = 'anonymous';
        img.onload = function() {
            const canvas = document.createElement('canvas');
            canvas.width = img.width;
            canvas.height = img.height;
            const ctx = canvas.getContext('2d');
            ctx.drawImage(img, 0, 0);
            imageData[index] = canvas.toDataURL('image/jpeg');
            loadedCount++;
            
            // Once all images are loaded, create PDF
            if (loadedCount === images.length) {
                createPDF(pdf, imageData);
            }
        };
        img.onerror = function() {
            console.error('Failed to load image: ' + imagePath);
            loadedCount++;
            if (loadedCount === images.length) {
                createPDF(pdf, imageData);
            }
        };
        img.src = imagePath;
    });
    
    function createPDF(pdfDoc, images) {
        const pageWidth = pdfDoc.internal.pageSize.getWidth();
        const pageHeight = pdfDoc.internal.pageSize.getHeight();
        
        images.forEach((imgData, idx) => {
            if (imgData) {
                if (idx > 0) {
                    pdfDoc.addPage();
                }
                pdfDoc.addImage(imgData, 'JPEG', 0, 0, pageWidth, pageHeight);
            }
        });
        
        pdfDoc.save('Evangelical_Anglican_Church_Application_Forms.pdf');
        showToast('Application forms PDF downloaded successfully!');
    }
}
window.downloadApplication = downloadApplication;


// Toast
function showToast(message) {
    const existing = document.querySelector('.toast-notification');
    if (existing) existing.remove();
    const toast = document.createElement('div');
    toast.className = 'toast-notification';
    toast.innerHTML = '<i class="fas fa-check-circle" style="color:#b8863a;font-size:1.1rem;"></i> <span>' + message + '</span>';
    document.body.appendChild(toast);
    setTimeout(() => { if (toast.parentNode) toast.remove(); }, 3000);
}
window.showToast = showToast;
