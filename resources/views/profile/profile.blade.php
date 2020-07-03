@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">{{$user->name}}'s Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Email:{{ $user->email }}<br>
                    Username:{{ $user->username }}<br>
                    phone_number: {{$user->profile->phone_number}}<br>
                    about: {{$user->profile->about}}<br>
                    location: {{$user->profile->location}}<br>
                    address: {{$user->profile->address}}<br>
                    country: {{$user->profile->country}}<br>
                    city: {{$user->profile->city}}<br>
                    profile picture: <img width="200px" src="{{ asset('storage/'.$user->profile->profile_img) }}" /><br>
                    gallery:
                    @foreach($user->gallery as $images)
                        <img width="200px" src="{{ asset('storage/'.$images->image) }}" />
                    @endforeach
                    <br>
                    <a href="{{url('profile/'. auth()->user()->id . '/edit')}}">Edit Profile Info</a>
                    <br>
                    <a href="{{url('profile/gallery/create')}}">Add Image</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
