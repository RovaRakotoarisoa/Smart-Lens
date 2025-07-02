<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lunette;

class LunetteController extends Controller
{
    public function index()
    {
        $lunettes = Lunette::all();
        
        return view('lunettes.index', compact('lunettes'));
    }
}
