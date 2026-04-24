<section id="Pengurus" class="relative w-full py-20 bg-blue-700">
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
                    <!-- Photo - Clickable -->
                    <div class="w-32 h-32 md:w-40 md:h-40 rounded-full bg-white p-1 shadow-lg mb-5 overflow-hidden transition-transform duration-300 group-hover:scale-105 cursor-pointer"
                         onclick="openModal('{{ asset('storage/' . $item->foto) }}', '{{ $item->nama }}', '{{ $item->jabatan }}')">
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

<!-- MODAL LIGHTBOX - Tailwind Only -->
<div id="imageModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/90 backdrop-blur-sm" onclick="closeModal()">
    <div class="relative max-w-4xl mx-4" onclick="event.stopPropagation()">
        <!-- Tombol Close -->
        <button onclick="closeModal()" class="absolute -top-12 right-0 text-white hover:text-gray-300 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        
        <!-- Gambar Preview -->
        <img id="modalImage" src="" alt="Preview" class="max-w-full max-h-[80vh] rounded-2xl shadow-2xl mx-auto object-contain transition-all duration-200">
        
        <!-- Informasi Foto -->
        <div class="mt-4 text-center text-white">
            <h3 id="modalName" class="text-xl font-bold"></h3>
            <p id="modalJabatan" class="text-white/70"></p>
        </div>
        
        <!-- Tombol Navigasi -->
        <div class="absolute inset-y-0 left-0 flex items-center">
            <button onclick="prevImage(event)" class="bg-white/20 hover:bg-white/30 rounded-full p-2 ml-4 transition-colors hidden" id="prevBtn">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
        </div>
        <div class="absolute inset-y-0 right-0 flex items-center">
            <button onclick="nextImage(event)" class="bg-white/20 hover:bg-white/30 rounded-full p-2 mr-4 transition-colors hidden" id="nextBtn">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>
</div>
