@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')
        <div class="row">
        <div class="col-8 offset-2">
            <div class="row">
                <h1>Edit Profile</h1>
            </div>
            <div class="row">
                <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $user->profile->title }}" required autocomplete="title" autofocus>

                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="row">
                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                <input type="text" class="form-control-file" id="description" name="description" value="{{ old('description') ?? $user->profile->description }}">
                @error('description')
                        <strong>{{ $message }}</strong>
                @enderror
            </div>
            
            <div class="row">
                <label for="url" class="col-md-4 col-form-label text-md-right">URL</label>
                <input type="text" class="form-control-file" id="url" name="url" value="{{ old('url') ?? $user->profile->url }}">
                @error('url')
                        <strong>{{ $message }}</strong>
                @enderror
            </div>
            
            <div class="row">
                <label for="image" class="col-md-4 col-form-label text-md-right">Profile Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
                @error('image')
                        <strong>{{ $message }}</strong>
                @enderror
            </div>
            
            <div class="row pt-4">
                <button class="btn btn-primary">
                    Save Profile
                </button>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection
