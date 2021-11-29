<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::paginate(5);
        return view('home', ['posts'=>$posts]);
    }

    public function store(Request $request)
    {
        $post = new Post();

        $post->user_id = auth()->user()->id;
        $post->judul = $request->judul;
        $post->deskripsi = $request->deskripsi;
        $post->save();

        return redirect()->to('/home');
    }
}
