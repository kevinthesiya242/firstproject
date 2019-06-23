<?php

namespace App\Http\Controllers;
use Validator;
use App\Category;
use Session;

use Illuminate\Http\Request;

class categoryController extends Controller
{
   	public function index(){
   		return view('category.index');
   	}

   	public function create(){
   		return view('category.create');
   	}

   	public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:10|min:3',
        ]);

        if ($validator->fails()) {
        	session::flash('coc','Category not created.');
            return redirect('category/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Store the blog post...
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        session::flash('cc','category is created');
        return redirect('category/create');
    }

    public function show(){
    	$categories = Category::all();
    	return view('category.show', compact('categories'));
    }

    public function edit($id){
    	$category = Category::find($id);
    	return view('category.edit', compact('category'));

    }

    public function update(Request $request, $id){
    	$validator = Validator::make($request->all(), [
            'name' => 'required|max:10|min:3',
        ]);

        if ($validator->fails()) {
        	session::flash('coc','Category not created.');
            return redirect('category/create')
                        ->withErrors($validator)
                        ->withInput();
        }
    	$category = Category::find($id);
    	$category->name = $request->name;
    	$category->save();
    	return redirect('category/show')->with('cc','Category has been updated.');
    }

    public function destroy($id){
    	$category = Category::find($id);
    	$category->delete();
    	return redirect('category/show')->with('dc','Category has been deleted.');
    }
}
