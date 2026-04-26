<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('output.css') }}" rel="stylesheet" />
    <link href="{{ asset('main.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Kepengurusan - Pena Inspiratif</title>
</head>
<body class="font-[Poppins] text-gray-900 antialiased bg-gray-50 flex flex-col min-h-screen">
    @include('components._navbar')

    <main class="flex-grow">
        @include('componentstentang._pengurus')
    </main>

    @include('components._footer')
    @include('components._script')
    @include('componentstentang._script')
</body>
</html>
