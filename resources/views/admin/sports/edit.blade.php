<x-admin-layout title="Edit Sport">
    @include('admin.sports._form', ['action' => route('admin.sports.update', $sport), 'sport' => $sport, 'categories' => $categories])
</x-admin-layout>