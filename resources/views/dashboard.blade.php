<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Home</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6 text-gray-800">
                <p class="text-lg font-semibold">Welcome, {{ Auth::user()->name }}!</p>
                <p class="mt-2 text-gray-600">Your Sports Swap activity will appear here soon.</p>
            </div>
        </div>
    </div>
</x-app-layout>