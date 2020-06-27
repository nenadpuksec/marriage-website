@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Email:{{ $user->email }}<br>
                    Username:{{ $user->username }}<br>
                    phonenumber: {{$user->profile->phone_number}}<br>
                    gender: {{$user->profile->gender}}<br>
                    about: {{$user->profile->about}}<br>
                    location: {{$user->profile->location}}<br>
                    address: {{$user->profile->address}}<br>
                    country: {{$user->profile->country}}<br>
                    city: {{$user->profile->city}}<br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
