    <section class="flex-grow w-full pb-20 mt-10">
        <div class="max-w-[800px] mx-auto px-4 lg:px-8">
            <div class="flex flex-col gap-4">

                @forelse($agendas as $agenda)

                    <a href="{{ route('agenda.detail', $agenda->id) }}" class="card w-full group bg-white rounded-2xl shadow-sm hover:shadow-md transition-shadow border border-gray-100 overflow-hidden">
                        <div class="p-4 flex items-center gap-4 transition-transform duration-300 md:hover:translate-x-1 outline-none">
                            <div class="shrink-0 w-[80px] h-[80px] bg-blue-50/50 group-hover:bg-blue-100 transition-colors rounded-xl flex flex-col items-center justify-center">
                                @php
                                    $tgl = \Carbon\Carbon::parse($agenda->tanggal_pelaksanaan);
                                @endphp
                                <span class="font-bold text-2xl leading-none text-[#2563EB] mb-1">{{ $tgl->format('d') }}</span>
                                <span class="font-bold text-xs text-[#2563EB]/70 leading-none">{{ strtoupper($tgl->translatedFormat('M Y')) }}</span>
                            </div>
                            <div class="flex flex-col gap-2 min-w-0 pr-2">
                                <h3 class="font-bold text-lg leading-tight text-[#1A1D26] line-clamp-2 md:group-hover:text-blue-600 transition-colors">{{ $agenda->judul }}</h3>
                                <p class="text-[#A3A6AE] text-sm font-medium line-clamp-1">{{ $agenda->keterangan ? strip_tags($agenda->keterangan) : 'Agenda Sekolah' }}</p>
                            </div>
                        </div>
                    </a>

                @empty
                    <div class="flex flex-col items-center justify-center text-[#A3A6AE] font-medium py-20 bg-white shadow-sm border border-gray-100 rounded-3xl">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="mb-4 opacity-50"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        <p class="text-lg">Belum ada agenda</p>
                    </div>
                @endforelse

            </div>
        </div>
    </section>