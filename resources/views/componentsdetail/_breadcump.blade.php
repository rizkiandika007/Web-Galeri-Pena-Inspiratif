    <!-- BREADCRUMB BAR -->
    <div class="breadcrumb-bar">
        <div class="breadcrumb-bar-inner">
            <a href="{{ route('home') }}">Beranda</a>
            <span class="sep">›</span>
            <a href="{{ route('home') }}#Informasi-Terkini">Informasi Terkini</a>
            <span class="sep">›</span>
            <span class="current">{{ $post->judul }}</span>
        </div>
    </div>