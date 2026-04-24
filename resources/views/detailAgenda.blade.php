<!DOCTYPE html>
<html lang="id">
@include('componentsdetail._head')
@include('componentsdetail._style')
<body class="font-[Poppins] bg-[#F0F6FF]" style="padding-bottom: 0;">
@include('components._navbar')

<!-- HERO DETAIL AGENDA -->
<section class="max-w-[1130px] mx-auto" style="margin-top: 30px;">
    <a href="{{ route('home') }}" class="back-btn" style="margin-bottom: 20px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg>
        Kembali ke Beranda
    </a>

    <div class="hero-detail">
        @if($agenda->thumbnail)
            <img src="{{ asset('storage/' . $agenda->thumbnail) }}" alt="{{ $agenda->judul }}" />
        @else
            <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #2E5BFF 0%, #042C53 100%); display: flex; align-items: center; justify-content: center;">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.4)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
            </div>
        @endif
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Beranda</a>
                <span class="separator">›</span>
                <span style="color: rgba(255,255,255,0.7);">Agenda</span>
            </div>
            <span class="kategori-tag kategori-tag-white"> AGENDA</span>
            <h1 class="font-bold text-white" style="font-size: 32px; line-height: 1.3; margin-top: 12px; max-width: 720px;">{{ $agenda->judul }}</h1>
            <div class="meta-row">
                <div class="meta-item">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    {{ \Carbon\Carbon::parse($agenda->tanggal_pelaksanaan)->translatedFormat('d F Y') }}
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CONTENT AGENDA -->
<section class="max-w-[1130px] mx-auto px-4 lg:px-0 mt-8 mb-16">
    
    <!-- Countdown Timer (Jika tanggal masih akan datang) -->
    @php
        $today = \Carbon\Carbon::today();
        $eventDate = \Carbon\Carbon::parse($agenda->tanggal_pelaksanaan);
        $isUpcoming = $eventDate->isFuture();
        $daysDiff = $today->diffInDays($eventDate);
    @endphp

    @if($isUpcoming)
    <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-2xl p-6 mb-8 text-white">
        <div class="flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                <div>
                    <p class="text-sm opacity-90">Agenda Mendatang</p>
                    <p class="font-bold text-lg">H-{{ $daysDiff }} menuju pelaksanaan</p>
                </div>
            </div>
            <div class="flex gap-4">
                <div class="text-center bg-white/20 rounded-lg px-4 py-2 backdrop-blur-sm min-w-[70px]">
                    <span class="text-2xl font-bold">{{ $daysDiff }}</span>
                    <p class="text-xs">Hari</p>
                </div>
            </div>
            <button onclick="addToCalendar()" class="bg-white text-blue-600 font-semibold px-6 py-2 rounded-full hover:bg-gray-100 transition flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                Tambah ke Kalender
            </button>
        </div>
    </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- MAIN CONTENT - Informasi Agenda -->
        <div class="lg:col-span-2">
            <!-- Info Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-6">
                <div class="border-b border-gray-100 px-6 py-4 bg-gray-50/50">
                    <h2 class="font-bold text-xl text-gray-800 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#2E5BFF" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                        Informasi Agenda
                    </h2>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <div class="mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#2E5BFF" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Tanggal Pelaksanaan</p>
                                <p class="font-medium text-gray-800">
                                    {{ \Carbon\Carbon::parse($agenda->tanggal_pelaksanaan)->translatedFormat('l, d F Y') }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#2E5BFF" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Status</p>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                    @if($isUpcoming) Akan Datang @elseif($eventDate->isToday()) Hari Ini @else Selesai @endif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Description Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="border-b border-gray-100 px-6 py-4 bg-gray-50/50">
                    <h2 class="font-bold text-xl text-gray-800 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#2E5BFF" stroke-width="2"><path d="M4 4h16v16H4z"/><path d="M9 8h6"/><path d="M9 12h6"/><path d="M9 16h4"/></svg>
                        Deskripsi Agenda
                    </h2>
                </div>
                <div class="p-6">
                    <div class="prose max-w-none text-gray-600 leading-relaxed">
                        {!! nl2br(e($agenda->keterangan ?? 'Tidak ada deskripsi untuk agenda ini.')) !!}
                    </div>
                </div>
            </div>
        </div>

        <!-- SIDEBAR -->
        <div class="lg:col-span-1">
            <!-- Info Tambahan -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden sticky top-24">
                <div class="border-b border-gray-100 px-5 py-4 bg-gray-50/50">
                    <h3 class="font-bold text-gray-800 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2E5BFF" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                        Agenda Lainnya
                    </h3>
                </div>
                <div class="p-4 divide-y divide-gray-100">
                    @forelse($latestAgendas ?? [] as $item)
                    <a href="{{ route('agenda.detail', $item->id) }}" class="block py-3 hover:bg-gray-50 transition rounded-lg px-2 -mx-2">
                        <h4 class="font-semibold text-gray-800 text-sm line-clamp-2 group-hover:text-blue-600">{{ $item->judul }}</h4>
                        <p class="text-xs text-gray-500 mt-1 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            {{ \Carbon\Carbon::parse($item->tanggal_pelaksanaan)->translatedFormat('d F Y') }}
                        </p>
                    </a>
                    @empty
                    <p class="text-gray-500 text-sm py-4 text-center">Belum ada agenda lainnya</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function addToCalendar() {
    alert('Fitur tambah ke kalender akan segera tersedia.\n\n{{ $agenda->judul }}\n{{ \Carbon\Carbon::parse($agenda->tanggal_pelaksanaan)->translatedFormat('d F Y') }}');
}
</script>

@include('components._footer')
@include('components._script')
</body>
</html>