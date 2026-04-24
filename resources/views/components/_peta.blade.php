<!-- PETA SEKOLAH -->
<section id="Peta-Sekolah" class="max-w-[1200px] mx-auto px-4 lg:px-8 mt-16 md:mt-24 mb-10 md:mb-20">
    <div class="text-center mb-10 md:mb-12">
        <span class="section-badge mb-3 inline-block">PETA SEKOLAH</span>
        <h2 class="section-title text-[24px] md:text-[32px] leading-tight">Denah & Lokasi Ruangan<br>Pena Inspiratif</h2>
    </div>

    <div class="bg-white overflow-hidden flex flex-col lg:flex-row border border-gray-100 rounded-3xl lg:rounded-[32px] shadow-[0_10px_40px_rgba(0,0,0,0.06)]">
        <div class="flex flex-col justify-center w-full lg:w-5/12 p-8 lg:p-14 gap-4 md:gap-5">
            <h3 class="font-extrabold text-2xl text-gray-900 leading-tight">Fasilitas Lengkap</h3>
            <p class="text-gray-500 text-[15px] leading-relaxed">
                Jelajahi denah sekolah kami untuk menemukan ruang kelas, laboratorium komputer, perpustakaan, hingga fasilitas olahraga dengan mudah dan interaktif.
            </p>

            {{-- $petaSekolah → variabel dari controller, berisi satu record galeri khusus peta --}}
            {{-- $petaSekolah->fotos → relasi hasMany ke tabel 'fotos' --}}
            @if($petaSekolah && $petaSekolah->fotos->isNotEmpty())
                {{-- $petaSekolah->fotos->first()->file → kolom 'file' dari tabel 'fotos' --}}
                <a href="{{ asset('storage/' . $petaSekolah->fotos->first()->file) }}" target="_blank" class="nav-cta mt-4 md:mt-6 w-fit inline-flex items-center gap-2 group font-bold px-6 py-3 rounded-full hover:bg-blue-700 hover:shadow-lg transition-all text-[15px]">
                    Lihat Peta Resolusi Tinggi 
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" class="group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"><path stroke-linecap="round" stroke-linejoin="round" d="M7 17l9.2-9.2M17 17V7H7"/></svg>
                </a>
            @else
                <span class="text-gray-500 font-semibold inline-block px-5 py-2.5 bg-gray-50 border border-gray-200 rounded-full text-[14px] w-fit mt-4">Peta Segera Hadir</span>
            @endif
        </div>

        <div class="w-full lg:w-7/12 h-[260px] sm:h-[360px] lg:h-[480px] relative border-t lg:border-t-0 lg:border-l border-gray-100 group">
            {{-- $petaSekolah → jika ada data, tampilkan gambar peta dari storage --}}
            @if($petaSekolah && $petaSekolah->fotos->isNotEmpty())
                <img src="{{ asset('storage/' . $petaSekolah->fotos->first()->file) }}" class="w-full h-full object-cover transition-transform duration-700 md:group-hover:scale-105" alt="Peta Sekolah" />
                <div class="absolute inset-0 bg-black/5 md:group-hover:bg-transparent transition-colors z-10 pointer-events-none"></div>
            @else
                <div class="flex flex-col items-center justify-center w-full h-full text-gray-400 font-medium bg-gray-50/50 gap-3">
                    <svg width="40" height="40" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A2 2 0 013 15.489V5.282a2 2 0 012.894-1.789L10 5l5-2.5 4.553 2.276A2 2 0 0121 6.511v10.207a2 2 0 01-2.894 1.789L14 20l-5 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M9 20V5M14 20V5"/></svg>
                    <span>Peta Temporer Absen / Kosong</span>
                </div>
            @endif
        </div>
    </div>

    <div class="mt-8 md:mt-12 bg-white overflow-hidden flex flex-col border border-gray-100 rounded-3xl lg:rounded-[32px] shadow-[0_10px_40px_rgba(0,0,0,0.06)] p-3 lg:p-4">
        <div class="px-2 lg:px-4 pt-2 pb-4 flex flex-col gap-1">
            <h3 class="font-extrabold text-xl text-gray-900 leading-tight">Lokasi Google Maps</h3>
        </div>
        <div class="w-full h-[300px] sm:h-[400px] lg:h-[480px] relative rounded-[20px] lg:rounded-[24px] overflow-hidden">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.081370484469!2d106.63161827353947!3d-6.636816764876124!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69d7529a258b63%3A0x25d4e941025584e4!2sSMK%20Al%20Hafidz%20Leuwiliang!5e0!3m2!1sid!2sid!4v1776998231791!5m2!1sid!2sid" 
                class="absolute top-0 left-0 w-full h-full border-0" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>