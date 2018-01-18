<?php

namespace App\Http\Controllers;

use App\artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $artikel = artikel::all();
        return view('artikel.index', compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $artikel=new artikel;
        $artikel->tgl=$request->a;
        $artikel->judul=$request->b;
        $artikel->konten = $request->c;
        if($request->hasfile('cover')){
            $artikels=$request->file('cover');
            $extension=$artikels->getClientOriginalExtension();
            $filename=str_random(6). '.' .$extension;
            $destinationPath=public_path() .
            DIRECTORY_SEPARATOR . 'img';
            $artikels->move($destinationPath ,$filename);
            $artikel->cover=$filename;
        }
        $artikel->save();
        return redirect()->route('artikel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $artikel =  artikel::findOrFail($id);
        return view('artikel.show', compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $artikel = artikel::findOrFail($id);
        return view('artikel.edit', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $artikel->tgl=$request->a;
        $artikel->judul=$request->b;
        $artikel->konten = $request->c;
        if($request->hasfile('cover')){
            $artikels=$request->file('cover');
            $extension=$artikels->getClientOriginalExtension();
            $filename=str_random(6). '.' .$extension;
            $destinationPath=public_path() .
            DIRECTORY_SEPARATOR . 'img';
            $artikels->move($destinationPath ,$filename);
            $artikel->cover=$filename;
        }
        $artikel->save();
        return redirect()->route('artikel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(artikel $artikel)
    {
        $artikel = artikel::findOrFail($id);
        $artikel ->delete();
        return redirect()->route('artikel.index');
    }
}
