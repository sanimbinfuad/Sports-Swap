<x-admin-layout title="Add Sport">
    @include('admin.sports._form', ['action' => route('admin.sports.store'), 'categories' => $categories])
</x-admin-layout>