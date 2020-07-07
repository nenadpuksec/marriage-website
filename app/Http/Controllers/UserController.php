<?php

namespace App\Http\Controllers;
use App\User;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index()
    {
        $users =  User::all();
        return view('admin.user.users', [
            'users' => $users,
            ]);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'phone_number' => '',
            'about' => '',
            'location' => '',
            'address' => '',
            'country' => '',
            'city' => '',
            'profile_img' => 'nullable | image',

        ]);
        //New user
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->password = Hash::make($request['password']);
        $user->save();

        //create profile
        $profile = new Profile;
        $profile->user_id = $user->id;
        $profile->phone_number = $request->input('phone_number');
        $profile->about = $request->input('about');
        $profile->location = $request->input('location');
        $profile->address = $request->input('address');
        $profile->country = $request->input('country');
        $profile->city = $request->input('city');
        $profile->profile_img = $request->input('profile_img');
        $profile->save();

        return redirect('admin/admin_home');

    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function destroy($id)
    {
        if(Auth::user()->id == $id){
            return redirect()->route('user.index')->with('warning', 'you are not allowed to  delete yourself');
        }
        User::destroy($id);
        return redirect()->route('user.index');
    }
}
