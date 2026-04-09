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