<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('profile.gallery.create');
    }

    public function store(User $user)
    {
        $data = request()->validate([
            'image' => ['required', 'image'],
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        auth()->user()->gallery()->create([
            'image' => $imagePath,
        ]);

        return redirect("profile/".auth()->user()->id);

    }
}
