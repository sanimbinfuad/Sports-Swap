<x-dynamic-component :component="auth()->check() ? 'app-layout' : 'public-layout'" title="Sports - Sports Swap">
    <div class="mx-auto max-w-6xl px-6 py-10">
        <h1 class="text-2xl font-bold">Sports catalogue</h1>

        <form method="GET" class="mt-6 flex flex-wrap gap-2">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Search sports"
                   class="rounded border-gray-300 text-sm">
            <select name="category" class="rounded border-gray-300 text-sm">
                <option value="">All categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(request('category') == $category->id)>{{ $category->name }}</option>
                @endforeach
            </select>
            <button class="rounded bg-indigo-600 px-4 py-2 text-sm text-white hover:bg-indigo-700">Search</button>
        </form>

        <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($sports as $sport)
                <div class="rounded border bg-white p-5 shadow-sm">
                    <p class="text-xs uppercase tracking-wide text-indigo-600">{{ $sport->category->name }}</p>
                    <h2 class="mt-1 text-lg font-semibold">{{ $sport->name }}</h2>
                    <p class="mt-2 text-sm text-gray-600">{{ $sport->description ?? 'No description yet.' }}</p>
                </div>
            @empty
                <p class="text-gray-500">No sports found.</p>
            @endforelse
        </div>

        <div class="mt-6">{{ $sports->links() }}</div>
    </div>
</x-dynamic-component>