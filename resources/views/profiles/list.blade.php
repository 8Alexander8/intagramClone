@extends('layouts.app')

@section('content')


<div class="container" style="max-width: 935px;">
    @foreach($profiles as $profile)
    @if($profile->image)
 <div class="row">
        <div class="col-4">
            <img src="/storage/{{$profile->image}}" alt="" class="w-100" style="border-radius: 50%; max-width: 100px;">
        </div>
        <div class="col-4">
            <div class="pr-2 d-flex align-item-center">
                <h4>
                   <a style="text-decoration: none;" class="btn btn-success" href="/profile/{{$profile->id}}">Profile</a>
                </h4>
                <span class="pb-2 pl-2 d-block align-content-center">&#9679</span>
                <div class="pl-2">
                    <h4>{{$profile->user->username}}</h4>
                </div>
                </div>
            

        </div>
       
   
 </div>
 <hr>
 @endif
      @endforeach
</div>


@endsection