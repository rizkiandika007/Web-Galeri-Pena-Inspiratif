import './bootstrap';
import Swiper from 'swiper';
import 'swiper/css/bundle';

// Inisialisasi Swiper setelah DOM siap
document.addEventListener('DOMContentLoaded', function() {
    const swiperGaleri = new Swiper('.swiper-galeri', {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.button--next',
            prevEl: '.button--previous',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        effect: 'slide',
        speed: 800,
    });
});