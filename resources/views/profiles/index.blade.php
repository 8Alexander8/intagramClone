@extends('layouts.app')

@section('content')

<div class="container" style="max-width: 935px;">
 <div class="row">
    <div class="col-3 p-5"><img src="{{$user->profile->profileImage()}}" alt="logo" class="innerimg" style="border-radius: 50%;"></div>
        <div  class="col-9 pt-5 innerdiv">
         <div class="d-inline-flex">
            <h1>{{$user->username}}</h1>

         
            <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
            @can('update', $user->profile)
            
            <a title="Edit Profile" class="align-self-center ml-3" href="/profile/{{$user->id}}/edit"><i class="fas fa-cog" style="font-size: 20px; color: rgb(63, 63, 63)"></i></a>
            @endcan
         
         </div>
         
            <div class="d-flex">
            <div class="pr-5"><strong>{{$postCount}}</strong>  Posts</div>
            <div class="pr-5"><strong>{{$followersCount}}</strong>  followers</div>
            <div class="pr-5"><strong>{{$user->following->count()}}</strong>  following</div>
            </div>
            @can('update', $user->profile)
            <a  href="/p/create"  class="btn btn-sm btn-success align-self-center mt-1" style="color: rgb(255, 255, 255)">Add Post</a>
            @endcan
        <div class="pt-3"><strong>{{$user->profile->title}}</strong> </div>
        <div>{{$user->profile->description}}</div>
            <div><a href="#">{{$user->profile->url ?? 'N/A'}}</a></div>
        </div>
       
    </div>
    <div class="row">
        @foreach ($user->posts as $post)
            
        
         <div class="col-4 pb-4">
         <a href="/p/{{$post->id}}">
                <img src="/storage/{{$post->image}}" alt="" class="w-100">
             </a>
            
            </div>
        @endforeach
    </div>
</div>
@endsection
