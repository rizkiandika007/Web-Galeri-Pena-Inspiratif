<script>
    let currentIndex = 0;
    
    function openModal(fotoUrl, nama, jabatan) {
        const modal = document.getElementById('imageModal');
        const modalContent = document.getElementById('modalContent');
        const modalImage = document.getElementById('modalImage');
        const modalName = document.getElementById('modalName');
        const modalJabatan = document.getElementById('modalJabatan');
        
        if (typeof pengurusData !== 'undefined' && pengurusData.length) {
            currentIndex = pengurusData.findIndex(p => p.foto && '{{ asset("storage") }}' + '/' + p.foto === fotoUrl);
            if (currentIndex === -1) currentIndex = 0;
            
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            if (pengurusData.length > 1) {
                prevBtn.classList.remove('hidden');
                nextBtn.classList.remove('hidden');
            } else {
                prevBtn.classList.add('hidden');
                nextBtn.classList.add('hidden');
            }
        }
        
        modalImage.src = fotoUrl;
        modalName.textContent = nama;
        modalJabatan.textContent = jabatan;
        
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        
        // Trigger reflow for animation
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modal.classList.add('opacity-100');
            modalContent.classList.remove('scale-95');
            modalContent.classList.add('scale-100');
        }, 10);
        
        document.body.style.overflow = 'hidden';
    }
    
    function closeModal() {
        const modal = document.getElementById('imageModal');
        const modalContent = document.getElementById('modalContent');
        
        modal.classList.remove('opacity-100');
        modal.classList.add('opacity-0');
        modalContent.classList.remove('scale-100');
        modalContent.classList.add('scale-95');
        
        setTimeout(() => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = 'auto';
        }, 300);
    }
    
    function prevImage(event) {
        event.stopPropagation();
        if (pengurusData && pengurusData.length > 0 && currentIndex > 0) {
            const prev = pengurusData[currentIndex - 1];
            if (prev && prev.foto) {
                openModal('{{ asset("storage") }}/' + prev.foto, prev.nama, prev.jabatan);
            }
        }
    }
    
    function nextImage(event) {
        event.stopPropagation();
        if (pengurusData && pengurusData.length > 0 && currentIndex < pengurusData.length - 1) {
            const next = pengurusData[currentIndex + 1];
            if (next && next.foto) {
                openModal('{{ asset("storage") }}/' + next.foto, next.nama, next.jabatan);
            }
        }
    }
    
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeModal();
        }
    });
</script>