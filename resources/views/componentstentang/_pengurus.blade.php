<section id="Pengurus" class="relative w-full py-20" style="background: linear-gradient(135deg, #0a2a4a 0%, #0c3683ff 60%, #1446b1ff 100%);">
    <div class="max-w-[1200px] mx-auto px-4 lg:px-8 relative z-10">
        
        <!-- Header Section -->
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">
                Pimpinan & Kepengurusan
            </h2>
            <p class="text-white/80 text-sm md:text-base font-medium max-w-2xl mx-auto">
                Berdedikasi untuk memajukan ekstrakurikuler serta membentuk karakter siswa yang kreatif dan inspiratif.
            </p>
        </div>

        <!-- Grid Kepengurusan -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-8 gap-y-12">
            @forelse($pengurus as $item)
                <div class="flex flex-col items-center group">
                    <!-- Photo -->
                    <div class="w-32 h-32 md:w-40 md:h-40 rounded-full bg-white p-1 shadow-lg mb-5 overflow-hidden transition-transform duration-300 group-hover:scale-105">
                        @if($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}" class="w-full h-full object-cover rounded-full">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-100 rounded-full">
                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Text Info -->
                    <h3 class="text-lg font-bold text-white text-center leading-tight mb-1">
                        {{ $item->nama }}
                    </h3>
                    <p class="text-sm text-white/70 text-center font-medium">
                        {{ $item->jabatan }}
                    </p>
                </div>
            @empty
                <div class="col-span-full text-center text-white/70 py-10">
                    <p>Belum ada data kepengurusan yang ditambahkan.</p>
                </div>
            @endforelse
        </div>

    </div>
</section>
