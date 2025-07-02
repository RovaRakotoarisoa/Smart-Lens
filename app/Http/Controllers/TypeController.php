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
        
        // Creation

        // Redirection
    }
}
