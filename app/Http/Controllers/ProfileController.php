<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($user)
    {
        $user = User::findOrFail($user);
        return view('profile.profile', [
            'user' => $user,
            ]);
    }

    public function edit(User $user)
    {
        return view('profile.edit', compact('user'));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'phonenumber' => '',
            'about' => '',
            'location' => '',
            'address' => '',
            'country' => '',
            'city' => '',
        ]);

        $user->profile->update($data);

        return redirect("profile/{$user->id}");
    }
}
