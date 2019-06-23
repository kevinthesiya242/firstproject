<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Posts;
use Validator;
use Session;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('post/create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:40|min:3',
            'author' => 'required|max:10|min:3',
            'image' => 'required|mimes:jpeg,jpg,png,gif',
            'category_id' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            session::flash('coc','Post not created.');
            return redirect('post/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        $image = $request->file('image');
        $upload = 'img/';
        $filename = time().$image->getClientOriginalName();
        $path = move_uploaded_file($image->getPathName(), $upload.$filename);
        $post = new Posts;
        $post->title = $request->title;
        $post->author = $request->author;
        $post->category_id = $request->category_id;
        $post->image = $filename;
        $post->description = $request->description;
        $post->save();
        session::flash('cc','post is created');
        return redirect('post/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Posts::all();
        return view('post.show', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posts::find($id);
        $categories = Category::all();
        return view('post.edit', compact('post'))
                ->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:40|min:3',
            'author' => 'required|max:10|min:3',
            'image' => 'required|mimes:jpeg,jpg,png,gif',
            'category_id' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            session::flash('coc','Post has not been updated.');
            return redirect('post/show')
                        ->withErrors($validator)
                        ->withInput();
        }
        $image = $request->file('image');
        $upload = 'img/';
        $filename = time().$image->getClientOriginalName();
        $path = move_uploaded_file($image->getPathName(), $upload.$filename);
        $post = Posts::find($id);
        $post->title = $request->title;
        $post->author = $request->author;
        $post->category_id = $request->category_id;
        $post->image = $filename;
        $post->description = $request->description;
        $post->save();
        session::flash('cc','post has been updated');
        return redirect('post/show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::find($id);
        $post->delete();
        return redirect('post/show')->with('dc','Post has been deleted.');
    }
}
