<section id="Pengurus" class="relative w-full pt-20 pb-24">
    <!-- Top Background Banner (Blue) - Rata (Straight) -->
    <div class="absolute top-0 left-0 w-full h-[400px] bg-[#2E5BFF] z-0">
        <div class="absolute inset-0 bg-black/10"></div>
    </div>

    <!-- Header Section -->
    <div class="relative z-10 max-w-[1200px] mx-auto px-4 lg:px-8 text-center mb-16">
        <span class="section-badge mb-4 inline-block bg-white/20 text-white backdrop-blur-md font-bold px-6 py-2 rounded-full text-sm border border-white/30 tracking-widest">STRUKTUR ORGANISASI</span>
        <h2 class="text-4xl md:text-6xl font-extrabold text-white mb-6 tracking-tight drop-shadow-md">
            Kepengurusan Kami
        </h2>
        <p class="text-white/80 text-lg md:text-xl font-medium max-w-2xl mx-auto leading-relaxed">
            Mengenal lebih dekat sosok pimpinan dan pengurus yang berdedikasi memajukan ekstrakurikuler serta membentuk karakter siswa yang kreatif dan inspiratif.
        </p>
    </div>

    <!-- Grid Kepengurusan -->
    <div class="relative z-10 max-w-[1280px] mx-auto px-4 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @forelse($pengurus as $item)
            <div class="group bg-white rounded-[2rem] p-8 border border-gray-100 shadow-[0_4px_20px_rgba(0,0,0,0.03)] hover:shadow-[0_15px_40px_rgba(0,0,0,0.08)] transition-all duration-300 flex flex-col items-center cursor-pointer hover:-translate-y-2 relative overflow-hidden"
                 onclick="openModal('{{ asset('storage/' . $item->foto) }}', '{{ $item->nama }}', '{{ $item->jabatan }}')">
                
                <!-- Decorative background elements -->
                <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50 rounded-full blur-3xl -mr-16 -mt-16 transition-transform group-hover:scale-150 duration-500"></div>
                <div class="absolute bottom-0 left-0 w-24 h-24 bg-blue-50 rounded-full blur-2xl -ml-10 -mb-10 transition-transform group-hover:scale-150 duration-500"></div>

                <!-- Photo Container -->
                <div class="w-32 h-32 md:w-40 md:h-40 rounded-full mb-6 overflow-hidden border-4 border-white shadow-[0_8px_24px_rgba(0,0,0,0.12)] group-hover:border-blue-50 transition-colors relative z-10">
                    @if($item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gray-50">
                            <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-blue-600/0 group-hover:bg-blue-600/10 transition-colors duration-300"></div>
                </div>
                
                <!-- Text Info -->
                <div class="relative z-10 flex flex-col items-center w-full">
                    <h3 class="text-xl font-bold text-gray-900 text-center mb-3 group-hover:text-blue-600 transition-colors line-clamp-1 w-full px-2" title="{{ $item->nama }}">
                        {{ $item->nama }}
                    </h3>
                    <div class="px-5 py-2 bg-blue-50 text-blue-600 rounded-full text-sm font-bold tracking-wide border border-blue-100">
                        {{ $item->jabatan }}
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center text-gray-500 py-16 bg-white rounded-[2rem] border border-dashed border-gray-200">
                <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                <p class="text-lg font-medium">Belum ada data kepengurusan yang ditambahkan.</p>
            </div>
        @endforelse
    </div>
</section>

<script>
    const pengurusData = @json($pengurus);
</script>

<!-- MODAL LIGHTBOX -->
<section id="imageModal" class="fixed inset-0 z-[100] hidden items-center justify-center bg-black/80 backdrop-blur-md opacity-0 transition-opacity duration-300" onclick="closeModal()">
    <div class="relative w-full max-w-2xl mx-4 flex flex-col items-center bg-white border border-gray-100 p-8 rounded-[2rem] shadow-2xl scale-95 transition-transform duration-300" onclick="event.stopPropagation()" id="modalContent">
        
        <!-- Tombol Close -->
        <button onclick="closeModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-900 bg-gray-50 hover:bg-gray-100 transition-all rounded-full p-2.5 z-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        
        <!-- Gambar Preview -->
        <div class="w-full flex justify-center items-center overflow-hidden rounded-2xl bg-gray-50 mb-8 h-[40vh] md:h-[50vh] relative border border-gray-100">
            <img id="modalImage" src="" alt="Preview Foto Pengurus" class="w-full h-full object-contain">
        </div>
        
        <!-- Informasi Foto -->
        <div class="text-center w-full px-4">
            <h3 id="modalName" class="text-2xl md:text-3xl font-extrabold text-gray-900 mb-3 tracking-tight"></h3>
            <div class="inline-block px-5 py-2 rounded-full bg-blue-50 border border-blue-100">
                <p id="modalJabatan" class="text-blue-600 font-bold text-sm md:text-base tracking-wide"></p>
            </div>
        </div>
        
        <!-- Tombol Navigasi -->
        <button onclick="prevImage(event)" class="absolute top-1/2 -translate-y-1/2 -left-4 md:-left-6 bg-white hover:bg-gray-50 border border-gray-100 rounded-full p-3.5 transition-all hidden shadow-[0_4px_16px_rgba(0,0,0,0.08)]" id="prevBtn">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        
        <button onclick="nextImage(event)" class="absolute top-1/2 -translate-y-1/2 -right-4 md:-right-6 bg-white hover:bg-gray-50 border border-gray-100 rounded-full p-3.5 transition-all hidden shadow-[0_4px_16px_rgba(0,0,0,0.08)]" id="nextBtn">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
            </svg>
        </button>
    </div>
</section>