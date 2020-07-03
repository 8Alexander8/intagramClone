@extends('layouts.app')

@section('content')

<div class="container" style="max-width: 935px;">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{$post->image}}" alt="" class="w-100">
        </div>
        <div class="col-4">
<div class="d-flex align-items-center mt-2 flex-wrap">
    
    <div class="pr-2">
        <img class="w-100 rounded-circle" src="{{$post->user->profile->profileImage()}}" alt="profile image" style="max-width: 50px;">
       
    </div>
    <div class="pr-2">
    <h4>
        <a style="text-decoration: none;" class="text-dark" href="/profile/{{$post->user->profile->id}}">{{$post->user->username}}</a>
     </h4>

    </div>
    <span class="pb-2 pr-2">&#9679</span>

    <div>
         
        <h5>
            <a href="">Follow</a>
        </h5>
    </div>
  
   
   
</div>
<hr>
<div class="pt-2 d-flex flex-wrap">
   <span class="font-weight-bold pr-1"><a style="text-decoration: none;" class="text-dark" href="/profile/{{$post->user->profile->id}}">{{$post->user->username}}</a></span> &#9679 <p class="pl-1">{{$post->caption}}</p>
</div>


  
        </div>
    </div>

</div>
@endsection