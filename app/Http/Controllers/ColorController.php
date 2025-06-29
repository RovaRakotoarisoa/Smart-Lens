<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Color;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();

        return view('home', compact('colors'));
    }

    public function create()
    {
        return view('colors.create');
    }

    public function store(Request $request)
    {
        // Authorize

        // Validate
        $request->validate(
            [
                'color_name' =>'required|string|unique'
            ]
        );

        // Create
        Color::create(
            [
                'color_name' => $request->color_name
            ]
        );

        // Redirect


    }
}
