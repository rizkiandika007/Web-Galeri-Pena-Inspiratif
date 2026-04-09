<!-- GALERI KEGIATAN SEKOLAH (CAROUSEL DINAMIS) -->
<section id="Galeri-Sekolah" style="margin-top: 48px;">
    <div class="main-carousel max-w-[1130px] mx-auto">

        {{-- $galeries → variabel koleksi dari controller, berisi data tabel 'galeries' --}}
        @forelse($galeries as $galery)
            @php
                $firstFoto = $galery->fotos->first();
                $postJudul = $galery->post->judul ?? 'Galeri Sekolah';
                $postUser = $galery->post->user->name ?? 'Admin';
                $postDate = $galery->created_at->translatedFormat('d F Y');
            @endphp

            <div class="featured-news-card relative w-full flex shrink-0 overflow-hidden" style="height: 440px; border-radius: 16px;">

                @if($firstFoto)
                    <img src="{{ asset('storage/' . $firstFoto->file) }}" class="thumbnail absolute w-full h-full object-cover" alt="{{ $postJudul }}" style="z-index: 1;" />
                @else
                    <div class="absolute w-full h-full z-1" style="background: linear-gradient(135deg, #042C53 0%, #185FA5 50%, #B5D4F4 100%); display: flex; align-items: center; justify-content: center; z-index: 1;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.4)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                    </div>
                @endif

                <div class="hero-overlay"></div>
                <a href="{{ route('post.detail', $galery->post->id) }}" class="absolute w-full h-full" style="z-index: 15;"></a>

                <div class="w-full flex items-end justify-between relative" style="padding: 48px; z-index: 20;">
                    <div style="max-width: 720px; text-align: left;">
                        <span class="kategori-tag kategori-tag-white">{{ $galery->post->kategori->judul ?? 'GALERI' }}</span>
                        <a href="{{ route('post.detail', $galery->post->id) }}" class="hero-title-link">{{ $postJudul }}</a>
                        <div class="meta-row">
                            <div class="meta-item">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                {{ $postDate }}
                            </div>
                            <div class="meta-dot"></div>
                            <div class="meta-item">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                {{ $postUser }}
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center" style="gap: 10px; margin-bottom: 8px;">
                        <button class="button--previous slider-btn" style="position: relative; z-index: 30;"><img src="{{ asset('assets/images/icons/arrow.svg') }}" alt="arrow" style="width: 14px; height: 14px;" /></button>
                        <button class="button--next slider-btn rotate-180" style="position: relative; z-index: 30;"><img src="{{ asset('assets/images/icons/arrow.svg') }}" alt="arrow" style="width: 14px; height: 14px;" /></button>
                    </div>
                </div>
            </div>

        @empty
            <div class="featured-news-card relative w-full flex shrink-0 overflow-hidden" style="height: 440px; border-radius: 16px;">
                <img src="{{ asset('assets/images/thumbnails/cover.png') }}" class="thumbnail absolute w-full h-full object-cover" alt="galeri" style="z-index: 1;" />
                <div class="hero-overlay"></div>
                <div class="w-full flex items-end justify-between relative" style="padding: 48px; z-index: 20;">
                    <div style="max-width: 720px; text-align: left;">
                        <span class="kategori-tag kategori-tag-white">GALERI</span>
                        <h1 class="hero-title-link" style="color: white;">Belum Ada Galeri — Tambahkan via Dashboard</h1>
                    </div>
                </div>
            </div>
        @endforelse

    </div>
</section>