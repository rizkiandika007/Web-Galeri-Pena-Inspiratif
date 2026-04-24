<!-- GALERI GRID -->
<section id="Galeri-Sekolah" class="max-w-[1200px] mx-auto px-4 lg:px-8 py-16">
    @if($galeries->count() > 0)
        <!-- Image Grid layout matching the reference -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            @foreach($galeries as $galery)
                @php
                    $firstFoto = $galery->fotos->first();
                    // Perbaikan: pastikan post tidak null
                    $postJudul = $galery->post ? ($galery->post->judul ?? 'Galeri Sekolah') : 'Galeri Sekolah';
                    $postId = $galery->post ? $galery->post->id : null;
                @endphp
                
                @if($postId && $firstFoto)
                    <a href="{{ route('post.detail', $postId) }}"
                        class="group relative block w-full aspect-[4/3] sm:aspect-[16/10] min-h-[250px] overflow-hidden rounded-[20px] bg-slate-200 transition-all duration-300 hover:-translate-y-1.5 hover:shadow-[0_10px_30px_rgba(0,0,0,0.12)] outline-none">
                        
                        <img src="{{ asset('storage/' . $firstFoto->file) }}"
                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                            alt="{{ $postJudul }}" />

                        <!-- Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-80 group-hover:opacity-100 transition-opacity"></div>

                        <!-- Title Overlay -->
                        <div class="absolute bottom-5 left-5 right-5 z-20">
                            <h4 class="font-bold text-white text-lg leading-tight line-clamp-2" style="text-shadow: 0 2px 4px rgba(0,0,0,0.3);">
                                {{ $postJudul }}
                            </h4>
                        </div>
                    </a>
                @elseif($firstFoto && !$postId)
                    <!-- Jika galeri tidak punya post, tampilkan tanpa link -->
                    <div class="group relative block w-full aspect-[4/3] sm:aspect-[16/10] min-h-[250px] overflow-hidden rounded-[20px] bg-slate-200">
                        <img src="{{ asset('storage/' . $firstFoto->file) }}"
                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                            alt="{{ $postJudul }}" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-80"></div>
                        <div class="absolute bottom-5 left-5 right-5 z-20">
                            <h4 class="font-bold text-white text-lg leading-tight line-clamp-2">
                                {{ $postJudul }}
                            </h4>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

    @else
        {{-- EMPTY STATE --}}
        <div class="flex flex-col items-center justify-center text-center py-20 px-4">
            <div class="w-20 h-20 rounded-full bg-blue-50 flex items-center justify-center mb-6">
                <svg width="40" height="40" fill="none" stroke="#2E5BFF" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
            <h3 class="font-extrabold text-gray-900 text-2xl mb-2">Belum Ada Galeri</h3>
            <p class="text-gray-500 max-w-md">Dokumentasi kegiatan belum ditambahkan. Tambahkan galeri melalui Dashboard administrator.</p>
            @auth
                <a href="{{ url('/admin') }}" class="mt-8 inline-flex items-center gap-2 font-bold text-white px-6 py-3 rounded-full bg-[#2E5BFF] hover:bg-blue-700 transition-colors shadow-lg shadow-blue-500/30">
                    Ke Dashboard Administrator
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 20"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </a>
            @endauth
        </div>
    @endif
</section>