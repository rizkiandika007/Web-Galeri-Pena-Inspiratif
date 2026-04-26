<!-- FOOTER - RESPONSIVE -->
<footer style="margin-top: 80px; background: linear-gradient(135deg, #0a2a4a 0%, #0c3683ff 60%, #1446b1ff 100%); border-top: 1px solid rgba(255,255,255,0.1);">
    <div class="max-w-[1130px] mx-auto" style="padding: 60px 24px 24px;">

        <div class="flex flex-col md:flex-row justify-between" style="gap: 40px; margin-bottom: 40px;">

            {{-- BRAND --}}
            <div class="flex flex-col" style="gap: 16px; min-width: 0; flex: 1 1 40%;">
                <div class="flex items-center" style="gap: 12px;">
                    <img src="{{ asset('assets/images/logos/pena.jpeg') }}" alt="icon" style="width: 80px; height: 56px; border-radius: 8px; object-fit: cover; border: 2px solid rgba(255,255,255,0.2); flex-shrink: 0;" />
                    <div>
                        <h3 class="font-bold" style="font-size: 18px; color: #ffffff;">Pena Inspiratif</h3>
                        <p class="font-medium" style="font-size: 13px; color: rgba(255,255,255,0.6);">Suara Masa Depan</p>
                    </div>
                </div>
                <p style="font-size: 14px; line-height: 1.7; color: rgba(255,255,255,0.65);">
                    Wadah dokumentasi dan informasi kegiatan ekstrakurikuler Pena Inspiratif. Membangun kreativitas dan menyebarkan inspirasi melalui karya digital.
                </p>
            </div>

            {{-- TAUTAN CEPAT --}}
            <div class="flex flex-col" style="gap: 16px; flex: 1 1 25%;">
                <h4 class="font-bold" style="color: #ffffff; font-size: 15px; letter-spacing: 0.5px;">Tautan Cepat</h4>
                <ul class="flex flex-col" style="gap: 12px;">
                    <li><a href="{{ route('home') }}" class="transition-all font-medium" style="font-size: 14px; color: rgba(255,255,255,0.6); text-decoration: none;">Beranda</a></li>
                    <li><a href="{{ route('agenda') }}" class="transition-all font-medium" style="font-size: 14px; color: rgba(255,255,255,0.6); text-decoration: none;">Agenda</a></li>
                    <li><a href="{{ route('galeri') }}" class="transition-all font-medium" style="font-size: 14px; color: rgba(255,255,255,0.6); text-decoration: none;">Galeri</a></li>
                    <li><a href="{{ route('tentangKami') }}" class="transition-all font-medium" style="font-size: 14px; color: rgba(255,255,255,0.6); text-decoration: none;">Tentang Kami</a></li>
                </ul>
            </div>

            {{-- KONTAK --}}
            <div class="flex flex-col" style="gap: 16px; flex: 1 1 35%;">
                <h4 class="font-bold" style="color: #ffffff; font-size: 15px; letter-spacing: 0.5px;">Kontak Kami</h4>
                <ul class="flex flex-col" style="gap: 16px;">
                    <li class="flex items-center" style="gap: 12px;">
                        <div style="width: 36px; height: 36px; border-radius: 50%; background: rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; color: #5dade2; flex-shrink: 0;">
                            <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <span style="font-size: 14px; color: rgba(255,255,255,0.65); word-break: break-word;">info@penainspiratif.sch.id</span>
                    </li>
                    <li class="flex items-center" style="gap: 12px;">
                        <div style="width: 36px; height: 36px; border-radius: 50%; background: rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; color: #5dade2; flex-shrink: 0;">
                            <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </div>
                        <span style="font-size: 14px; color: rgba(255,255,255,0.65);">+62 813-1501-7839 (Bu Lutfia Rifaah)</span>
                    </li>
                    <li class="flex items-start" style="gap: 12px;">
                        <div style="width: 36px; height: 36px; border-radius: 50%; background: rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; color: #5dade2; flex-shrink: 0;">
                            <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <span style="font-size: 14px; line-height: 1.6; color: rgba(255,255,255,0.65);">Jl. Moh. Noh Noor RT 04/01, Desa Karyasari, Kecamatan Leuwiliang, Kab. Bogor 16640</span>
                    </li>
                </ul>
            </div>

        </div>

        {{-- BOTTOM BAR --}}
        <div class="flex flex-col md:flex-row justify-between items-center w-full" style="padding-top: 24px; border-top: 1px solid rgba(255,255,255,0.1); gap: 16px;">
            <p class="text-center md:text-left" style="font-size: 13px; font-weight: 500; color: rgba(255,255,255,0.5);">
                &copy; {{ date('Y') }} Pena Inspiratif · Uji Kompetensi Keahlian PPLG
            </p>
            <div class="flex gap-3">
                <a href="https://www.instagram.com/penainspiratif.smkalhafidz?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" style="width: 36px; height: 36px; border-radius: 50%; background: rgba(255,255,255,0.08); display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,0.6); transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#5dade2'; this.style.color='white';" onmouseout="this.style.backgroundColor='rgba(255,255,255,0.08)'; this.style.color='rgba(255,255,255,0.6)';">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                </a>
            </div>
        </div>
    </div>
</footer>