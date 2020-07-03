@extends('layouts.app')

@section('content')

<div class="container" style="max-width: 935px;">
    <div class="card-body">
    <form method="POST" action="/profile/{{$user->id}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group row">
                <div class="col-8"><h1 class="text-center">Edit Profile</h1></div>
                
               
                
            </div>
            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('title') }}</label>

                <div class="col-md-6">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $user->profile->title }}"  autocomplete="title" autofocus>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('description') }}</label>

                <div class="col-md-6">
                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $user->profile->description }}"  autocomplete="description" autofocus>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            
            <div class="form-group row">
                <label for="url" class="col-md-4 col-form-label text-md-right">{{ __('URL') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ $user->profile->url }}"  autocomplete="url" autofocus>

                    @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                <div class="col-md-6">
                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image">

                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Save Changes
                    </button>
                </div>
            </div>
        </form>
    </div>

</div>
@endsection