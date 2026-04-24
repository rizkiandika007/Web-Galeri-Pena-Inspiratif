<nav id="Navbar" class="w-full fixed top-0 left-0 z-50 transition-all duration-300" style="padding: 12px 24px;">
    <div class="max-w-[1280px] mx-auto flex justify-between items-center bg-white border border-gray-100 shadow-[0_2px_16px_rgba(0,0,0,0.06)] hover:shadow-[0_4px_24px_rgba(0,0,0,0.1)] transition-shadow duration-300" style="padding: 10px 24px; height: 60px; border-radius: 999px;">

        {{-- LOGO --}}
        <a href="{{ route('home') }}" class="flex items-center hover:opacity-90 transition-opacity group" style="gap: 10px;">
            <img src="{{ asset('assets/images/logos/pena.jpeg') }}" alt="icon"
                class="group-hover:scale-105 transition-transform duration-300"
                style="width: 60px; height: 60px; object-fit: cover; border-radius: 10px;" />
            <div class="flex flex-col" style="line-height: 1.2;">
                <span class="font-bold text-gray-900 group-hover:text-blue-600 transition-colors duration-300" style="font-size: 14px; letter-spacing: -0.2px;">Pena Inspiratif</span>
                <span class="font-medium text-gray-400 group-hover:text-blue-400 transition-colors duration-300" style="font-size: 10px; letter-spacing: 0.2px;">Suara Masa Depan</span>
            </div>
        </a>

        {{-- DESKTOP LINKS --}}
        <div class="hidden md:flex items-center" style="gap: 2px;">
            <a href="{{ route('home') }}" class="nav-link hover:bg-blue-50 hover:text-blue-600 transition-all duration-200 {{ request()->is('/') ? 'bg-blue-50 !text-blue-600 font-bold' : '' }}" style="padding: 7px 14px; border-radius: 999px; font-size: 14px;">Beranda</a>
            <a href="{{ route('agenda') }}" class="nav-link hover:bg-blue-50 hover:text-blue-600 transition-all duration-200 {{ request()->is('agenda*') ? 'bg-blue-50 !text-blue-600 font-bold' : '' }}" style="padding: 7px 14px; border-radius: 999px; font-size: 14px;">Agenda</a>
            <a href="{{ route('galeri') }}" class="nav-link hover:bg-blue-50 hover:text-blue-600 transition-all duration-200 {{ request()->is('galeri*') ? 'bg-blue-50 !text-blue-600 font-bold' : '' }}" style="padding: 7px 14px; border-radius: 999px; font-size: 14px;">Galeri</a>
            <a href="{{ route('tentangKami') }}" class="nav-link hover:bg-blue-50 hover:text-blue-600 transition-all duration-200 {{ request()->is('tentang-kami*') ? 'bg-blue-50 !text-blue-600 font-bold' : '' }}" style="padding: 7px 14px; border-radius: 999px; font-size: 14px;">Tentang Kami</a>
        </div>

        {{-- HAMBURGER BUTTON (Mobile) --}}
        <button id="hamburger-btn" class="md:hidden flex flex-col justify-center items-center w-10 h-10 border border-gray-100 hover:bg-blue-50 transition-colors duration-200" style="border-radius: 999px;" aria-label="Toggle menu">
            <span class="hamburger-line block w-5 h-0.5 bg-gray-600 transition-all duration-300"></span>
            <span class="hamburger-line block w-5 h-0.5 bg-gray-600 transition-all duration-300 my-1"></span>
            <span class="hamburger-line block w-5 h-0.5 bg-gray-600 transition-all duration-300"></span>
        </button>
    </div>

    {{-- MOBILE MENU --}}
    <div id="mobile-menu" class="md:hidden hidden flex-col bg-white border border-gray-100 shadow-[0_4px_20px_rgba(0,0,0,0.07)] max-w-[1280px] mx-auto mt-2" style="padding: 12px; border-radius: 20px;">
        <a href="{{ route('home') }}" class="flex items-center py-2.5 px-3 font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all duration-200 {{ request()->is('/') ? 'bg-blue-50 text-blue-600 font-bold' : '' }}" style="font-size: 14px; border-radius: 12px;">Beranda</a>
        <a href="{{ route('agenda') }}" class="flex items-center py-2.5 px-3 font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all duration-200 {{ request()->is('agenda*') ? 'bg-blue-50 text-blue-600 font-bold' : '' }}" style="font-size: 14px; border-radius: 12px;">Agenda</a>
        <a href="{{ route('galeri') }}" class="flex items-center py-2.5 px-3 font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all duration-200 {{ request()->is('galeri*') ? 'bg-blue-50 text-blue-600 font-bold' : '' }}" style="font-size: 14px; border-radius: 12px;">Galeri</a>
        <a href="{{ route('tentangKami') }}" class="flex items-center py-2.5 px-3 font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all duration-200 {{ request()->is('tentang-kami*') ? 'bg-blue-50 text-blue-600 font-bold' : '' }}" style="font-size: 14px; border-radius: 12px;">Tentang Kami</a>
    </div>
</nav>