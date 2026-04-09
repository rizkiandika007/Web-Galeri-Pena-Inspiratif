<!DOCTYPE html>
<html lang="id">
@include('componentsgaleri._head')
<body class="font-[Poppins] bg-[#F9F9FC] flex flex-col min-h-screen">
@include('components._navbar')
<main class="flex-1 flex flex-col">
    @include('componentsgaleri._herosection')
    @include('componentsgaleri._galerigrid')
</main>
<div class="mt-auto">
    @include('components._footer')
</div>
@include('components._script')
</body>
</html>