<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\ppdb;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class dashboardppdbcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.ppdb.index',[
            'title' => 'ppdb Admin',
            'ppdb' => ppdb::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.ppdb.create',[
            'title' => 'ppdb Admin',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => ['required','max:255'],
            'image' => 'required|image|max:1024',
        ]);

        $validate['image'] = $request->file('image')->store('ppdb');
        ppdb::create($validate);

        return redirect('/dashboard/ppdb')->with('success', 'New post has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ppdb = ppdb::where('id', $id)->get();
        return view('dashboard.ppdb.edit',[
            'title' => 'Edit Post',
            'ppdb' => $ppdb
        ]);
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
        $rules =[
            'title' => ['required','max:255'],
        ];

        $validate = $request->validate($rules);
        if($request->file("image"))
        {
            if($request->oldimage)
            {
                Storage::delete($request->oldimage);
            }
            $validate['image'] = $request->file('image')->store('ppdb');
        }
        ppdb::where('id', $request->id)->update($validate);

        return redirect('/dashboard/ppdb')->with('success', 'Post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        ppdb::where('id', $req->id)->delete();
        if($req->oldimage)
        {
            Storage::delete($req->oldimage);
        }

        return redirect('/dashboard/ppdb')->with('success', 'Post has been deleted');
    }
}