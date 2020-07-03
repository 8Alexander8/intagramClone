@extends('layouts.app')

@section('content')

<div class="container" style="max-width: 935px;">
    <div class="row">
        <div class="col-8 offset-2 shadow">
            <form method="POST" action="/p" class="p-2" enctype="multipart/form-data">
                @csrf
                <div class="form-group-row text-center">
                  <h1>Add New Post</h1>
                </div>
                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label">Post Caption</label>       
                    <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}"  autocomplete="caption" autofocus>
        
                        @error('caption')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group-row">
                    
                        <label for="image" class="col-md-4 col-form-label">Upload Image</label>
                        <input type="file" name="image" id="image">
                        @error('image')
                           <div>
                            <strong>{{ $message }}</strong>
                           </div>
                         @enderror
                  
                </div>
                <div class="form-group-row text-center pt-5">
                    
                    
                    <input class="btn btn-primary" type="submit" value="Add Post">
              
            </div>
            </form>
        </div>
    </div>
    
</div>
@endsection