<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use App\Models\SportCategory;
use Illuminate\Http\Request;

class SportController extends Controller
{
    public function index(Request $request)
    {
        $sports = Sport::active()
            ->with('category')
            ->search($request->query('q'))
            ->inCategory($request->query('category'))
            ->orderBy('name')
            ->paginate(12)
            ->withQueryString();

        return view('sports.index', [
            'sports' => $sports,
            'categories' => SportCategory::orderBy('name')->get(),
        ]);
    }
}
