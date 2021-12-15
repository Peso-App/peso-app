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
        $posts = Post::where('aktif', 1)->paginate(6);
        return view('home', ['posts'=>$posts]);
    }

    public function store(Request $request)
    {
        $post = new Post();

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        $post->user_id = auth()->user()->id;
        $post->judul = $request->judul;
        $post->deskripsi = $request->deskripsi;
        $post->aktif = 1;
        $post->save();

        return redirect()->to('/home');
    }

    public function create()
    {
        return view('create');
    }
}
