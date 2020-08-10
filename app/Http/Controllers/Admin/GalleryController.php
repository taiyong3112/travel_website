<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Destination;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery::orderBy('id','DESC')->paginate(5);
        $destination = Destination::all();
        return view('admin.gallery.index',compact('gallery','destination'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $destination = Destination::orderBy('name','ASC')->get();
        return view('admin.gallery.create',compact('destination'));
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

        Gallery::create($request->all());
        return redirect()->route('admin.gallery.index')->with('status-success','The Gallery had been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
     public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit',compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, Gallery $gallery)
    {
        $img = str_replace(url('public/images/uploads').'/', '', $request->image);
        $request->merge(['image' => $img]);

        $gallery->update($request->all());
        return redirect()->route('admin.gallery.index')->with('status-success','The Gallery had been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(gallery $gallery)
    {
        $gallery->delete();
        return redirect()->route('admin.gallery.index')->with('status-danger','The Gallery had been deleted');
    }}
