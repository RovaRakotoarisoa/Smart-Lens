<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();

        return view('types.index', compact('types'));
    }

    public function create()
    {
        // Authorization

        // Redirection
        return view('types.create');
    }

    public function store(Request $request)
    {
        // Authorization

        // Validation
        $request->validate([
            'type' =>'required|string|uppercase',
        ]);

        // Creation
        Type::create(['type' => $request->type]);

        // Redirection
        return redirect()->route('types.index')->with('success', 'Types created');
    }

    public function edit($id)
    {
        $type = Type::findOrFail($id);

        return view('types.edit', compact('type'));
    }

    public function update(Request $request, $id)
    {
        // Authorization

        // Validation
        $request->validate(['type' => 'required|uppercase']);

        $type = Type::findOrFail($id);
        
        $updateData = ['type'=> $request->type];

        // Update
        $type->update($updateData);

        // Redirect
        return redirect()->route('types.index')->with('success', 'Type mis a jour');
    }

    public function destroy($id)
    {
        // Authorization

        // Find
        Type::findOrFail($id)->delete();

        // Redirection
        return redirect()->route('types.index')->with('success', 'Types supprimé avec succès!');
    }
}
