<section id="Tentang-Kami" class="relative w-full pt-20 pb-24">
    <!-- Top Background Banner (Blue instead of Purple) -->
    <div class="absolute top-0 left-0 w-full h-[450px] bg-[#2E5BFF] z-0" style="clip-path: polygon(0 0, 100% 0, 100% 85%, 0% 100%);">
        <div class="absolute inset-0 bg-black/10"></div> <!-- Subtle dark overlay for depth -->
    </div>
    
    <!-- Main Container -->
    <div class="relative z-10 max-w-[1200px] mx-auto px-4 lg:px-8">
        
        <!-- Header Content -->
        <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4 drop-shadow-sm">
                {{ $profile->judul ?? 'Profil Sekolah' }}
            </h2>
            <p class="text-white/90 text-lg md:text-xl font-medium">Suara Masa Depan</p>
        </div>

        <!-- Float Card -->
        <div class="bg-white rounded-[32px] shadow-[0_20px_50px_rgba(0,0,0,0.1)] p-8 md:p-12 border border-gray-100">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 md:gap-14 items-start">
                
                <!-- Left Column: Image -->
                <div class="lg:col-span-5 w-full bg-gray-50/50 rounded-3xl p-6 md:p-8 flex items-center justify-center border border-gray-100 h-full relative overflow-hidden">
                    <!-- Subtle corner decoration like the pink curve in the example (adapted to light blue) -->
                    <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-blue-100/50 rounded-full blur-xl"></div>
                    
                    @if($profile && $profile->foto)
                        <img src="{{ asset('storage/' . $profile->foto) }}" alt="Tentang Kami" class="w-full max-w-sm h-auto object-contain relative z-10 drop-shadow-xl hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="w-full aspect-square flex items-center justify-center relative z-10">
                            <span class="text-gray-400 font-medium tracking-wide">Belum ada foto</span>
                        </div>
                    @endif
                </div>

                <!-- Right Column: Content -->
                <div class="lg:col-span-7 flex flex-col gap-4 py-4">
                    <span class="text-[#2E5BFF] font-black tracking-[0.2em] text-xs uppercase">
                        OUR JOURNEY
                    </span>
                    <h3 class="text-3xl md:text-4xl font-extrabold text-[#111827] leading-tight mb-2">
                        Mengenal Lebih Dekat
                    </h3>
                    
                    <div class="prose prose-blue prose-lg md:prose-base text-[#4B5563] max-w-none leading-loose text-justify">
                        @if($profile)
                            {!! $profile->isi !!}
                        @else
                            <p>Profil sekolah belum ditambahkan. Kehadiran sekolah ini dilatarbelakangi oleh besarnya potensi wilayah serta kebutuhan nyata masyarakat akan lembaga pendidikan menengah kejuruan yang terjangkau, relevan, dan sesuai dengan minat peserta didik.</p>
                        @endif
                    </div>
                </div>
                
            </div>
        </div>
        
    </div>
</section>

