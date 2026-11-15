<x-admin-layout title="Sports">
    @if (session('status'))
        <div class="mb-4 rounded bg-green-100 p-4 text-green-800">{{ session('status') }}</div>
    @endif

    <div class="mb-4 flex flex-wrap items-center justify-between gap-4">
        <form method="GET" class="flex flex-wrap gap-2">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Search sports"
                   class="rounded border-gray-300 text-sm">
            <select name="category" class="rounded border-gray-300 text-sm">
                <option value="">All categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(request('category') == $category->id)>{{ $category->name }}</option>
                @endforeach
            </select>
            <button class="rounded bg-gray-800 px-4 py-2 text-sm text-white">Filter</button>
        </form>
        <a href="{{ route('admin.sports.create') }}"
           class="rounded bg-indigo-600 px-4 py-2 text-sm text-white hover:bg-indigo-700">Add sport</a>
    </div>

    <div class="overflow-x-auto rounded bg-white shadow">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-50 text-left text-gray-600">
                <tr>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Category</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($sports as $sport)
                    <tr>
                        <td class="px-4 py-3">{{ $sport->name }}</td>
                        <td class="px-4 py-3">{{ $sport->category->name }}</td>
                        <td class="px-4 py-3">
                            <span class="rounded px-2 py-1 text-xs {{ $sport->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-200 text-gray-700' }}">
                                {{ $sport->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="space-x-3 px-4 py-3 text-right">
                            <a href="{{ route('admin.sports.edit', $sport) }}" class="text-indigo-600 hover:underline">Edit</a>
                            <form method="POST" action="{{ route('admin.sports.toggle', $sport) }}" class="inline">
                                @csrf
                                @method('PATCH')
                                <button class="text-red-600 hover:underline">{{ $sport->is_active ? 'Deactivate' : 'Activate' }}</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-4 py-6 text-center text-gray-500">No sports found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $sports->links() }}</div>
</x-admin-layout>