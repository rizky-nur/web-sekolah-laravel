<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\profile;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class dashboardprofilcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = DB::table('profiles')
                ->orderBy('id', 'desc')
                ->get();
        return view('dashboard.profile.index',[
            'title' => 'profile',
            'profiles' => $profiles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.profile.create',[
            'title' => 'Create profile',
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
            'title' => ['required', 'max:255'],
            'slug' => ['required', 'unique:profiles'],
            'image' => 'required|image|max:1024',
            'description' => ["required"],
        ]);

        $validate['image'] = $request->file('image')->store('news');
        profile::create($validate);

        return redirect('/dashboard/profile/')->with('success', 'New post has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = profile::where('id', $id)->get();
        return view('dashboard.profile.show',[
            'title' => 'Detail Profile',
            'profiles' => $profile,
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
        $profile = profile::where('id', $id)->get();
        return view('dashboard.Profile.edit',[
            'title' =>'Edit Profile',
            'profiles' => $profile
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
        ];

        if($request->slug != $slug)
        {
            $rules['slug'] = ['required','unique:profiles'];
        }
        
        $validate = $request->validate($rules);
        if($request->file("image"))
        {
            if($request->oldimage)
            {
                Storage::delete($request->oldimage);
            }
            $validate['image'] = $request->file('image')->store('profile');
        }
        profile::where('id', $request->id)->update($validate);

        return redirect('/dashboard/profile')->with('success', 'Post has been updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        profile::where('id', $req->id)->delete();
        if($req->oldimage)
        {
            Storage::delete($req->oldimage);
        }

        return redirect('/dashboard/profile')->with('success', 'Post has been deleted');
    }

}
