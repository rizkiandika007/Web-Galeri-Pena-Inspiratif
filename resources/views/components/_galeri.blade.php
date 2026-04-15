<!-- GALERI KEGIATAN SEKOLAH (CAROUSEL DINAMIS) -->
<section id="Galeri-Sekolah" class="mt-12">
    <div class="swiper swiper-galeri max-w-[1130px] mx-auto overflow-hidden relative">
        <div class="swiper-wrapper flex">
        {{-- $galeries → variabel koleksi dari controller, berisi data tabel 'galeries' --}}
        @forelse($galeries as $galery)
            @php
                $firstFoto = $galery->fotos->first();
                $postJudul = $galery->post->judul ?? 'Galeri Sekolah';
                $postUser = $galery->post->user->name ?? 'Admin';
                $postDate = $galery->created_at->translatedFormat('d F Y');
            @endphp

            <div class="swiper-slide w-full shrink-0">
                <div class="group relative w-full flex shrink-0 overflow-hidden h-[440px] rounded-2xl">

                    @if($firstFoto)
                        <img src="{{ asset('storage/' . $firstFoto->file) }}" class="absolute w-full h-full object-cover z-[1] transition-transform duration-[10000ms] ease-[cubic-bezier(0.25,0.46,0.45,0.94)] group-hover:scale-[1.06]" alt="{{ $postJudul }}" />
                    @else
                        <div class="absolute w-full h-full z-[1] bg-gradient-to-br from-[#042C53] via-[#185FA5] to-[#B5D4F4] flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.4)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                        </div>
                    @endif

                    <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/30 to-black/5 z-10 pointer-events-none"></div>
                    <a href="{{ route('post.detail', $galery->post->id) }}" class="absolute w-full h-full z-[15]"></a>

                    <div class="w-full flex items-end justify-between relative p-12 z-20">
                        <div class="max-w-[720px] text-left">
                            <span class="inline-flex items-center px-[14px] py-[5px] text-[11px] font-bold rounded-full tracking-[0.5px] uppercase bg-white/15 text-white backdrop-blur-[6px] border border-white/20">{{ $galery->post->kategori->judul ?? 'GALERI' }}</span>
                            <a href="{{ route('post.detail', $galery->post->id) }}" class="font-bold text-white text-[32px] leading-[1.3] mt-[12px] block hover:underline relative z-20">{{ $postJudul }}</a>
                            <div class="flex items-center gap-4 mt-4 flex-wrap">
                                <div class="flex items-center gap-[6px] text-[13px] text-white/90">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-[14px] h-[14px] opacity-80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                    {{ $postDate }}
                                </div>
                                <div class="w-[3px] h-[3px] rounded-full bg-white/30"></div>
                                <div class="flex items-center gap-[6px] text-[13px] text-white/90">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-[14px] h-[14px] opacity-80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                    {{ $postUser }}
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-[10px] mb-2 z-30">
                            <button class="button--previous flex items-center justify-center w-[38px] h-[38px] rounded-full bg-white/10 backdrop-blur-[4px] border border-white/25 cursor-pointer transition-all duration-300 hover:bg-white/25 hover:scale-[1.08] relative z-30"><img src="{{ asset('assets/images/icons/arrow.svg') }}" alt="arrow" class="w-[14px] h-[14px]" /></button>
                            <button class="button--next flex items-center justify-center w-[38px] h-[38px] rounded-full bg-white/10 backdrop-blur-[4px] border border-white/25 cursor-pointer transition-all duration-300 hover:bg-white/25 hover:scale-[1.08] rotate-180 relative z-30"><img src="{{ asset('assets/images/icons/arrow.svg') }}" alt="arrow" class="w-[14px] h-[14px]" /></button>
                        </div>
                    </div>
                </div>
            </div>

        @empty
            <div class="swiper-slide w-full shrink-0">
                <div class="group relative w-full flex shrink-0 overflow-hidden h-[440px] rounded-2xl">
                    <img src="{{ asset('assets/images/thumbnails/cover.png') }}" class="absolute w-full h-full object-cover z-[1] transition-transform duration-[10000ms] ease-[cubic-bezier(0.25,0.46,0.45,0.94)] group-hover:scale-[1.06]" alt="galeri" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/30 to-black/5 z-10 pointer-events-none"></div>
                    <div class="w-full flex items-end justify-between relative p-12 z-20">
                        <div class="max-w-[720px] text-left">
                            <span class="inline-flex items-center px-[14px] py-[5px] text-[11px] font-bold rounded-full tracking-[0.5px] uppercase bg-white/15 text-white backdrop-blur-[6px] border border-white/20">GALERI</span>
                            <h1 class="font-bold text-white text-[32px] leading-[1.3] mt-[12px] block hover:underline relative z-20">Belum Ada Galeri — Tambahkan via Dashboard</h1>
                        </div>
                    </div>
                </div>
            </div>
        @endforelse
        </div>
    </div>
</section>