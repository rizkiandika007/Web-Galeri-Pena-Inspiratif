<!DOCTYPE html>
<html lang="id">
@include('componentsdetail._head')
@include('componentsdetail._style')
@include('components._navbar')
@include('componentsagenda._herodetail')
@include('componentsagenda._kontendetail')
@include('components._footer')
@include('components._script')
<script>
function addToCalendar() {
    alert('Fitur tambah ke kalender akan segera tersedia.\n\n{{ $agenda->judul }}\n{{ \Carbon\Carbon::parse($agenda->tanggal_pelaksanaan)->translatedFormat('d F Y') }}');
}
</script>
</body>
</html>