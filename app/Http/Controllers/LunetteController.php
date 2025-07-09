<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lunette;
use App\Models\Type;
use App\Models\Color;

class LunetteController extends Controller
{
    public function index()
    {
        $lunettes = Lunette::all();
        
        return view('lunettes.index', compact('lunettes'));
    }

    public function create()
    {
        // Authorization

        $types = Type::all();
        $colors = Color::all();
        // Redirection
        return view('lunettes.create', compact('types', 'colors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:lunettes,name',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'description' => 'required|string|max:255',
            'frameWidth' => 'required|numeric',
            'type_id' => 'required|exists:types,id',
            'lensWidth' => 'required|numeric',
            'bridgeWidth' => 'required|numeric',
            'templeWidth' => 'required|numeric',
            'primaryimage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'secondaryimage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tertiaryimage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'quadriimage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'colors' => 'nullable|array',
            'colors.*' => 'exists:colors,id',
        ]);

        // Sauvegarde images
        $imagePaths = [];
        foreach (['primaryimage', 'secondaryimage', 'tertiaryimage', 'quadriimage'] as $field) {
            if ($request->hasFile($field)) {
                $imagePaths[$field] = $request->file($field)->store('images/lunettes', 'public');
            }
        }

        // Création lunette
        $lunette = Lunette::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'quantity' => $validated['quantity'],
            'description' => $validated['description'],
            'frameWidth' => $validated['frameWidth'],
            'type_id' => $validated['type_id'],
            'lensWidth' => $validated['lensWidth'],
            'bridgeWidth' => $validated['bridgeWidth'],
            'templeWidth' => $validated['templeWidth'],
            'primaryimage' => $imagePaths['primaryimage'] ?? null,
            'secondaryimage' => $imagePaths['secondaryimage'] ?? null,
            'tertiaryimage' => $imagePaths['tertiaryimage'] ?? null,
            'quadriimage' => $imagePaths['quadriimage'] ?? null,
        ]);

        // Association couleurs
        $colorIds = $request->input('colors', []);
        $colorIds = array_filter($colorIds);

        $pivotData = [];
        foreach ($colorIds as $id) {
            $pivotData[$id] = []; // forcer la structure
        }

        if (!empty($pivotData)) {
            $lunette->colors()->attach($pivotData);
        }

        return redirect()->route('lunettes.index')->with('success', 'Lunette créée avec succès.');
    }



 

}
