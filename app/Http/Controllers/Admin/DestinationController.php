<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;
use App\Http\Requests\DestinationRequest;
use DB;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destination = Destination::orderBy('id','ASC')->get();
        if(request('key')){
            $key = request('key');
            $destination = DB::table('destinations')->where('name', 'LIKE', '%'.$key.'%');
        }
        return view('admin.destination.index',compact('destination'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.destination.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DestinationRequest $request)
    {
        $img = str_replace(url('public/images/uploads').'/', '', $request->image);
        $request->merge(['image' => $img]);
        
        // dd($request->all());
        Destination::create($request->all());
        return redirect()->route('admin.destination.index')->with('status-success','The Destination had been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function show(Destination $destination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dest = Destination::find($id);
   
        return view('admin.destination.edit',compact('dest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Destination $destination)
    {
        $img = str_replace(url('public/images/uploads').'/', '', $request->image);
        $request->merge(['image' => $img]);

        $destination->update($request->all());
        return redirect()->route('admin.destination.index')->with('status-success','The Destination had been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Destination $destination)
    {
        $destination->delete();
        return redirect()->route('admin.destination.index')->with('status-danger','The destination had been deleted');
    }
}
