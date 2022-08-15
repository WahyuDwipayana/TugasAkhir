<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meja = Meja::all();
        // $meja = Meja::with(['waktus'])->get();
        return view('admin.meja', ['meja' => $meja]);
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
        $validatedData = $request->validate([
            'no_meja'     =>  'required',
            'gambar_meja'   =>  'required|file|image|max:5120|mimes:jpg,png,jpeg'
        ]);

        if($request->file('gambar_meja')){
            $validatedData = $request->file('gambar_meja')->store('meja');
        }
        
        Meja::create([
            'no_meja'     => $request ->no_meja,
            'gambar_meja'   => $validatedData,
        ]);
        return redirect('dashboard/meja')->with('sukses', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meja  $meja
     * @return \Illuminate\Http\Response
     */
    public function show(Meja $meja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meja  $meja
     * @return \Illuminate\Http\Response
     */
    public function edit(Meja $meja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meja  $meja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $meja = Meja::find($id);
        // $menu->update($request->all());
        
        $validatedData = $request->validate([
            'no_meja'     =>  'required',
            'gambar_meja'   =>  'file|image|max:5120|mimes:jpg,png,jpeg'
        ]);
        
        if($request->file('gambar_meja')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData = $request->file('gambar_meja')->store('meja');
        }
        
        $meja->update([
            'no_meja' => $request ->no_meja,
            'gambar_meja' => $validatedData
        ]);
        return redirect('dashboard/meja')->with('update', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meja  $meja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meja $meja)
    {
        if($meja->gambar_meja){
            Storage::delete($meja->gambar_menu);
        }
        
        Meja::destroy($meja->id);
        return redirect('dashboard/meja')->with('delete', 'Data menu berhasil dihapus');
    }
}
