@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ route('profile.update', auth()->user()->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Edit Profile</h1>
                </div>
                <div class="form-group row">
                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">phone_number</label>

                    <div class="col-md-6">
                        <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') ?? $user->profile->phone_number }}" autocomplete="phone_number" autofocus>

                        @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="about" class="col-md-4 col-form-label text-md-right">About</label>

                    <div class="col-md-6">
                        <input id="about" type="text" class="form-control @error('about') is-invalid @enderror" name="about" value="{{ old('about') ?? $user->profile->about }}" autocomplete="about" autofocus>

                        @error('about')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="location" class="col-md-4 col-form-label text-md-right">location</label>

                    <div class="col-md-6">
                        <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') ?? $user->profile->location }}" autocomplete="location" autofocus>

                        @error('location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="address" class="col-md-4 col-form-label text-md-right">address</label>

                    <div class="col-md-6">
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') ?? $user->profile->address }}" autocomplete="address" autofocus>

                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="city" class="col-md-4 col-form-label text-md-right">city</label>

                    <div class="col-md-6">
                        <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') ?? $user->profile->city }}" autocomplete="city" autofocus>

                        @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="country" class="col-md-4 col-form-label text-md-right">country</label>

                    <div class="col-md-6">
                        <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') ?? $user->profile->country }}" autocomplete="country" autofocus>

                        @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <label for="profile_img" class="">profile_img</label>
                        @error('profile_img')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <input type="file" class="form-control-file" name="profile_img" id="profile_img">
                </div>

                <div class="row">
                    <button class="btn btn-primary">Edit Profie</button>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection
