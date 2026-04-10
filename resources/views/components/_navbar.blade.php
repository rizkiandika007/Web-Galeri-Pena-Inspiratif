<!-- NAVBAR MINIMALIS - RESPONSIVE -->
<nav id="Navbar"
    class="w-full fixed top-0 left-0 z-50 transition-all duration-300 bg-white shadow-[0_1px_12px_rgba(0,0,0,0.07)] hover:shadow-[0_4px_24px_rgba(0,0,0,0.12)]">

    <div class="max-w-[1280px] mx-auto flex justify-between items-center" style="padding: 0 24px; height: 72px;">

        {{-- LOGO --}}
        <a href="{{ route('home') }}" class="flex items-center hover:opacity-90 transition-opacity group" style="gap: 12px;">
            <img src="{{ asset('assets/images/logos/pena.jpeg') }}" alt="icon"
                class="group-hover:scale-105 transition-transform duration-300"
                style="width: 44px; height: 44px; object-fit: cover; border-radius: 10px;" />
            <div class="flex flex-col" style="line-height: 1.25;">
                <span class="font-bold text-gray-900 group-hover:text-blue-600 transition-colors duration-300" style="font-size: 15px; letter-spacing: -0.2px;">Pena Inspiratif</span>
                <span class="font-medium text-gray-400 group-hover:text-blue-400 transition-colors duration-300" style="font-size: 11px; letter-spacing: 0.2px;">Suara Masa Depan</span>
            </div>
        </a>

        {{-- DESKTOP LINKS --}}
        <div class="hidden md:flex items-center" style="gap: 4px;">
            <a href="{{ route('home') }}" class="nav-link hover:bg-blue-50 hover:text-blue-600 transition-all duration-300 {{ request()->is('/') ? 'bg-blue-50 !text-blue-600 font-bold' : '' }}">Beranda</a>
            <a href="{{ route('galeri') }}" class="nav-link hover:bg-blue-50 hover:text-blue-600 transition-all duration-300 {{ request()->is('galeri*') ? 'bg-blue-50 !text-blue-600 font-bold' : '' }}">Galeri</a>
            <a href="{{ route('tentangKami') }}" class="nav-link hover:bg-blue-50 hover:text-blue-600 transition-all duration-300 {{ request()->is('tentang-kami*') ? 'bg-blue-50 !text-blue-600 font-bold' : '' }}">Tentang Kami</a>

            <div style="width: 1px; height: 18px; background: #E8EBF4; margin: 0 12px;"></div>

            @auth
                <a href="{{ url('/admin') }}" class="nav-cta hover:bg-blue-700 hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300">Dashboard</a>
            @else
                <a href="{{ url('/admin') }}" class="nav-cta hover:bg-blue-700 hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300">Login</a>
            @endauth
        </div>

        {{-- HAMBURGER BUTTON (Mobile) --}}
        <button id="hamburger-btn" class="md:hidden flex flex-col justify-center items-center w-10 h-10 rounded-lg hover:bg-blue-50 transition-colors duration-200" aria-label="Toggle menu">
            <span class="hamburger-line block w-5 h-0.5 bg-gray-700 transition-all duration-300"></span>
            <span class="hamburger-line block w-5 h-0.5 bg-gray-700 transition-all duration-300 my-1"></span>
            <span class="hamburger-line block w-5 h-0.5 bg-gray-700 transition-all duration-300"></span>
        </button>
    </div>

    {{-- MOBILE MENU --}}
    <div id="mobile-menu" class="md:hidden hidden flex-col bg-white border-t border-gray-100 shadow-lg" style="padding: 12px 24px 20px;">
        <a href="{{ route('home') }}" class="flex items-center py-3 px-3 rounded-lg font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all duration-200 {{ request()->is('/') ? 'bg-blue-50 text-blue-600 font-bold' : '' }}" style="font-size: 15px;">Beranda</a>
        <a href="{{ route('galeri') }}" class="flex items-center py-3 px-3 rounded-lg font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all duration-200 {{ request()->is('galeri*') ? 'bg-blue-50 text-blue-600 font-bold' : '' }}" style="font-size: 15px;">Galeri</a>
        <a href="{{ route('tentangKami') }}" class="flex items-center py-3 px-3 rounded-lg font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all duration-200 {{ request()->is('tentang-kami*') ? 'bg-blue-50 text-blue-600 font-bold' : '' }}" style="font-size: 15px;">Tentang Kami</a>

        <div style="height: 1px; background: #E8EBF4; margin: 12px 0;"></div>

        @auth
            <a href="{{ url('/admin') }}" class="nav-cta text-center hover:bg-blue-700 transition-all duration-300" style="display: block;">Dashboard</a>
        @else
            <a href="{{ url('/admin') }}" class="nav-cta text-center hover:bg-blue-700 transition-all duration-300" style="display: block;">Login</a>
        @endauth
    </div>
</nav>
