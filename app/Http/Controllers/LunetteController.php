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
    // 1. Validation
    $validated = $request->validate([
        'name'=> 'required|string|unique:lunettes,name',
        'price' => 'required',
        'quantity' => 'required',
        'description' => 'required|string|max:255',
        'frameWidth' => 'required',
        'type_id' => 'required|exists:types,id',
        'lensWidth' => 'required',
        'bridgeWidth' => 'required',
        'templeWidth' => 'required',
        'primaryimage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'secondaryimage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'tertiaryimage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'quadriimage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'colors' => 'array',
        'colors.*' => 'exists:colors,id',
    ]);

    // 2. Upload d'images
    $imagePaths = [];
    foreach (['primaryimage', 'secondaryimage', 'tertiaryimage', 'quadriimage'] as $field) {
        if ($request->hasFile($field)) {
            $imagePaths[$field] = $request->file($field)->store('images/lunettes', 'public');
        }
    }

    // 3. Création de la lunette
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

    // $userIds = $request->input('user_ids',[]);
    // 4. Association des couleurs (fix définitif ici)
    // $colorIds = $validated['colors'] ?? [];
    $colorIds = $request->input('colors',[]);
    dd($colorIds);
    // $colorIds = array_filter($colorIds, fn($id) => !empty($id)); // sécurité anti null

    // if (!empty($colorIds)) {
    //     $lunette->colors()->attach($colorIds,[]);
    // }

    // 5. Redirection
    return redirect()->route('lunettes.index')->with('success', 'Lunette créée avec succès.');
}

}
