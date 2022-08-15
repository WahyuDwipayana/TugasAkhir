<?php

namespace App\Http\Controllers;

use App\Models\Jam;
use Illuminate\Http\Request;

class JamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jam = Jam::all();
        return view('admin.jam', ['jam' => $jam]);
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
            'jam'=>'required'
        ]);

        Jam::create([
            'jam'=> $request->jam,
        ]);
        return redirect('dashboard/jam')->with('sukses', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jam  $jam
     * @return \Illuminate\Http\Response
     */
    public function show(Jam $jam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jam  $jam
     * @return \Illuminate\Http\Response
     */
    public function edit(Jam $jam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jam  $jam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jam = Jam::find($id);
        // $menu->update($request->all());
        
        $request->validate([
            'jam'     =>  'required',
        ]);
        
        $jam->update([
            'jam' => $request ->jam,
        ]);
        return redirect('dashboard/jam')->with('update', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jam  $jam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jam $jam)
    {
        Jam::destroy($jam->id);
        return redirect('dashboard/jam')->with('delete', 'Data menu berhasil dihapus');
    }
}
