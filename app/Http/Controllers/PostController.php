<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('admin.post.list', ['postList' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:100',
            'content' => 'required|string',
        ]);
        $data['publish_date'] = now();
        $data['user_id'] = Auth::user()->id;


        /* 
        recuperation du fichier
        */

        if ($request->hasFile('photo')) {
            $fileName = $request->file('photo')->getClientOriginalName();
            $path = 'storage/' . $request->file('photo')->storeAs('images', $fileName, 'public');
            $data['photo'] = $path;
        }

        $post = Post::create($data);


        if (isset($post)) {
            return redirect()->route('posts.index')->with('success', 'Post created successfully');
        }
        return redirect()->back()->with('error', 'Error in Post Creation')->withInput();

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $data = $request->validate([
            'title' => 'required|string|max:100',
            'content' => 'required|string',
        ]);


        $post->title = $request->title;
        $post->content = $request->content;
        $post->published = $request->published == null ? false : true;


        if ($post->published) {
            $post->publish_date = now();
        } else {
            $post->publish_date = null;
        }

        /* 
        recuperation du fichier
        */

        if ($request->hasFile('photo')) {
            $fileName = $request->file('photo')->getClientOriginalName();
            $path = 'storage/' . $request->file('photo')->storeAs('images', $fileName, 'public');
            $post->photo = $path;
        }
        $post->user_id = Auth::user()->id;
        // dd($post);

        if ($post->save()) {
            return redirect()->route('posts.index')->with('success', 'Post Updated successfully');
        }
        return redirect()->back()->with('error', 'Error in Post Updating')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->with('success', "Post Deleted");

    }
}