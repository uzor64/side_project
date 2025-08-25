<!doctype html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Orders</title>

    {{-- Fonts (Inter to match the look) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css','resources/js/app.js'])
    @livewireStyles
</head>
<body class="min-h-screen antialiased" style="font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, sans-serif;">
    <div class="min-h-screen w-full bg-gradient-to-b from-slate-100 to-slate-50 flex items-center justify-center py-8">
        {{ $slot }}
    </div>

    @livewireScripts
    <script src="{{ asset('node_modules/flowbite/dist/flowbite.min.js') }}"></script>
</body>
</html>
