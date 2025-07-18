<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::latest()->paginate(10);
        $users = User::all();

        return view('users.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // //Authorization

        return view('users.create');  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Authorizattion


        //validate
        $request-> validate([ 
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'role' => 'required|in:user,admin',
            'profile_photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);
        $profilePhotoPath = null;
        if ($request->hasFile('avatar')) {
            $profilePhotoPath = $request->file('avatar')->store('avatars', 'public');
        }
        //create
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'=> $request->role,
            'profile_photo_path' => $profilePhotoPath,
        ]);

        //redirect
        return redirect()->route('users.index')->with('success', 'Utilisateur');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //Authorization

        //can edit if this is a profile of this user

        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //Authorization

        //validate
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|confirmed|min:6',
            'role' => 'required',
            'profile_photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $user = User::findOrFail($id);
        
        $profilePhotoPath = $user->profile_photo_path;
        if ($request->hasFile('avatar')) {
            $profilePhotoPath = $request->file('avatar')->store('avatars', 'public');
        }

        $updateData = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'profile_photo_path' => $profilePhotoPath,
        ];

        if(!empty($request->password)){
            $updateData['password'] = Hash::make($request->password);
        }


        //update
        $user->update($updateData);

        //redirect
        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //Authorizattion

        User::findOrFail($id)->delete();
        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès!');
    }


}
