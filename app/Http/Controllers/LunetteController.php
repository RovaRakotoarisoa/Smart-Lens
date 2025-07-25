<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lunette;
use App\Models\Type;
use App\Models\Color;

// use Illuminate\Support\Facades\Gate;

// Use it for use method authorize
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class LunetteController extends Controller
{
    use AuthorizesRequests;


    public function index()
    {
        $lunettes = Lunette::all();
        
        return view('lunettes.index', compact('lunettes'));
    }

    public function create()
    {
        //Authorization
        // Gate::authorize('lunette_create');

        $this->authorize('create', Lunette::class);

        $types = Type::all();
        $colors = Color::all();

        // Redirection
        return view('lunettes.create', compact('types', 'colors'));
    }

    public function store(Request $request)
    {
        // Authorization
        // $this->authorize('create');


        // Validation
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

        // Creation
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

        // Insert on table pivot a value of id of lunette and id of color
        $lunette->colors()->attach($validated['colors'] ?? []);

        return redirect()->route('lunettes.index')->with('success', 'Lunette créée avec succès.');
    }

    public function edit($id)
    {
        $types = Type::all();
        $colors = Color::all();

        // Find the consern lunette
        $lunette = Lunette::findOrFail($id);

        // Redirection
        return view('lunettes.edit', compact('lunette','types', 'colors'));
    }

    public function update(Request $request, Lunette $lunette)
    {
        /** Authorization */

        /** Validation */
        $validated = $request->validate([
            'name' => 'required|string|unique:lunettes,name,' . $lunette->id,
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'description' => 'required|string|max:255',
            'frameWidth' => 'required|numeric',
            'type_id' => 'required|exists:types,id',
            'lensWidth' => 'required|numeric',
            'bridgeWidth' => 'required|numeric',
            'templeWidth' => 'required|numeric',
            'primaryimage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'secondaryimage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tertiaryimage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'quadriimage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'colors' => 'nullable|array',
            'colors.*' => 'exists:colors,id',
        ]);

        $imagePaths = [];
        foreach (['primaryimage', 'secondaryimage', 'tertiaryimage', 'quadriimage'] as $field) {
            if ($request->hasFile($field)) {
                $imagePaths[$field] = $request->file($field)->store('images/lunettes', 'public');
            }
        }

        /** Update */
        $lunette->update([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'quantity' => $validated['quantity'],
            'description' => $validated['description'],
            'frameWidth' => $validated['frameWidth'],
            'type_id' => $validated['type_id'],
            'lensWidth' => $validated['lensWidth'],
            'bridgeWidth' => $validated['bridgeWidth'],
            'templeWidth' => $validated['templeWidth'],
            'primaryimage' => $imagePaths['primaryimage'] ?? $lunette->primaryimage,
            'secondaryimage' => $imagePaths['secondaryimage'] ?? $lunette->secondaryimage,
            'tertiaryimage' => $imagePaths['tertiaryimage'] ?? $lunette->tertiaryimage,
            'quadriimage' => $imagePaths['quadriimage'] ?? $lunette->quadriimage,
        ]);

        $colorIds = collect($request->input('colors', []))
            ->filter(fn($id) => is_numeric($id) && $id > 0)
            ->map(fn($id) => (int) $id)
            ->toArray();
        
        // Synchronise a value of id of lunette and id of color in pivot table
        $lunette->colors()->sync($colorIds);

        /** Redirection */
        return redirect()->route('lunettes.index')->with('success', 'Lunette mise à jour avec succès.');
    }

}