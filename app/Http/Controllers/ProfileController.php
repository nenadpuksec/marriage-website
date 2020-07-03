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

    public function update(User $user, Request $request)
    {
        $data = request()->validate([
            'phone_number' => '',
            'about' => '',
            'location' => '',
            'address' => '',
            'country' => '',
            'city' => '',
            'profile_img' => 'nullable | image',
        ]);

        //Edit profile picture if exist
        if($request->hasFile('profile_img')){
            $imagePath = request('profile_img')->store('uploads', 'public');
            $user->profile->update([
            'profile_img' => $imagePath,
            ]);
        }
        //Update profile
        $user->profile->update([
            'phone_number' => $data['phone_number'],
            'about' => $data['about'],
            'location' => $data['location'],
            'address' => $data['address'],
            'country' => $data['country'],
            'city' => $data['city'],
        ]);

        return redirect("profile/{$user->id}");
    }
}
