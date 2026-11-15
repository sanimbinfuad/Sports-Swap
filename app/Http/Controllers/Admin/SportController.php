<?php

namespace App\Http\Controllers\Admin;




use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SportRequest;
use App\Models\Sport;
use App\Models\SportCategory;
use Illuminate\Http\Request;

class SportController extends Controller
{
    public function index(Request $request)
    {
        $sports = Sport::with('category')
            ->search($request->query('q'))
            ->inCategory($request->query('category'))
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        return view('admin.sports.index', [
            'sports' => $sports,
            'categories' => SportCategory::orderBy('name')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.sports.create', [
            'categories' => SportCategory::orderBy('name')->get(),
        ]);
    }

    public function store(SportRequest $request)
    {
        Sport::create($request->validated());

        return redirect()->route('admin.sports.index')->with('status', 'Sport added.');
    }

    public function edit(Sport $sport)
    {
        return view('admin.sports.edit', [
            'sport' => $sport,
            'categories' => SportCategory::orderBy('name')->get(),
        ]);
    }

    public function update(SportRequest $request, Sport $sport)
    {
        $sport->update($request->validated());

        return redirect()->route('admin.sports.index')->with('status', 'Sport updated.');
    }

    public function toggle(Sport $sport)
    {
        $sport->update(['is_active' => ! $sport->is_active]);

        return back()->with('status', $sport->is_active ? 'Sport activated.' : 'Sport deactivated.');
    }
}