<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lunette;
use App\Models\Type;

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
        // Redirection
        return view('lunettes.create', compact('types'));
    }

    public function store(Request $request)
    {
        // Authorization

        // Validation
        $createLunetteData = $request->validate([
            'name'=> 'required|string|unique:lunettes,name',
            'price' => 'required',
            'description' => 'required|string|max:255',
            'frameWidth' => 'required',
            'type_id' => 'required',
            'lensWidth' => 'required',
            'bridgeWidth' => 'required',
            'templeWidth' => 'required',
            'primaryimage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'secondaryimage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tertiaryimage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'quadriimage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Creation
        Lunette::create($createLunetteData);

        // Redirection
        return redirect()->route('lunettes.index')->with('success', 'Lunette created');
    }
}
