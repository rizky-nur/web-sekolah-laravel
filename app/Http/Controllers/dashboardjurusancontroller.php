<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\jurusan;

class DashboardJurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.jurusan.index',[
            'title' => 'Daftar Jurusan',
            'jurusans' => jurusan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.jurusan.create',[
            'title' => 'Daftar Jurusan',
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
            'jurusan_name' => ['required','max:255','unique:jurusans'],
            'rombel' => ['required'],
            'jml_siswa' => ['required'],
        ]);

        jurusan::create($validate);

        return redirect('/dashboard/jurusan')->with('success', 'New post has been added');
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
        $jurusan = jurusan::where('jurusan_name', $id)->get();
        return view('dashboard.jurusan.edit',[
            'title' => 'Edit Post',
            'jurusans' => $jurusan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $name)
    {
        $rules =[
            'rombel' => ['required'],
            'jml_siswa' => ['required'],
        ];

        if($request->jurusan_name != $name)
        {
            $rules['jurusan_name'] = ['required','max:255','unique:jurusans'];
        }
        
        $validate = $request->validate($rules);

        jurusan::where('id', $request->id)->update($validate);

        return redirect('/dashboard/jurusan')->with('success', 'Post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        jurusan::where('id', $id)->delete();

        return redirect('/dashboard/jurusan')->with('success', 'Post has been deleted');
    }
}