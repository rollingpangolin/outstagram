<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Post;

class PostsController extends Controller
{
    function __construct() 
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');
        
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);
        
        return view('posts.index', compact('posts'));
    }
    
    function create()
    {
        return view('posts.create');
    }
    
    function store()
    {
        $data = request()->validate([
            'url' => '',
            'caption' => 'required',
            'image' => ['required', 'image']
        ]);
        
        $imagePath = request('image')->store('uploads', 'public');
        
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();
        
        $data['image'] = $imagePath;
        
        auth()->user()->posts()->create($data);
        //\App\Models\Post::create($data);
        return redirect('/profile/'.auth()->user()->id);
    }
    
    public function show(\App\Models\Post $post)
    {
        return view("posts.show", compact('post'));
    }
}
