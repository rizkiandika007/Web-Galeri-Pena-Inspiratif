<section class="max-w-[1200px] mx-auto px-4 lg:px-8 mt-12 md:mt-20">
    <div class="flex flex-col lg:flex-row gap-10">
        
        <!-- INFORMASI TERKINI (DINAMIS DARI POSTS) -->
        <div id="Informasi-Terkini" class="flex flex-col w-full lg:w-2/3 gap-6">
            <div class="flex flex-row justify-between items-end">
                <div>
                    <span class="section-badge text-left inline-block mb-2">INFORMASI TERKINI</span>
                    <h2 class="section-title text-left text-xl lg:text-[22px] m-0">Berita & Prestasi Terbaru</h2>
                </div>
                {{-- route('galeri') → link lihat semua --}}
                <a href="{{ route('galeri') }}" class="font-semibold text-[#2563EB] text-sm hover:underline whitespace-nowrap mb-1">Lihat Semua →</a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 w-full">

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
                    <a href="{{ route('post.detail', $post->id) }}" class="card-news w-full">
                        <div class="news-card-inner">
                            <div class="news-thumb h-[200px] lg:h-[220px]">
                                {{-- $post->kategori->judul → relasi belongsTo ke tabel 'kategoris' --}}
                                <span class="card-badge">{{ strtoupper($post->kategori->judul ?? 'BERITA') }}</span>

                                {{-- $thumbnail → kolom 'file' dari tabel 'fotos' via relasi galeries --}}
                                @if($thumbnail)
                                    <img src="{{ asset('storage/' . $thumbnail) }}" class="object-cover w-full h-full news-img" alt="{{ $post->judul }}" />
                                @else
                                    <img src="{{ asset('assets/images/thumbnails/th-building.png') }}" class="object-cover w-full h-full news-img" alt="{{ $post->judul }}" />
                                @endif
                            </div>
                            <div class="flex flex-col gap-2 p-1">
                                {{-- $post->judul → kolom 'judul' di tabel 'posts' --}}
                                <h3 class="font-bold text-sm lg:text-base leading-snug text-[#1A1D26] line-clamp-2 min-h-[44px]">{{ $post->judul }}</h3>

                                {{-- $post->created_at → kolom timestamp dari tabel 'posts' --}}
                                <p class="text-[#A3A6AE] text-xs font-medium">{{ $post->created_at->translatedFormat('d M, Y') }}</p>
                            </div>
                        </div>
                    </a>

                {{-- @empty → ditampilkan jika $posts kosong / tidak ada data di database --}}
                @empty
                    <div class="col-span-1 sm:col-span-2 flex items-center justify-center w-full text-[#A3A6AE] font-medium py-16 bg-[#F1F5F9] rounded-2xl">
                        Belum ada informasi — Tambahkan post via Dashboard
                    </div>
                @endforelse

            </div>
        </div>
        
        <!-- AGENDA (DINAMIS DARI POSTS) -->
        <div id="Agenda-Sekolah" class="flex flex-col w-full lg:w-1/3 gap-6">
            <div>
                <span class="section-badge text-left inline-block mb-2">AGENDA</span>
                <h2 class="section-title text-left text-xl lg:text-[22px] m-0">Jadwal Mendatang</h2>
            </div>

            <div class="flex flex-col gap-4">

                {{-- $agendas → koleksi khusus post bertipe Agenda --}}
                @forelse($agendas as $post)

                    {{-- route('post.detail', $post->id) → named route dengan parameter id dari tabel 'posts' --}}
                    <a href="{{ route('post.detail', $post->id) }}" class="card w-full group">
                        <div class="agenda-card-inner transition-transform duration-300 md:hover:translate-x-1 outline-none">
                            <div class="agenda-date shrink-0 w-[64px] h-[64px] bg-blue-50/50 group-hover:bg-blue-100 transition-colors">
                                {{-- $post->created_at → kolom timestamp dari tabel 'posts' --}}
                                <span class="font-bold text-xl leading-none text-[#2563EB]">{{ $post->created_at->format('d') }}</span>
                                <span class="font-bold text-[11px] text-[#2563EB]/70 leading-none">{{ strtoupper($post->created_at->translatedFormat('M')) }}</span>
                            </div>
                            <div class="flex flex-col gap-1.5 min-w-0 pr-2">
                                {{-- $post->judul → kolom 'judul' di tabel 'posts' --}}
                                <h3 class="font-semibold text-[14px] leading-tight text-[#1A1D26] line-clamp-2 md:group-hover:text-blue-600 transition-colors">{{ $post->judul }}</h3>

                                {{-- $post->kategori->judul → relasi belongsTo ke tabel 'kategoris' --}}
                                <p class="text-[#A3A6AE] text-xs font-medium">{{ $post->kategori->judul ?? 'Umum' }}</p>
                            </div>
                        </div>
                    </a>

                {{-- @empty → ditampilkan jika tidak ada data setelah skip(2) --}}
                @empty
                    <div class="flex items-center justify-center text-[#A3A6AE] font-medium py-10 bg-[#F1F5F9] rounded-2xl text-sm">
                        Belum ada agenda
                    </div>
                @endforelse

            </div>
        </div>
        
    </div>
</section>
