<?php

namespace App\Http\Controllers;

use App\kejuruan;
use Illuminate\Http\Request;

class KejuruanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        //
        $kejuruan = kejuruan::all();
        return view('kejuruan.index', compact('kejuruan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kejuruan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kejuruan=new kejuruan;
        $kejuruan->tgl=$request->a;
        $kejuruan->judul=$request->b;
        $kejuruan->konten = $request->c;
        if($request->hasfile('cover')){
            $kejuruans=$request->file('cover');
            $extension=$kejuruans->getClientOriginalExtension();
            $filename=str_random(6). '.' .$extension;
            $destinationPath=public_path() .
            DIRECTORY_SEPARATOR . 'img';
            $kejuruans->move($destinationPath ,$filename);
            $kejuruan->cover=$filename;
        }
        $kejuruan->save();
        return redirect()->route('kejuruan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kejuruan  $kejuruan
     * @return \Illuminate\Http\Response
     */
    public function show(kejuruan $kejuruan)
    {
        $kejuruan =  kejuruan::findOrFail($id);
        return view('kejuruan.show', compact('kejuruan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kejuruan  $kejuruan
     * @return \Illuminate\Http\Response
     */
    public function edit(kejuruan $kejuruan)
    {
        $kejuruan = kejuruan::findOrFail($id);
        return view('kejuruan.edit', compact('kejuruan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kejuruan  $kejuruan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kejuruan $kejuruan)
    {
        $kejuruan->tgl=$request->a;
        $kejuruan->judul=$request->b;
        $kejuruan->konten = $request->c;
        if($request->hasfile('cover')){
            $kejuruans=$request->file('cover');
            $extension=$kejuruans->getClientOriginalExtension();
            $filename=str_random(6). '.' .$extension;
            $destinationPath=public_path() .
            DIRECTORY_SEPARATOR . 'img';
            $kejuruans->move($destinationPath ,$filename);
            $kejuruan->cover=$filename;
        }
        $kejuruan->save();
        return redirect()->route('kejuruan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kejuruan  $kejuruan
     * @return \Illuminate\Http\Response
     */
    public function destroy(kejuruan $kejuruan)
    {
        $kejuruan = kejuruan::findOrFail($id);
        $kejuruan ->delete();
        return redirect()->route('kejuruan.index');
    }
}
