<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Color;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();

        return view('colors.index', compact('colors'));
    }

    public function create()
    {
        return view('colors.create');
    }

    public function store(Request $request)
    {
        // Authorize

        // Validate
        $request->validate([
                'color_name' => 'required|string|unique:colors,color_name',
                'code_color' => 'required'
        ]);
        
        // Create
        Color::create(
            [
                'color_name' => $request->color_name,
                'code_color' =>$request->code_color
            ]
        );

        // Redirect
        return redirect()->route('colors.index')->with('success', 'color created');
    }

    public function edit($id)
    {
        $color = Color::findOrFail($id);
        return view('colors.edit', compact('color'));
    }

    public function update(Request $request, $id)
    {
        // Authorization

        // Validation
        $request->validate([
            'color_name' => 'required|string|unique:colors,color_name,'.$id,
            'code_color' => 'required|string',
        ]);

        $color = Color::findOrFail($id);

        $updateData = [
            'color_name' => $request->color_name,
            'code_color' => $request->code_color,
        ];

        // Update
        $color->update($updateData);

        // Redirection
        return redirect()->route('home')->with('success', 'Couleur mis a jour');
    }

    public function destroy($id)
    {
        // Authorization

        // Validation
        Color::findOrFail($id)->delete();

        // Redirection
        return redirect()->route('colors.index')->with('success', 'Couleur supprimé avec succès!');
    }
}
