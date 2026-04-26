@php
    $heroImage = null;
    if(isset($post) && $post->galeries) {
        $allFotos = collect();
        foreach($post->galeries as $galeri) {
            if($galeri->fotos) {
                foreach($galeri->fotos as $foto) {
                    $allFotos->push($foto);
                }
            }
        }
        if($allFotos->isNotEmpty()) {
            $heroImage = $allFotos->first()->file;
        }
    }
@endphp
   <!-- HERO DETAIL -->
    <section class="max-w-[1130px] mx-auto" style="margin-top: 30px;">
        <a href="{{ route('home') }}" class="back-btn" style="margin-bottom: 20px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg>
            Kembali ke Beranda
        </a>

        <div class="hero-detail">


            @if($heroImage)
                <img src="{{ asset('storage/' . $heroImage) }}" class="blur-bg" alt="blur background" />
                <img src="{{ asset('storage/' . $heroImage) }}" class="main-img" alt="{{ $post->judul }}" />
            @else
                <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #042C53 0%, #185FA5 50%, #B5D4F4 100%); display: flex; align-items: center; justify-content: center; position: relative; z-index: 0;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.4)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                </div>
            @endif
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}">Beranda</a>
                    <span class="separator">›</span>
                    <span style="color: rgba(255,255,255,0.7);">{{ $post->kategori->judul ?? 'Berita' }}</span>
                </div>
                <span class="kategori-tag kategori-tag-white">{{ $post->kategori->judul ?? 'BERITA' }}</span>
                <h1 class="font-bold text-white" style="font-size: 32px; line-height: 1.3; margin-top: 12px; max-width: 720px;">{{ $post->judul }}</h1>
                <div class="meta-row">
                    <div class="meta-item">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        {{ $post->created_at->translatedFormat('d F Y') }}
                    </div>
                    <div class="meta-dot"></div>
                    <div class="meta-item">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        {{ $post->user->name ?? 'Admin' }}
                    </div>
                </div>
            </div>
        </div>
    </section>
