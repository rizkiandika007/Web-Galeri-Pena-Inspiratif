<section id="Pengurus" class="relative w-full py-12 px-4 lg:px-8">
    <div class="max-w-[1200px] mx-auto bg-gradient-to-br from-blue-600 to-blue-800 rounded-[3rem] py-14 md:py-20 px-6 lg:px-12 shadow-[0_20px_50px_-12px_rgba(30,58,138,0.3)] relative z-10 border border-blue-500/20">
        
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
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            @forelse($pengurus as $item)
                <div class="flex flex-col items-center group">
                    <!-- Photo - Clickable (Ukuran diperkecil) -->
                    <div class="w-24 h-24 md:w-28 md:h-28 rounded-full bg-white p-1 shadow-lg mb-4 overflow-hidden transition-transform duration-300 group-hover:scale-105 cursor-pointer"
                         onclick="openModal('{{ asset('storage/' . $item->foto) }}', '{{ $item->nama }}', '{{ $item->jabatan }}')">
                        @if($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}" class="w-full h-full object-cover rounded-full">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-100 rounded-full">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Text Info -->
                    <h3 class="text-base font-bold text-white text-center leading-tight mb-1">
                        {{ $item->nama }}
                    </h3>
                    <p class="text-xs text-white/70 text-center font-medium">
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

<!-- MODAL LIGHTBOX -->
<section id="imageModal" class="fixed inset-0 z-[100] hidden items-center justify-center bg-black/80 backdrop-blur-md opacity-0 transition-opacity duration-300" onclick="closeModal()">
    <div class="relative w-full max-w-2xl mx-4 flex flex-col items-center bg-white/10 backdrop-blur-xl border border-white/20 p-6 md:p-8 rounded-[2rem] shadow-2xl scale-95 transition-transform duration-300" onclick="event.stopPropagation()" id="modalContent">
        
        <!-- Tombol Close -->
        <button onclick="closeModal()" class="absolute top-4 right-4 md:top-6 md:right-6 text-white/70 hover:text-white bg-black/20 hover:bg-black/50 transition-all rounded-full p-2 z-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        
        <!-- Gambar Preview -->
        <div class="w-full flex justify-center items-center overflow-hidden rounded-2xl bg-black/40 mb-6 h-[40vh] md:h-[50vh] relative">
            <img id="modalImage" src="" alt="Preview Foto Pengurus" class="w-full h-full object-contain">
        </div>
        
        <!-- Informasi Foto -->
        <div class="text-center w-full px-4">
            <h3 id="modalName" class="text-2xl md:text-3xl font-extrabold text-white mb-2 tracking-tight"></h3>
            <div class="inline-block px-4 py-1.5 rounded-full bg-blue-500/20 border border-blue-400/30">
                <p id="modalJabatan" class="text-blue-200 font-semibold text-sm md:text-base"></p>
            </div>
        </div>
        
        <!-- Tombol Navigasi -->
        <button onclick="prevImage(event)" class="absolute top-1/2 -translate-y-1/2 -left-4 md:-left-6 bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/20 rounded-full p-3 transition-all hidden shadow-lg" id="prevBtn">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        
        <button onclick="nextImage(event)" class="absolute top-1/2 -translate-y-1/2 -right-4 md:-right-6 bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/20 rounded-full p-3 transition-all hidden shadow-lg" id="nextBtn">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>
    </div>
</section>