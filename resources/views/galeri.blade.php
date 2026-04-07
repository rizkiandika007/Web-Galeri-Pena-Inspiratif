<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="{{ asset('output.css') }}" rel="stylesheet" />
<link href="{{ asset('main.css') }}" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
rel="stylesheet" />
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css" />
<title>Galeri - Pena Inspiratif</title>
</head>
<body class="font-[Poppins] bg-[#F9F9FC]" style="padding-bottom: 0;">

<!-- NAVBAR MINIMALIS -->
<nav id="Navbar"
    class="w-full fixed top-0 left-0 z-50 transition-all duration-300"
    style="background: rgba(255,255,255,1); box-shadow: 0 1px 12px rgba(0,0,0,0.07);">

    <div class="max-w-[1280px] mx-auto flex justify-between items-center" style="padding: 0 40px; height: 72px;">

        {{-- LOGO --}}
        <a href="{{ route('home') }}" class="flex items-center" style="gap: 12px;">
            <img src="{{ asset('assets/images/logos/pena.jpeg') }}" alt="icon"
                style="width: 44px; height: 44px; object-fit: cover; border-radius: 10px;" />
            <div class="flex flex-col" style="line-height: 1.25;">
                <span class="font-bold text-gray-900" style="font-size: 15px; letter-spacing: -0.2px;">Pena Inspiratif</span>
                <span class="font-medium text-gray-400" style="font-size: 11px; letter-spacing: 0.2px;">Suara Masa Depan</span>
            </div>
        </a>

        {{-- LINKS --}}
        <div class="flex items-center" style="gap: 4px;">
            <a href="{{ route('home') }}" class="nav-link">Beranda</a>
            <a href="{{ route('galeri') }}" class="nav-link">Galeri</a>
            <a href="{{ route('tentangKami') }}" class="nav-link">Tentang Kami</a>

            <div style="width: 1px; height: 18px; background: #E8EBF4; margin: 0 12px;"></div>

            @auth
                <a href="{{ url('/admin') }}" class="nav-cta">Dashboard</a>
            @else
                <a href="{{ url('/admin') }}" class="nav-cta">Login</a>
            @endauth
        </div>

    </div>
</nav>

<!-- HERO BANNER GALERI -->
<section class="w-full" style="background: linear-gradient(135deg, #042C53 0%, #094077ff 50%, #043668ff 100%); margin-top: 32px; padding: 80px 0 72px;">
    <div class="text-center">
        <h1 class="font-bold text-white" style="font-size: 48px; letter-spacing: -0.5px; margin-bottom: 14px;">Galeri Kegiatan</h1>
        <p style="font-size: 16px; color: rgba(255,255,255,0.75);">Dokumentasi Kegiatan Ekstrakurikuler Pena Inspiratif</p>
    </div>
</section>

<!-- GALERI GRID -->
<section id="Galeri-Sekolah" class="max-w-[1130px] mx-auto" style="margin-top: 48px; margin-bottom: 80px; padding: 0 16px;">

    @if($galeries->count() > 0)

        {{-- FEATURED SLIDER (carousel utama, ambil item pertama) --}}
        <div class="main-carousel w-full" style="margin-bottom: 48px;">
            @foreach($galeries as $galery)
                @php
                    $firstFoto = $galery->fotos->first();
                    $postJudul = $galery->post->judul ?? 'Galeri Sekolah';
                    $postUser = $galery->post->user->name ?? 'Admin';
                    $postDate = $galery->created_at->translatedFormat('d F, Y');
                @endphp

                <div class="featured-news-card relative w-full flex shrink-0 overflow-hidden" style="height: 440px; border-radius: 16px;">
                    @if($firstFoto)
                        <img src="{{ asset('storage/' . $firstFoto->file) }}" class="thumbnail absolute w-full h-full object-cover" alt="{{ $postJudul }}" />
                    @else
                        <div class="absolute w-full h-full bg-gray-300 flex items-center justify-center">
                            <span class="text-gray-500">Tidak ada foto</span>
                        </div>
                    @endif

                    <a href="{{ route('post.detail', $galery->post->id) }}" class="absolute w-full h-full z-10" style="background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.1) 50%, transparent 100%);"></a>

                    <div class="w-full flex items-end justify-between relative z-20" style="padding: 40px;">
                        <div class="flex flex-col" style="gap: 8px; max-width: 680px;">
                            <span style="color: rgba(255,255,255,0.5); font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 2px;">
                                {{ $galery->post->kategori->judul ?? 'Galeri Sekolah' }}
                            </span>
                            <a href="{{ route('post.detail', $galery->post->id) }}" class="font-bold text-white hover:underline transition-all duration-300" style="font-size: 30px; line-height: 1.25;">
                                {{ $postJudul }}
                            </a>
                            <p style="color: rgba(255,255,255,0.45); font-size: 13px;">{{ $postDate }} · Oleh {{ $postUser }}</p>
                        </div>

                        <div class="flex items-center" style="gap: 10px; margin-bottom: 20px;">
                            <button class="button--previous slider-btn"><img src="{{ asset('assets/images/icons/arrow.svg') }}" alt="arrow" style="width: 14px; height: 14px;" /></button>
                            <button class="button--next slider-btn rotate-180"><img src="{{ asset('assets/images/icons/arrow.svg') }}" alt="arrow" style="width: 14px; height: 14px;" /></button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- GRID GALERI LAINNYA --}}
        <div>
            <h3 class="font-bold text-gray-800" style="font-size: 20px; margin-bottom: 20px;">Semua Galeri</h3>
            <div class="grid grid-cols-3 gap-5">
                @foreach($galeries as $galery)
                    @php
                        $firstFoto = $galery->fotos->first();
                        $postJudul = $galery->post->judul ?? 'Galeri Sekolah';
                        $postDate = $galery->created_at->translatedFormat('d F, Y');
                        $fotoCount = $galery->fotos->count();
                    @endphp
                    <a href="{{ route('post.detail', $galery->post->id) }}"
                        class="group block relative overflow-hidden bg-white"
                        style="border-radius: 14px; box-shadow: 0 2px 12px rgba(0,0,0,0.07); transition: transform 0.25s ease, box-shadow 0.25s ease;"
                        onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 8px 28px rgba(0,0,0,0.13)';"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 12px rgba(0,0,0,0.07)';">

                        {{-- Thumbnail --}}
                        <div class="relative overflow-hidden" style="height: 210px;">
                            @if($firstFoto)
                                <img src="{{ asset('storage/' . $firstFoto->file) }}"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                    alt="{{ $postJudul }}" />
                            @else
                                <div class="w-full h-full flex items-center justify-center" style="background: #e5e7eb;">
                                    <svg width="40" height="40" fill="none" stroke="#9ca3af" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            @endif

                            {{-- Badge jumlah foto --}}
                            @if($fotoCount > 1)
                            <div class="absolute top-3 right-3 flex items-center gap-1 px-2 py-1 rounded-full text-white font-semibold"
                                style="background: rgba(0,0,0,0.55); font-size: 11px; backdrop-filter: blur(4px);">
                                <svg width="12" height="12" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/></svg>
                                {{ $fotoCount }} foto
                            </div>
                            @endif

                            {{-- Kategori badge --}}
                            <div class="absolute top-3 left-3">
                                <span class="px-2 py-1 rounded-full text-white font-semibold"
                                    style="font-size: 10px; background: rgba(24,95,165,0.85); backdrop-filter: blur(4px); text-transform: uppercase; letter-spacing: 0.5px;">
                                    {{ $galery->post->kategori->judul ?? 'Galeri' }}
                                </span>
                            </div>
                        </div>

                        {{-- Info Card --}}
                        <div class="flex flex-col" style="padding: 16px 18px 18px;">
                            <h4 class="font-bold text-gray-800 leading-snug" style="font-size: 15px; margin-bottom: 8px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                {{ $postJudul }}
                            </h4>
                            <div class="flex items-center justify-between" style="margin-top: auto;">
                                <span style="font-size: 12px; color: #9ca3af;">{{ $postDate }}</span>
                                <span class="flex items-center gap-1 font-semibold" style="font-size: 12px; color: #185fa5;">
                                    Lihat
                                    <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

    @else
        {{-- EMPTY STATE --}}
        <div class="flex flex-col items-center justify-center text-center" style="padding: 80px 0;">
            <div style="width: 80px; height: 80px; border-radius: 50%; background: #E6F1FB; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                <svg width="36" height="36" fill="none" stroke="#185fa5" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
            <h3 class="font-bold text-gray-700" style="font-size: 20px; margin-bottom: 8px;">Belum Ada Galeri</h3>
            <p style="color: #9ca3af; font-size: 14px;">Tambahkan galeri melalui Dashboard untuk menampilkannya di sini.</p>
            @auth
                <a href="{{ url('/admin') }}" class="mt-6 inline-flex items-center gap-2 font-semibold text-white px-5 py-2.5 rounded-full" style="background: #185fa5; font-size: 14px;">
                    Ke Dashboard
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </a>
            @endauth
        </div>
    @endif

</section>

<!-- FOOTER -->
<footer style="margin-top: 80px; background: linear-gradient(135deg, #0a2a4a 0%, #0c3683ff 60%, #1446b1ff 100%); border-top: 1px solid rgba(255,255,255,0.1);">
    <div class="max-w-[1130px] mx-auto" style="padding: 60px 0 24px;">
        <div class="flex justify-between" style="gap: 40px; margin-bottom: 40px;">

            <div class="flex flex-col" style="width: 40%; gap: 16px;">
                <div class="flex items-center" style="gap: 12px;">
                    <img src="{{ asset('assets/images/logos/pena.jpeg') }}" alt="icon" style="width: 80px; height: 56px; border-radius: 8px; object-fit: cover; border: 2px solid rgba(255,255,255,0.2);" />
                    <div>
                        <h3 class="font-bold" style="font-size: 18px; color: #ffffff;">Pena Inspiratif</h3>
                        <p class="font-medium" style="font-size: 13px; color: rgba(255,255,255,0.6);">Suara Masa Depan</p>
                    </div>
                </div>
                <p style="font-size: 14px; line-height: 1.7; color: rgba(255,255,255,0.65);">
                    Wadah dokumentasi dan informasi kegiatan ekstrakurikuler Pena Inspiratif. Membangun kreativitas dan menyebarkan inspirasi melalui karya digital.
                </p>
            </div>

            <div class="flex flex-col" style="width: 25%; gap: 16px;">
                <h4 class="font-bold" style="color: #ffffff; font-size: 15px; letter-spacing: 0.5px;">Tautan Cepat</h4>
                <ul class="flex flex-col" style="gap: 12px;">
                    <li><a href="{{ route('home') }}" class="transition-all font-medium" style="font-size: 14px; color: rgba(255,255,255,0.6); text-decoration: none;">Beranda</a></li>
                    <li><a href="{{ route('galeri') }}" class="transition-all font-medium" style="font-size: 14px; color: rgba(255,255,255,0.6); text-decoration: none;">Galeri</a></li>
                    <li><a href="{{ route('tentangKami') }}" class="transition-all font-medium" style="font-size: 14px; color: rgba(255,255,255,0.6); text-decoration: none;">Tentang Kami</a></li>
                </ul>
            </div>

            <div class="flex flex-col" style="width: 35%; gap: 16px;">
                <h4 class="font-bold" style="color: #ffffff; font-size: 15px; letter-spacing: 0.5px;">Kontak Kami</h4>
                <ul class="flex flex-col" style="gap: 16px;">
                    <li class="flex items-center" style="gap: 12px;">
                        <div style="width: 36px; height: 36px; border-radius: 50%; background: rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; color: #5dade2; flex-shrink: 0;">
                            <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <span style="font-size: 14px; color: rgba(255,255,255,0.65);">info@smkindigal.sch.id</span>
                    </li>
                    <li class="flex items-center" style="gap: 12px;">
                        <div style="width: 36px; height: 36px; border-radius: 50%; background: rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; color: #5dade2; flex-shrink: 0;">
                            <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </div>
                        <span style="font-size: 14px; color: rgba(255,255,255,0.65);">+62 821 3456 7890</span>
                    </li>
                    <li class="flex items-start" style="gap: 12px;">
                        <div style="width: 36px; height: 36px; border-radius: 50%; background: rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; color: #5dade2; flex-shrink: 0;">
                            <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <span style="font-size: 14px; line-height: 1.6; color: rgba(255,255,255,0.65);">Jl. Teknologi No.1, Kec. Inovasi, Kota Karya</span>
                    </li>
                </ul>
            </div>

        </div>

        <div class="flex justify-between items-center w-full" style="padding-top: 24px; border-top: 1px solid rgba(255,255,255,0.1);">
            <p style="font-size: 13px; font-weight: 500; color: rgba(255,255,255,0.5);">
                &copy; {{ date('Y') }} Pena Inspiratif · Uji Kompetensi Keahlian PPLG
            </p>
            <div class="flex gap-3">
                <a href="#" style="width: 36px; height: 36px; border-radius: 50%; background: rgba(255,255,255,0.08); display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,0.6); transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#5dade2'; this.style.color='white';" onmouseout="this.style.backgroundColor='rgba(255,255,255,0.08)'; this.style.color='rgba(255,255,255,0.6)';">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                </a>
                <a href="#" style="width: 36px; height: 36px; border-radius: 50%; background: rgba(255,255,255,0.08); display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,0.6); transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#5dade2'; this.style.color='white';" onmouseout="this.style.backgroundColor='rgba(255,255,255,0.08)'; this.style.color='rgba(255,255,255,0.6)';">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                </a>
                <a href="#" style="width: 36px; height: 36px; border-radius: 50%; background: rgba(255,255,255,0.08); display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,0.6); transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#5dade2'; this.style.color='white';" onmouseout="this.style.backgroundColor='rgba(255,255,255,0.08)'; this.style.color='rgba(255,255,255,0.6)';">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.469h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                </a>
            </div>
        </div>
    </div>
</footer>

<!-- SCRIPTS -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
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
</script>
<script>
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
</body>
</html>