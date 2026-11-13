<x-admin-layout title="Dashboard">
    <div class="grid gap-6 sm:grid-cols-3">
        <div class="bg-white rounded shadow p-6">
            <p class="text-sm text-gray-500">Registered users</p>
            <p class="text-3xl font-semibold text-gray-800">{{ $userCount }}</p>
        </div>
        <div class="bg-white rounded shadow p-6">
            <p class="text-sm text-gray-500">Sports in catalogue</p>
            <p class="text-3xl font-semibold text-gray-800">-</p>
        </div>
        <div class="bg-white rounded shadow p-6">
            <p class="text-sm text-gray-500">Completed swaps</p>
            <p class="text-3xl font-semibold text-gray-800">-</p>
        </div>
    </div>
</x-admin-layout>