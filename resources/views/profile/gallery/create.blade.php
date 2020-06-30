@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{url('profile/gallery')}}" method="post" enctype="multipart/form-data">
        @csrf

		<div class="row">
        <div class="col-8 offset-2">
          <div class="row">
              <h1>Add Image</h1>
          </div>

          <div class="row">
              <label for="image" class="">Image</label>
                  @error('image')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              <input type="file" class="form-control-file" name="image" id="image">
          </div>
          <br>
          <div class="row">
              <button class="btn btn-primary">Add Image</button>
          </div>
        </div>
		</div>
    </form>
</div>
@endsection
