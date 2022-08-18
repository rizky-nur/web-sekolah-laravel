<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\guru;
use Illuminate\Support\Facades\Storage;

class dashboardguruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.guru.index',[
            'title' => 'Daftar guru',
            'gurus' => guru::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.guru.Create',[
            'title' => 'Add guru'
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
            'name' => ['required','max:255'],
            'image' => 'required|image|max:1024',
            'gender' => ['required','max:255']
        ]);

        $validate['image'] = $request->file('image')->store('guru');
        guru::create($validate);

        return redirect('/dashboard/guru')->with('success', 'Data has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guru = guru::where('id', $id)->get();
        return view('dashboard.guru.show',[
            'title' => 'Detail guru',
            'gurus' => $guru,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.guru.edit',[
            'title' => 'Edit Data',
            'guru' => guru::find($id)
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
        $rules = [
            'name' => ['required','max:255'],
            'gender' => ['required','max:255']
        ];

        $validate = $request->validate($rules);
        if($request->file("image"))
        {
            if($request->oldimage)
            {
                Storage::delete($request->oldimage);
            }
            $validate['image'] = $request->file('image')->store('guru');
        }

        guru::where('id', $id)->update($validate);

        return redirect('/dashboard/guru')->with('success', 'Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        guru::where('id', $req->id)->delete();
        if($req->oldimage)
        {
            Storage::delete($req->oldimage);
        }
        return redirect('/dashboard/guru')->with('success', 'Data has been deleted');
    }
}