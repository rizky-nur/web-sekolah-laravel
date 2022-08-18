<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\sejarah;
use Illuminate\Support\Facades\Storage;

class DashboardSejarahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.Sejarah.index',[
            'title' => 'Sejarah/History',
            'sejarahs' => sejarah::all()
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
        return view('dashboard.Sejarah.show',[
            'title' => 'Sejarah/History',
            'sejarah' => sejarah::find($id)
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
        return view('dashboard.Sejarah.edit',[
            'title' => 'Edit History',
            'sejarah' => sejarah::find($id)
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
            'body' => ["required"],
        ];

        $validate = $request->validate($rules);
        {
            if($request->oldimage)
            {
                Storage::delete($request->oldimage);
            }
        }
        
        sejarah::where('id', $id)->update($validate);

        return redirect('/dashboard/sejarah')->with('success', 'Post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}