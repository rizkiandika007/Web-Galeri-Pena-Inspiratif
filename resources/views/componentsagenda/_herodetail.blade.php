<section class="max-w-[1130px] mx-auto" style="margin-top: 30px;">
    <a href="{{ route('agenda') }}" class="back-btn" style="margin-bottom: 20px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg>
        Kembali ke Agenda
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
                <a href="{{ route('agenda') }}">Agenda</a>
                <span class="separator">›</span>
                <span style="color: rgba(255,255,255,0.7);">Detail Agenda</span>
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