<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\pengumuman;
use Illuminate\Support\Facades\Storage;

class dashboardpengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pengumuman.index',[
            'title' => 'pengumuman',
            'pengumumans' => pengumuman::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dashboard.pengumuman.show',[
            'title' => 'Detail pengumuman',
            'pengumuman' => pengumuman::find($id)
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
        return view('dashboard.pengumuman.edit',[
            'title' => 'Edit Detail pengumuman',
            'pengumuman' => pengumuman::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $rules =[
            'title' => ['required','max:255'],
            'excrept' =>['required'],
            'description' => ["required"],
        ];
        
        if($request->slug != $slug)
        {
            $rules['slug'] = ['required','unique:pengumumen'];
        }

        $validate = $request->validate($rules);

        
        pengumuman::where('id', $request->id)->update($validate);

        return redirect('/dashboard/pengumuman')->with('success', 'Post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        pengumuman::where('id', $id)->delete();

        return redirect('/dashboard/pengumuman')->with('success', 'Post has been deleted');
    }
}