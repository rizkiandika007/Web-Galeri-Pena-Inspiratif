<nav id="Navbar" class="w-full fixed top-0 left-0 z-50 transition-all duration-300" style="padding: 12px 24px;">
    <div class="max-w-[1280px] mx-auto flex justify-between items-center bg-white border border-gray-100 shadow-[0_2px_16px_rgba(0,0,0,0.06)] hover:shadow-[0_4px_24px_rgba(0,0,0,0.1)] transition-shadow duration-300" style="padding: 10px 24px; height: 60px; border-radius: 999px; overflow: visible;">

        {{-- LOGO --}}
        <a href="{{ route('home') }}" class="flex items-center hover:opacity-90 transition-opacity group" style="gap: 10px;">
            <img src="{{ asset('assets/images/logos/pena.jpeg') }}" alt="icon"
                class="group-hover:scale-105 transition-transform duration-300"
                style="width: 60px; height: 45px; object-fit: cover; border-radius: 10px;" />
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
            
            {{-- TENTANG KAMI DROPDOWN --}}
            <div class="relative group" style="padding: 7px 0;">
                <a href="{{ route('tentangKami') }}" class="nav-link flex items-center hover:bg-blue-50 hover:text-blue-600 transition-all duration-200 {{ request()->is('tentang-kami*') ? 'bg-blue-50 !text-blue-600 font-bold' : '' }}" style="padding: 7px 14px; border-radius: 999px; font-size: 14px; gap: 4px;">
                    Tentang Kami
                    <svg class="w-4 h-4 transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </a>
                <div class="absolute right-0 mt-2 w-48 bg-white border border-gray-100 rounded-xl shadow-[0_10px_40px_rgba(0,0,0,0.08)] opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top-right group-hover:translate-y-0 translate-y-2 z-[100]">
                    <div class="py-2">
                        <a href="{{ route('tentangKami') }}" class="block px-4 py-2.5 text-[14px] font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">Tentang Kami</a>
                        <a href="{{ route('pengurus') }}" class="block px-4 py-2.5 text-[14px] font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">Pengurus</a>
                    </div>
                </div>
            </div>
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
        
        {{-- TENTANG KAMI DROPDOWN (Mobile) --}}
        <div class="flex flex-col w-full">
            <button id="mobile-dropdown-btn" class="flex justify-between items-center w-full py-2.5 px-3 font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all duration-200 {{ request()->is('tentang-kami*') ? 'bg-blue-50 text-blue-600 font-bold' : '' }}" style="font-size: 14px; border-radius: 12px;">
                <span>Tentang Kami</span>
                <svg id="mobile-dropdown-icon" class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div id="mobile-dropdown-menu" class="hidden flex-col pl-4 mt-1 space-y-1 mb-2">
                <a href="{{ route('tentangKami') }}" class="block py-2 px-3 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors font-medium">Tentang Kami</a>
                <a href="{{ route('pengurus') }}" class="block py-2 px-3 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors font-medium">Pengurus</a>
            </div>
        </div>
    </div>
</nav>