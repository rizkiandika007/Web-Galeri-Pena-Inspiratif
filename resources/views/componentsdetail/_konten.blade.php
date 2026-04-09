@php
    $allFotos = collect();
    if(isset($post) && $post->galeries) {
        foreach($post->galeries as $galeri) {
            if($galeri->fotos) {
                foreach($galeri->fotos as $foto) {
                    $allFotos->push($foto);
                }
            }
        }
    }
@endphp
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