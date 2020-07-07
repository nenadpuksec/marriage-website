@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All users</div>
                <a href="{{url('admin/user/create')}}">Create User</a>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- Show message if admin want to delete himself -->
                    @if (session('warning'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('warning') }}
                        </div>
                    @endif
                    @if(count($users) > 0)
                        @foreach($users as $user)
                            {{$user->name}} |
                            {{$user->username}} |
                            {{$user->email}} |
                            <a href="{{url('profile/'. $user->id . '/edit')}}">Edit</a>
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                            <br>

                        @endforeach
                    </div>
                    @else
                        <p>Nema korisnika</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
