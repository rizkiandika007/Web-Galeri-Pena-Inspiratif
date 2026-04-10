<!-- SCRIPTS -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script>
    const navbar = document.getElementById('Navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 40) {
            navbar.style.background = 'rgba(255, 255, 255, 0.7)';
            navbar.style.backdropFilter = 'blur(16px)';
            navbar.style.webkitBackdropFilter = 'blur(16px)';
            navbar.style.boxShadow = '0 1px 24px rgba(0,0,0,0.08)';
        } else {
            navbar.style.background = 'rgba(255, 255, 255, 1)';
            navbar.style.backdropFilter = 'none';
            navbar.style.webkitBackdropFilter = 'none';
            navbar.style.boxShadow = '0 1px 12px rgba(0,0,0,0.07)';
        }
    });

    $('.main-carousel').flickity({
    cellAlign: 'left',
    contain: true,
    prevNextButtons: false,
    pageDots: false,
    autoPlay: 4000,
    wrapAround: true
});
var $carousel = $('.main-carousel').flickity();
$('.button--previous').on('click', function() { $carousel.flickity('previous'); });
$('.button--next').on('click', function() { $carousel.flickity('next'); });
</script>

<script>
    const btn = document.getElementById('hamburger-btn');
    const menu = document.getElementById('mobile-menu');
    const lines = btn.querySelectorAll('.hamburger-line');

    btn.addEventListener('click', () => {
        const isOpen = !menu.classList.contains('hidden');
        menu.classList.toggle('hidden');
        menu.classList.toggle('flex');

        // Animasi hamburger → X
        if (!isOpen) {
            lines[0].style.transform = 'translateY(6px) rotate(45deg)';
            lines[1].style.opacity = '0';
            lines[2].style.transform = 'translateY(-6px) rotate(-45deg)';
        } else {
            lines[0].style.transform = '';
            lines[1].style.opacity = '1';
            lines[2].style.transform = '';
        }
    });
</script>