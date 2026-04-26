<!-- SCRIPTS -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script>
    // Scroll effect → target inner pill container, bukan <nav> luar
    const navPill = document.querySelector('#Navbar .max-w-\\[1280px\\]');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 40) {
            navPill.style.background = 'rgba(255, 255, 255, 0.75)';
            navPill.style.backdropFilter = 'blur(16px)';
            navPill.style.webkitBackdropFilter = 'blur(16px)';
            navPill.style.boxShadow = '0 4px 24px rgba(0,0,0,0.10)';
            navPill.style.borderColor = 'rgba(0,0,0,0.06)';
        } else {
            navPill.style.background = 'rgba(255, 255, 255, 1)';
            navPill.style.backdropFilter = 'none';
            navPill.style.webkitBackdropFilter = 'none';
            navPill.style.boxShadow = '0 2px 16px rgba(0,0,0,0.06)';
            navPill.style.borderColor = 'rgba(0,0,0,0.06)';
        }
    });


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

    // Tutup mobile menu saat klik di luar navbar
    document.addEventListener('click', (e) => {
        if (!btn.contains(e.target) && !menu.contains(e.target)) {
            menu.classList.add('hidden');
            menu.classList.remove('flex');
            lines[0].style.transform = '';
            lines[1].style.opacity = '1';
            lines[2].style.transform = '';
        }
    });

    // Mobile Dropdown Toggle
    const mobileDropdownBtn = document.getElementById('mobile-dropdown-btn');
    const mobileDropdownMenu = document.getElementById('mobile-dropdown-menu');
    const mobileDropdownIcon = document.getElementById('mobile-dropdown-icon');

    if (mobileDropdownBtn) {
        mobileDropdownBtn.addEventListener('click', (e) => {
            e.preventDefault();
            mobileDropdownMenu.classList.toggle('hidden');
            mobileDropdownMenu.classList.toggle('flex');
            mobileDropdownIcon.classList.toggle('rotate-180');
        });
    }
</script>