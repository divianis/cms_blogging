<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UpdateProfileRequest;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        //return view('users.index')->with('users', User::all());
        return view('users.index')->with('users', User::paginate(5));
    }

    public function edit()
    {
        return view('users.edit')->with('user', auth()->user()); // hanya authenticated user yang bisa edit profil mereka
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'about' => $request->about
        ]);

        session()->flash('success', 'User updated successfully.');

        return redirect()->back();
    }

    public function makeAdmin(User $user)
    {
        $user->role = 'admin';

        $user->save();
        session()->flash('success', 'User has been changed into admin successfully.');

        return redirect(route('users.index'));
    }

    public function makeWriter(User $user)
    {
        $user->role = 'writer';

        $user->save();
        session()->flash('success', 'User has been changed into writer successfully.');

        return redirect(route('users.index'));
    }
}
