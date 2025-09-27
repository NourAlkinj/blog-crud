<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;

use App\Models\Blog;


class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('title')->get();;
        return view('index', compact('blogs'));
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('show', compact('blog'));
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect()->route('index')->with('success', 'Blog deleted successfully');
    }

    public function create()
    {
        return view('create');
    }

    public function store(BlogStoreRequest $request)
    {   
        $blog=$request->validated();
        if ($photo = $request->file('photo')) {
            $destinationPath = 'images/';
            $profilePhoto = date('YmdHis') . "." . $photo->getClientOriginalExtension();
            $photo->move($destinationPath, $profilePhoto);
            $blog['photo'] = "$profilePhoto";
        }
        Blog::create($blog);
        return redirect()->route('index')->with('success', 'Blog created successfully.');
}

public function edit($id)
{
    $blog = Blog::findOrFail($id);
    return view('edit', compact('blog'));
}

public function update(BlogUpdateRequest $request, Blog $blog)
{
    $data = $request->validated();
   if ($photo = $request->file('photo')) {
            $destinationPath = 'images/';
            $profilePhoto = date('YmdHis') . "." . $photo->getClientOriginalExtension();
            $photo->move($destinationPath, $profilePhoto);
            $data['photo'] = "$profilePhoto";
        }

    $blog->update($data);
        
    return redirect()->route('index')->with('success', 'Blog updated successfully');
}
  
   
}


