<?php

namespace App\Http\Controllers;

use App\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 
use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/post');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts|max:255|min:6',
            'author' => 'required',
            'description' => 'required',
        ]);
        $post = new Post;
        $post->title = $request->title;
        $post->author = $request->author;
        $post->description = $request->description;
        $post->save();

        return Redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findorfail($id);

        return view('editpost', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
        ]);
        $post = Post::findorfail($id);
        $post->title = $request->title;
        $post->author = $request->author;
        $post->description = $request->description;
        $update = $post->save();

        return Redirect::to('/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findorfail($id);
        $post->delete();
        // DB::table('posts')
        //         ->where('id',$id)
        //         ->delete();
        return Redirect()->back();
    }
}
