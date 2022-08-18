<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sambutan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SambutanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.sambutan.index',[
            'title' => 'Artikel | sambutan',
            'sambutans' => sambutan::all()
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
    public function show($slug)
    {
        $sambutan = sambutan::where('slug', $slug)->get();
        return view('dashboard.sambutan.show',[
            'title' => 'Detail sambutan',
            'sambutans' => $sambutan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $sambutan = sambutan::where('slug', $slug)->get();
        return view('dashboard.sambutan.edit',[
            'title' => 'Edit sambutan',
            'sambutans' => $sambutan
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
            'image' => 'required|image|max:1024',
            'description' => ["required"],
        ];

        if($request->slug != $slug)
        {
            $rules['slug'] = ['required','unique:sambutans'];
        }

        $validate = $request->validate($rules);
        $validate['excerp'] = Str::limit(strip_tags($request->description),100);
        if($request->file("image"))
        {
            if($request->oldimage)
            {
                Storage::delete($request->oldimage);
            }
            $validate['image'] = $request->file('image')->store('berita');
        }
        sambutan::where('id', $request->id)->update($validate);

        return redirect('/dashboard/sambutan')->with('success', 'Post has been updated');

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