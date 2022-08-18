<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\siswa;
use \App\Models\jurusan;
use Illuminate\Support\Facades\Storage;

class dashboardsiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.siswa.index',[
            'title' => 'Daftar siswa',
            'siswas' => siswa::search(request(['search']))->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.siswa.Create',[
            'title' => 'Add siswa',
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
            'name' => ['required','max:255'],
            'jurusan_id' => ['required'],
            'image' => 'required|image|max:1024',
            'gender' => ['required','max:255']
        ]);

        $validate['image'] = $request->file('image')->store('siswa');
        siswa::create($validate);

        return redirect('/dashboard/siswa')->with('success', 'Data has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = siswa::where('id', $id)->get();
        return view('dashboard.siswa.show',[
            'title' => 'Detail siswa',
            'siswas' => $siswa,
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
        return view('dashboard.siswa.edit',[
            'title' => 'Edit Data',
            'siswa' => siswa::find($id)
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
            'jurusan_id' => ['required'],
            'gender' => ['required','max:255']
        ];

        $validate = $request->validate($rules);
        if($request->file("image"))
        {
            if($request->oldimage)
            {
                Storage::delete($request->oldimage);
            }
            $validate['image'] = $request->file('image')->store('siswa');
        }

        siswa::where('id', $id)->update($validate);

        return redirect('/dashboard/siswa')->with('success', 'Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        siswa::where('id', $req->id)->delete();
        if($req->oldimage)
        {
            Storage::delete($req->oldimage);
        }
        return redirect('/dashboard/siswa')->with('success', 'Data has been deleted');
    }
}