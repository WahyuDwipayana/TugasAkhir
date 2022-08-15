<?php

namespace App\Http\Controllers;

use App\Models\Hari;
use Illuminate\Http\Request;

class HariController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $haris = Hari::all();
        return view('admin.hari', ['haris' => $haris]);
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
        $request->validate([
            'nama_hari'     =>  'required'
        ]);

        Hari::create([
            'nama_hari'     => $request ->nama_hari,
        ]);
        return redirect('dashboard/hari')->with('sukses', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hari  $hari
     * @return \Illuminate\Http\Response
     */
    public function show(Hari $hari)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hari  $hari
     * @return \Illuminate\Http\Response
     */
    public function edit(Hari $hari)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hari  $hari
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $haris = Hari::find($id);
        // $menu->update($request->all());
        
        $request->validate([
            'nama_hari'     =>  'required',
        ]);
        
        $haris->update([
            'nama_hari' => $request->nama_hari,
        ]);
        return redirect('dashboard/hari')->with('update', 'Data berhasil diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hari  $hari
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hari $hari)
    {
        Hari::destroy($hari->id);
        return redirect('dashboard/hari')->with('delete', 'Data menu berhasil dihapus');
    }
}
