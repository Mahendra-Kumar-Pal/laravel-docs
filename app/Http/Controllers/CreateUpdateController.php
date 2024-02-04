<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CreateUpdateController extends Controller
{
    
    public function create()
    {
        return view('companies.createupdate');
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => strtoupper($validated['email']),
        ]);

        return redirect(route('companies.create'));
    }

    
    public function edit(User $user, $id)
    {
        $user = User::findOrFail($id);
        return view('companies.createupdate', ['user' => $user]);
    }
    

    public function update(Request $request, User $user, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
        ]);
    
        $user = User::find($id);
        $user->name = $validated['name'];
        $user->email = strtolower($validated['email']);
        $user->save();
    
        return redirect(route('companies.edit',$user->id));
    }
}
