@props(['title' => 'Sports Swap'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-white text-gray-800">
    <header class="border-b">
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="{{ url('/') }}" class="text-xl font-bold text-indigo-600">Sports Swap</a>
            <nav class="flex items-center gap-6 text-sm">
                <a href="{{ route('about') }}" class="hover:text-indigo-600">About</a>
                @auth
                    @if (Auth::user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="hover:text-indigo-600">Admin</a>
                    @endif
                    <a href="{{ route('dashboard') }}" class="hover:text-indigo-600">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="hover:text-indigo-600">Log in</a>
                    <a href="{{ route('register') }}" class="rounded bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700">Sign up</a>
                @endauth
            </nav>
        </div>
    </header>

    <main>{{ $slot }}</main>

    <footer class="border-t mt-16">
        <div class="max-w-6xl mx-auto px-6 py-6 text-sm text-gray-500">
            &copy; {{ date('Y') }} Sports Swap. Teach a sport, learn a sport.
        </div>
    </footer>
</body>
</html>