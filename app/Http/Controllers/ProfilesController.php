<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {


        //Cache the profile data
        $postCount = Cache::remember('count.post' . $user->id, now()->addSeconds(30), function () use ($user) {
            $user->posts->count();
        });
        $followersCount = Cache::remember('count.followers' . $user->id, now()->addSeconds(30), function () use ($user) {
            $user->profile->followers->count();
        });
        $followingCount = Cache::remember('count.following' . $user->id, now()->addSeconds(30), function () use ($user) {
            $user->following->count();
        });

        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        return view('profiles.index', compact('user', 'follows', 'postCount', 'followersCount', 'followingCount'));
    }
    public function profilesList()
    {
        $profiles = Profile::all();
        return view('profiles.list', compact('profiles'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'nullable|url',
            'image' => '',
        ]);
        if (request('image')) {
            $imagePath =  request('image')->store('profile', 'public');
            $img = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $img->save();
            $data = array_merge(
                $data,
                ['image' => $imagePath]
            );
        }



        auth()->user()->profile->update($data);


        return redirect("/profile/{$user->id}");
    }
}
