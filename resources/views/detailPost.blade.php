<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('output.css') }}" rel="stylesheet" />
    <link href="{{ asset('main.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <title>{{ $post->judul }} — SMK Indonesia Digital</title>
    <meta name="description" content="{{ Str::limit(strip_tags($post->isi), 160) }}" />
    <style>
        :root {
            --primary: #185FA5;
            --primary-light: #378ADD;
            --primary-lighter: #B5D4F4;
            --primary-lightest: #E6F1FB;
            --primary-dark: #0C447C;
            --primary-darker: #042C53;
        }

        /* ========== DETAIL PAGE STYLES ========== */
        .hero-detail {
            position: relative;
            width: 100%;
            height: 420px;
            border-radius: 20px;
            overflow: hidden;
        }

        .hero-detail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .hero-detail:hover img {
            transform: scale(1.04);
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.3) 40%, rgba(0,0,0,0.05) 100%);
            z-index: 1;
        }

        .hero-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 2;
            padding: 48px;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 16px;
        }

        .breadcrumb a, .breadcrumb span {
            font-size: 12px;
            font-weight: 500;
            color: rgba(255,255,255,0.5);
            transition: color 0.2s ease;
        }

        .breadcrumb a:hover {
            color: #85B7EB;
        }

        .breadcrumb .separator {
            color: rgba(255,255,255,0.3);
        }

        .meta-row {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-top: 16px;
            flex-wrap: wrap;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            color: rgba(255,255,255,0.6);
        }

        .meta-item svg {
            width: 14px;
            height: 14px;
            opacity: 0.7;
        }

        .meta-dot {
            width: 3px;
            height: 3px;
            border-radius: 50%;
            background: rgba(255,255,255,0.25);
        }

        /* Content area */
        .content-grid {
            display: flex;
            gap: 36px;
            margin-top: 48px;
        }

        .content-main {
            flex: 1;
            min-width: 0;
        }

        .content-sidebar {
            width: 320px;
            flex-shrink: 0;
        }

        .article-body {
            background: #fff;
            border-radius: 20px;
            padding: 40px;
            border: 2px solid rgba(24,95,165,0.15);
            box-shadow: 0 1px 3px rgba(24,95,165,0.04);
        }

        /* Photo gallery section */
        .gallery-section {
            margin-top: 36px;
        }

        .gallery-section-title {
            font-size: 16px;
            font-weight: 700;
            color: #1A1D26;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .gallery-section-title::before {
            content: '';
            width: 4px;
            height: 20px;
            background: var(--primary);
            border-radius: 4px;
        }

        .photo-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        @media (min-width: 640px) {
            .photo-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        .photo-grid-item {
            position: relative;
            aspect-ratio: 1;
            border-radius: 14px;
            overflow: hidden;
            cursor: pointer;
            border: 1px solid rgba(24,95,165,0.15);
        }

        .photo-grid-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .photo-grid-item:hover img {
            transform: scale(1.08);
        }

        .photo-grid-item::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.3) 0%, transparent 50%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .photo-grid-item:hover::after {
            opacity: 1;
        }

        .photo-caption {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 12px;
            z-index: 2;
            font-size: 11px;
            font-weight: 600;
            color: white;
            opacity: 0;
            transform: translateY(6px);
            transition: all 0.3s ease;
        }

        .photo-grid-item:hover .photo-caption {
            opacity: 1;
            transform: translateY(0);
        }

        /* Sidebar */
        .sidebar-card {
            background: #fff;
            border-radius: 20px;
            padding: 28px;
            border: 2px solid rgba(24,95,165,0.15);
            box-shadow: 0 1px 3px rgba(24,95,165,0.04);
        }

        .sidebar-title {
            font-size: 15px;
            font-weight: 700;
            color: #1A1D26;
            margin-bottom: 20px;
            padding-bottom: 14px;
            border-bottom: 1px solid rgba(24,95,165,0.12);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .sidebar-title svg {
            width: 18px;
            height: 18px;
            color: var(--primary);
        }

        .related-post-item {
            display: flex;
            gap: 14px;
            padding: 12px 0;
            border-bottom: 1px solid rgba(24,95,165,0.08);
            transition: all 0.25s ease;
        }

        .related-post-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .related-post-item:first-child {
            padding-top: 0;
        }

        .related-post-item:hover {
            transform: translateX(4px);
        }

        .related-post-thumb {
            width: 72px;
            height: 72px;
            border-radius: 12px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .related-post-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .related-post-item:hover .related-post-thumb img {
            transform: scale(1.08);
        }

        .related-post-info {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 4px;
            min-width: 0;
        }

        .related-post-info h4 {
            font-size: 13px;
            font-weight: 600;
            color: #1A1D26;
            line-height: 1.45;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: color 0.2s ease;
        }

        .related-post-item:hover .related-post-info h4 {
            color: var(--primary);
        }

        .related-post-info span {
            font-size: 11px;
            color: #A3A6AE;
        }

        /* Author card */
        .author-card {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 20px;
            background: var(--primary-lightest);
            border-radius: 14px;
            margin-top: 24px;
        }

        .author-avatar {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 16px;
            flex-shrink: 0;
        }

        .author-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .author-info h4 {
            font-size: 13px;
            font-weight: 600;
            color: #1A1D26;
        }

        .author-info span {
            font-size: 11px;
            color: #A3A6AE;
        }

        /* Back button */
        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            font-weight: 600;
            color: #64748B;
            padding: 10px 20px;
            background: white;
            border-radius: 50px;
            border: 1px solid #EEF0F7;
            transition: all 0.3s ease;
            box-shadow: 0 1px 3px rgba(0,0,0,0.03);
        }

        .back-btn:hover {
            color: var(--primary);
            border-color: rgba(24,95,165,0.3);
            transform: translateX(-3px);
        }

        /* Lightbox */
        .lightbox-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.9);
            z-index: 100;
            align-items: center;
            justify-content: center;
            cursor: zoom-out;
            animation: fadeIn 0.3s ease;
        }

        .lightbox-overlay.active {
            display: flex;
        }

        .lightbox-overlay img {
            max-width: 90%;
            max-height: 90vh;
            object-fit: contain;
            border-radius: 12px;
            animation: scaleIn 0.3s ease;
        }

        .lightbox-close {
            position: absolute;
            top: 24px;
            right: 24px;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 101;
        }

        .lightbox-close:hover {
            background: rgba(255,255,255,0.2);
            transform: scale(1.1);
        }

        .lightbox-close svg {
            width: 18px;
            height: 18px;
            color: white;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }

        /* Kategori tag */
        .kategori-tag {
            display: inline-flex;
            align-items: center;
            padding: 5px 14px;
            background: var(--primary-lightest);
            color: var(--primary);
            font-size: 11px;
            font-weight: 700;
            border-radius: 50px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            border: 2px solid var(--primary);
        }

        .kategori-tag-white {
            background: rgba(255,255,255,0.15);
            color: white;
            backdrop-filter: blur(6px);
            border: 1px solid rgba(255,255,255,0.2);
        }

        /* Tags section */
        .tags-section {
            border-top: 2px solid rgba(24,95,165,0.15);
            padding-top: 24px;
            margin-top: 32px;
        }

        .tags-label {
            font-size: 13px;
            font-weight: 600;
            color: #64748B;
            margin-bottom: 12px;
        }

        .tags-wrap {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        /* Breadcrumb bar */
        .breadcrumb-bar {
            background: var(--primary-lightest);
            padding: 12px 0;
            margin-top: 20px;
        }

        .breadcrumb-bar-inner {
            max-width: 1130px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            font-size: 13px;
            gap: 8px;
        }

        .breadcrumb-bar a {
            color: var(--primary-dark);
            font-weight: 500;
            transition: color 0.2s;
        }

        .breadcrumb-bar a:hover {
            color: var(--primary);
        }

        .breadcrumb-bar .sep {
            color: var(--primary-lighter);
        }

        .breadcrumb-bar .current {
            color: var(--primary);
            font-weight: 600;
        }

        /* article prose */
        .prose-content {
            font-size: 15px;
            line-height: 1.8;
            color: #374151;
        }
    </style>
</head>
<body class="font-[Poppins] bg-[#F0F6FF]" style="padding-bottom: 0;">

    <!-- NAVBAR -->
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

    <!-- HERO DETAIL -->
    <section class="max-w-[1130px] mx-auto" style="margin-top: 30px;">
        <a href="{{ route('home') }}" class="back-btn" style="margin-bottom: 20px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg>
            Kembali ke Beranda
        </a>

        <div class="hero-detail">
            @php
                $allFotos = collect();
                if ($post->galeries->isNotEmpty()) {
                    foreach($post->galeries as $galery) {
                        foreach($galery->fotos as $foto) {
                            $allFotos->push($foto);
                        }
                    }
                }
                $heroImage = $allFotos->isNotEmpty() ? $allFotos->first()->file : null;
            @endphp

            @if($heroImage)
                <img src="{{ asset('storage/' . $heroImage) }}" alt="{{ $post->judul }}" />
            @else
                <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #042C53 0%, #185FA5 50%, #B5D4F4 100%); display: flex; align-items: center; justify-content: center;">
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

    <!-- CONTENT + SIDEBAR -->
    <section class="max-w-[1130px] mx-auto content-grid">

        <!-- MAIN CONTENT -->
        <div class="content-main">
            <div class="article-body">

                <!-- Header badge row -->
                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 24px; padding-bottom: 20px; border-bottom: 2px solid rgba(24,95,165,0.1);">
                    <span class="kategori-tag">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 5px;"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M8 7v8"/><path d="M12 7v8"/><path d="M16 7v8"/></svg>
                        {{ $post->kategori->judul ?? 'Umum' }}
                    </span>
                    <span style="display: inline-flex; align-items: center; gap: 5px; font-size: 12px; color: #64748B; background: #F1F5F9; padding: 5px 12px; border-radius: 50px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        {{ $post->created_at->translatedFormat('d F Y') }}
                    </span>
                    <span style="display: inline-flex; align-items: center; gap: 5px; font-size: 12px; color: #64748B; background: #F1F5F9; padding: 5px 12px; border-radius: 50px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        {{ $post->user->name ?? 'Admin' }}
                    </span>
                </div>

                <!-- Foto Utama -->
                @if($allFotos->isNotEmpty())
                <figure style="margin-bottom: 28px; border-radius: 16px; overflow: hidden; border: 1px solid rgba(24,95,165,0.12);">
                    <img src="{{ asset('storage/' . $allFotos->first()->file) }}"
                        alt="{{ $post->judul }}"
                        style="width: 100%; height: 320px; object-fit: cover; display: block;" />
                    <figcaption style="font-size: 13px; text-align: center; font-style: italic; padding: 10px 16px; background: var(--primary-lightest); color: var(--primary-dark);">
                        Kategori: {{ $post->kategori->judul ?? 'Sekolah' }}
                    </figcaption>
                </figure>
                @endif

                <!-- Article Body -->
                <div class="prose-content" id="Content-wrapper">
                    {!! $post->isi ?? '<p>Tidak ada deskripsi untuk informasi ini.</p>' !!}
                </div>

                <!-- Tags -->
                <div class="tags-section">
                    <p class="tags-label">Tags:</p>
                    <div class="tags-wrap">
                        <span class="kategori-tag">#{{ $post->kategori->judul ?? 'Pendidikan' }}</span>
                        <span class="kategori-tag">#PenaInspiratif</span>
                        <span class="kategori-tag">#SuaraMasaDepan</span>
                    </div>
                </div>
            </div>

            <!-- GALERI FOTO / DOKUMENTASI KEGIATAN -->
            @if($allFotos->count() > 1)
            <div class="gallery-section">
                <div class="article-body" style="padding: 28px;">
                    <h3 class="gallery-section-title">
                        Dokumentasi Kegiatan
                        <span style="font-size: 13px; font-weight: 500; color: #64748B;">({{ $allFotos->count() }} foto)</span>
                    </h3>
                    <div class="photo-grid">
                        @foreach($allFotos as $foto)
                            <div class="photo-grid-item" onclick="openLightbox('{{ asset('storage/' . $foto->file) }}')">
                                <img src="{{ asset('storage/' . $foto->file) }}" alt="{{ $foto->judul ?? $post->judul }}" loading="lazy" />
                                @if($foto->judul)
                                    <span class="photo-caption">{{ $foto->judul }}</span>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>

        <!-- SIDEBAR -->
        <div class="content-sidebar">

            <!-- Author Card -->
            <div class="sidebar-card">
                <div class="sidebar-title">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    Ditulis Oleh
                </div>
                <div class="author-card" style="margin-top: 0;">
                    <div class="author-avatar">
                        {{ strtoupper(substr($post->user->name ?? 'A', 0, 1)) }}
                    </div>
                    <div class="author-info">
                        <h4>{{ $post->user->name ?? 'Admin' }}</h4>
                        <span>Tim Redaksi</span>
                        <span>{{ $post->created_at->translatedFormat('d F Y, H:i') }} WIB</span>
                    </div>
                </div>
            </div>

            <!-- Kategori Info -->
            <div class="sidebar-card" style="margin-top: 20px;">
                <div class="sidebar-title">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h6v6H4z"/><path d="M14 4h6v6h-6z"/><path d="M4 14h6v6H4z"/><path d="M14 14h6v6h-6z"/></svg>
                    Kategori
                </div>
                <span class="kategori-tag">{{ $post->kategori->judul ?? 'Umum' }}</span>
            </div>

            <!-- Artikel Terbaru (logika dari kode kedua) -->
            @if(isset($latestPosts) && $latestPosts->isNotEmpty())
            <div class="sidebar-card" style="margin-top: 20px;">
                <div class="sidebar-title">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                    Artikel Terbaru
                </div>
                @foreach($latestPosts as $lpost)
                @php
                    $thumbnail = null;
                    if ($lpost->galeries->isNotEmpty() && $lpost->galeries->first()->fotos->isNotEmpty()) {
                        $thumbnail = asset('storage/' . $lpost->galeries->first()->fotos->first()->file);
                    }
                @endphp
                <a href="{{ route('post.detail', $lpost->id) }}" class="related-post-item" style="display: flex;">
                    <div class="related-post-thumb">
                        @if($thumbnail)
                            <img src="{{ $thumbnail }}" alt="{{ $lpost->judul }}" loading="lazy" />
                        @else
                            <div style="width: 100%; height: 100%; background: linear-gradient(135deg, var(--primary), var(--primary-light)); display: flex; align-items: center; justify-content: center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.6)" stroke-width="2"><rect width="18" height="18" x="3" y="3" rx="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                            </div>
                        @endif
                    </div>
                    <div class="related-post-info">
                        <h4>{{ $lpost->judul }}</h4>
                        <span>{{ $lpost->created_at->translatedFormat('d M Y') }}</span>
                    </div>
                </a>
                @endforeach
            </div>

            <!-- Related Posts (fallback jika latestPosts tidak ada) -->
            @elseif(isset($relatedPosts) && $relatedPosts->isNotEmpty())
            <div class="sidebar-card" style="margin-top: 20px;">
                <div class="sidebar-title">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                    Postingan Terkait
                </div>
                @foreach($relatedPosts as $related)
                @php
                    $relatedThumb = null;
                    if ($related->galeries->isNotEmpty()) {
                        $firstGal = $related->galeries->first();
                        if ($firstGal->fotos->isNotEmpty()) {
                            $relatedThumb = $firstGal->fotos->first()->file;
                        }
                    }
                @endphp
                <a href="{{ route('post.show', $related) }}" class="related-post-item" style="display: flex;">
                    <div class="related-post-thumb">
                        @if($relatedThumb)
                            <img src="{{ asset('storage/' . $relatedThumb) }}" alt="{{ $related->judul }}" loading="lazy" />
                        @else
                            <div style="width: 100%; height: 100%; background: linear-gradient(135deg, var(--primary), var(--primary-light)); display: flex; align-items: center; justify-content: center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.6)" stroke-width="2"><rect width="18" height="18" x="3" y="3" rx="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                            </div>
                        @endif
                    </div>
                    <div class="related-post-info">
                        <h4>{{ $related->judul }}</h4>
                        <span>{{ $related->created_at->translatedFormat('d M Y') }}</span>
                    </div>
                </a>
                @endforeach
            </div>
            @endif

        </div>
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


    <!-- LIGHTBOX -->
    <div class="lightbox-overlay" id="lightbox" onclick="closeLightbox()">
        <button class="lightbox-close" onclick="closeLightbox()">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
        <img id="lightbox-img" src="" alt="Preview" />
    </div>

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
        function openLightbox(src) {
            document.getElementById('lightbox-img').src = src;
            document.getElementById('lightbox').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            document.getElementById('lightbox').classList.remove('active');
            document.body.style.overflow = '';
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeLightbox();
        });
    </script>
</body>
</html>