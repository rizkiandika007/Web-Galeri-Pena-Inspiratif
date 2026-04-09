<section class="max-w-[1130px] mx-auto" style="margin-top: 72px;">
    <div class="flex" style="gap: 30px;">
                <!-- INFORMASI TERKINI (DINAMIS DARI POSTS) -->
        <div id="Informasi-Terkini" class="flex flex-col" style="gap: 24px; width: 66.6%;">
            <div class="flex justify-between items-end">
                <div>
                    <span class="section-badge" style="text-align: left;">INFORMASI TERKINI</span>
                    <h2 class="section-title" style="text-align: left; font-size: 22px; margin-top: 6px;">Berita & Prestasi Terbaru</h2>
                </div>
                {{-- route('home') → named route 'home' --}}
                <a href="{{ route('galeri') }}" class="font-semibold text-[#2563EB] text-sm hover:underline">Lihat Semua →</a>
            </div>

            <div class="flex" style="gap: 20px;">

                {{-- $posts → variabel koleksi dari controller, berisi data tabel 'posts' --}}
                {{-- ->take(2) → mengambil 2 data pertama dari koleksi --}}
                @forelse($posts->take(2) as $post)
                    @php
                        // $post->galeries → relasi hasMany ke tabel 'galeries'
                        $thumbnail = null;
                        if ($post->galeries->isNotEmpty()) {
                            // Ambil galeri pertama lalu foto pertama dari relasi fotos
                            $firstGalery = $post->galeries->first();
                            if ($firstGalery->fotos->isNotEmpty()) {
                                // $firstGalery->fotos → relasi hasMany ke tabel 'fotos'
                                $thumbnail = $firstGalery->fotos->first()->file;
                            }
                        }
                    @endphp

                    {{-- route('post.detail', $post->id) → named route dengan parameter id dari tabel 'posts' --}}
                    <a href="{{ route('post.detail', $post->id) }}" class="card-news" style="width: 50%;">
                        <div class="news-card-inner">
                            <div class="news-thumb">
                                {{-- $post->kategori->judul → relasi belongsTo ke tabel 'kategoris' --}}
                                <span class="card-badge">{{ strtoupper($post->kategori->judul ?? 'BERITA') }}</span>

                                {{-- $thumbnail → kolom 'file' dari tabel 'fotos' via relasi galeries --}}
                                @if($thumbnail)
                                    <img src="{{ asset('storage/' . $thumbnail) }}" class="object-cover w-full h-full news-img" alt="{{ $post->judul }}" />
                                @else
                                    <img src="{{ asset('assets/images/thumbnails/th-building.png') }}" class="object-cover w-full h-full news-img" alt="{{ $post->judul }}" />
                                @endif
                            </div>
                            <div class="flex flex-col" style="gap: 6px; padding: 4px 2px 0;">
                                {{-- $post->judul → kolom 'judul' di tabel 'posts' --}}
                                <h3 class="font-bold" style="font-size: 14px; line-height: 1.5; color: #1A1D26;">{{ $post->judul }}</h3>

                                {{-- $post->created_at → kolom timestamp dari tabel 'posts' --}}
                                <p class="text-[#A3A6AE]" style="font-size: 12px; margin-top: auto;">{{ $post->created_at->translatedFormat('d M, Y') }}</p>
                            </div>
                        </div>
                    </a>

                {{-- @empty → ditampilkan jika $posts kosong / tidak ada data di database --}}
                @empty
                    <div class="flex items-center justify-center w-full text-[#A3A6AE] font-medium"
                        style="padding: 60px 0; background: #F1F5F9; border-radius: 16px;">
                        Belum ada informasi — Tambahkan post via Dashboard
                    </div>
                @endforelse

            </div>
        </div>
                <!-- AGENDA SEKOLAH (DINAMIS DARI POSTS) -->
        <div id="Agenda-Sekolah" class="flex flex-col" style="gap: 24px; width: 33.4%;">
            <div>
                <span class="section-badge" style="text-align: left;">AGENDA SEKOLAH</span>
                <h2 class="section-title" style="text-align: left; font-size: 22px; margin-top: 6px;">Jadwal Mendatang</h2>
            </div>

            <div class="flex flex-col" style="gap: 12px;">

                {{-- $posts → koleksi yang sama, ->skip(2)->take(3) → ambil data ke-3 s/d ke-5 --}}
                @forelse($posts->skip(2)->take(3) as $post)

                    {{-- route('post.detail', $post->id) → named route dengan parameter id dari tabel 'posts' --}}
                    <a href="{{ route('post.detail', $post->id) }}" class="card">
                        <div class="agenda-card-inner">
                            <div class="agenda-date">
                                {{-- $post->created_at → kolom timestamp dari tabel 'posts' --}}
                                <span class="font-bold" style="font-size: 20px; line-height: 1;">{{ $post->created_at->format('d') }}</span>
                                <span class="font-semibold" style="font-size: 10px;">{{ strtoupper($post->created_at->translatedFormat('M')) }}</span>
                            </div>
                            <div class="flex flex-col" style="gap: 4px; min-width: 0;">
                                {{-- $post->judul → kolom 'judul' di tabel 'posts' --}}
                                <h3 class="font-semibold line-clamp-2" style="font-size: 13px; line-height: 1.45; color: #1A1D26;">{{ $post->judul }}</h3>

                                {{-- $post->kategori->judul → relasi belongsTo ke tabel 'kategoris' --}}
                                <p class="text-[#A3A6AE]" style="font-size: 11px;">{{ $post->kategori->judul ?? 'Umum' }}</p>
                            </div>
                        </div>
                    </a>

                {{-- @empty → ditampilkan jika tidak ada data setelah skip(2) --}}
                @empty
                    <div class="flex items-center justify-center text-[#A3A6AE] font-medium" style="padding: 40px 0; background: #F1F5F9; border-radius: 16px; text-align: center; font-size: 13px;">
                        Belum ada agenda
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</section>
