<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;

class PostViewController extends Controller
{
   	public function index()
   	{
   		$posts = new Posts();
   		return view('postview.index', compact('posts'));
   	}

   	public function fullpost($id)
   	{
   		$post = Posts::find($id);
   		return view('postview.fullpost', compact('post'));
   	}
}
