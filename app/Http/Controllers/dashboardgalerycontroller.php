<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\galery;
use \App\Models\jurusan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class dashboardgalerycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.galery.index',[
            'title' => 'Galery Admin',
            'photos' => galery::paginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.galery.create',[
            'title' => 'Galery Admin',
            'jurusans' => jurusan::all()
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

        $validate['image'] = $request->file('image')->store('galery');
        galery::create($validate);

        return redirect('/dashboard/galery')->with('success', 'New post has been added');
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
        $photo = galery::where('id', $id)->get();
        return view('dashboard.galery.edit',[
            'title' => 'Edit Post',
            'jurusans' => jurusan::all(),
            'photos' => $photo
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
            'image' => 'required|image|max:1024',
            'jurusan_id' => ['required']
        ];

        $validate = $request->validate($rules);
        if($request->file("image"))
        {
            if($request->oldimage)
            {
                Storage::delete($request->oldimage);
            }
            $validate['image'] = $request->file('image')->store('berita');
        }
        galery::where('id', $request->id)->update($validate);

        return redirect('/dashboard/galery')->with('success', 'Post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        galery::where('id', $req->id)->delete();
        if($req->oldimage)
        {
            Storage::delete($req->oldimage);
        }

        return redirect('/dashboard/galery')->with('success', 'Post has been deleted');
    }
}