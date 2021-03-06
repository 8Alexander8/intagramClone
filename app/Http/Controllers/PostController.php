<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{



    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $user = auth()->user();

        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);

        return view('posts.index', compact('posts', 'user'));
    }
    public function show(\App\Post $post)
    {

        return view('posts.show', compact('post'));
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store()
    {

        $data = request()->validate([
            'another' => '',
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);
        $imagePath =  request('image')->store('uploads', 'public');
        $img = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $img->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' =>  $imagePath
        ]);
        return redirect('/profile/' . auth()->user()->id);
    }
}
