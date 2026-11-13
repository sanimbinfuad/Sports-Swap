@props(['title' => 'Admin'])

@php
    $links = [
        'Dashboard' => 'admin.dashboard',
        'Sports' => 'admin.sports.index',
        'Users' => 'admin.users.index',
        'Reports' => 'admin.reports.index',
        'Support' => 'admin.support.index',
        'Settings' => 'admin.settings.edit',
    ];
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} - Sports Swap Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="flex min-h-screen">
        <aside class="w-64 bg-gray-900 text-gray-100 flex flex-col">
            <div class="px-6 py-4 text-xl font-semibold border-b border-gray-700">Sports Swap Admin</div>
            <nav class="flex-1 px-4 py-4 space-y-1">
                @foreach ($links as $label => $route)
                    <a href="{{ route($route) }}"
                       class="block rounded px-3 py-2 hover:bg-gray-700 {{ request()->routeIs($route) ? 'bg-gray-700' : '' }}">
                        {{ $label }}
                    </a>
                @endforeach
            </nav>
        </aside>

        <div class="flex-1 flex flex-col">
            <header class="bg-white shadow px-6 py-4 flex items-center justify-between">
                <h1 class="text-lg font-semibold text-gray-800">{{ $title }}</h1>
                <div class="flex items-center gap-4 text-sm text-gray-600">
                    <span>{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-red-600 hover:underline">Log Out</button>
                    </form>
                </div>
            </header>

            <main class="flex-1 p-6">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>