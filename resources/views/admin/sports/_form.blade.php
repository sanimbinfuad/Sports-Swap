@php($editing = isset($sport))

<form method="POST" action="{{ $action }}" class="max-w-xl space-y-6 rounded bg-white p-6 shadow">
    @csrf
    @if ($editing)
        @method('PATCH')
    @endif

    <div>
        <x-input-label for="name" value="Name" />
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                      :value="old('name', $sport->name ?? '')" required autofocus />
        <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>

    <div>
        <x-input-label for="sport_category_id" value="Category" />
        <select id="sport_category_id" name="sport_category_id" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            <option value="">Choose a category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    @selected(old('sport_category_id', $sport->sport_category_id ?? '') == $category->id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('sport_category_id')" />
    </div>

    <div>
        <x-input-label for="description" value="Description (optional)" />
        <textarea id="description" name="description" rows="3"
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('description', $sport->description ?? '') }}</textarea>
        <x-input-error class="mt-2" :messages="$errors->get('description')" />
    </div>

    <div class="flex items-center gap-2">
        <input type="hidden" name="is_active" value="0">
        <input id="is_active" name="is_active" type="checkbox" value="1" class="rounded border-gray-300 text-indigo-600"
               @checked(old('is_active', $sport->is_active ?? true))>
        <label for="is_active" class="text-sm text-gray-700">Active (visible to users)</label>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Save</x-primary-button>
        <a href="{{ route('admin.sports.index') }}" class="text-sm text-gray-600 hover:underline">Cancel</a>
    </div>
</form>