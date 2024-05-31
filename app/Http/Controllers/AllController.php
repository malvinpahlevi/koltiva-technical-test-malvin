<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AllController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware(['auth', 'verified']);
//    }
    /**
     * Write Your Code..
     *
     * @return string
     */
    public function index()
    {
        $posts = Post::get();


        return view('post.index',compact('posts'));

    }

    /**
     * Write Your Code..
     *
     * @return string
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Write Your Code..
     *
     * @return string
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        Post::create($input);

        return redirect()->route('posts.index');
    }

    /**
     * Write Your Code..
     *
     * @return string
     */
    public function show($id)
    {

        $post = Post::find($id);

        return view('post.show',compact('post'));
    }
}
