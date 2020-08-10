<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Destination;
use App\Models\Tag;
use Illuminate\Http\Request;
use DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::paginate(5);
        if(request('key')){
            $key = request('key');
            $blog = DB::table('blogs')->where('name', 'LIKE', '%'.$key.'%')->paginate(5);
        }
        return view('admin.blog.index',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $destination = Destination::orderBy('id','ASC')->get();
        $tag = Tag::orderBy('name','ASC')->get();
        return view('admin.blog.create',compact('destination','tag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $img = str_replace(url('public/images/uploads').'/', '', $request->image);
        $request->merge(['image' => $img]);

        $blog = new Blog;
        $blog->name = $request->name;
        $blog->slug = $request->slug;
        $blog->destination_id = $request->destination_id;
        $blog->image = $request->image;
        $blog->content = $request->content;
        $blog->status = $request->status;

        $blog->save();

        $blog->tags()->attach($request->tag);
        return redirect()->route('admin.blog.index')->with('status-success','The Blog had been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $destination = Destination::orderBy('id','ASC')->get();
        $tag = Tag::orderBy('name','ASC')->get();
        return view('admin.blog.edit',compact('blog','destination','tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $img = str_replace(url('public/images/uploads').'/', '', $request->image);
        $request->merge(['image' => $img]);

        $blog->update($request->all());
        $blog->save();

        $blog->tags()->detach($request->id);
        $blog->tags()->attach($request->tag);
        return redirect()->route('admin.blog.index')->with('status-success','The Blog had been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        $blog->tags()->detach($request->id);
        return redirect()->route('admin.blog.index')->with('status-danger','The blog had been deleted');
    }
}