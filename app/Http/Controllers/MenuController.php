<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        $menu = Menu::all();
        return view('admin.menu', ['menu' => $menu, 'category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $tambahmenu = DB::table('menu')->get();
        // return view('admin.tambahmenu', ['menu', $tambahmenu]);
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
            'nama_menu'     =>  'required',
            'id_kategori'   =>  'required',
            'harga_menu'    =>  'required',
            'gambar_menu'   =>  'required|file|image|max:5120|mimes:jpg,png,jpeg',
            'desc_menu'     =>  'required',
            'status'        =>  'required'
        ]);

        if($request->file('gambar_menu')){
            $validatedData = $request->file('gambar_menu')->store('menu');
        }
        
        Menu::create([
            'nama_menu'     => $request ->nama_menu,
            'id_kategori'   => $request -> id_kategori,
            'harga_menu'    => $request ->harga_menu,
            'gambar_menu'   => $validatedData,
            'desc_menu'     => $request ->desc_menu,
            'status'        => $request ->status, 
        ]);
        return redirect('dashboard/menu')->with('sukses', 'Data berhasil disimpan');
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
        // $menu = Menu::find($id);
        // return view('admin.editmenu', ['menu' => $menu ]);
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
        $menu = Menu::find($id);
        // $menu->update($request->all());
        
        $validatedData = $request->validate([
            'nama_menu'     =>  'required',
            'id_kategori'      =>  'required',
            'harga_menu'    =>  'required',
            'gambar_menu'   =>  'file|image|max:5120|mimes:jpg,png,jpeg',
            'desc_menu'     =>  'required',
            'status'        =>  'required'
        ]);
        
        if($request->file('gambar_menu')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData = $request->file('gambar_menu')->store('menu');
        }
        
        $menu->update([
            'nama_menu' => $request ->nama_menu,
            'id_kategori' => $request ->id_kategori,
            'harga_menu' => $request ->harga_menu,
            'gambar_menu' => $validatedData,
            'desc_menu' => $request ->desc_menu,
            'status' => $request ->status, 
        ]);
        return redirect('dashboard/menu')->with('update', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        if($menu->gambar_menu){
            Storage::delete($menu->gambar_menu);
        }
        
        Menu::destroy($menu->id);
        return redirect('dashboard/menu')->with('delete', 'Data menu berhasil dihapus');
    }
}
