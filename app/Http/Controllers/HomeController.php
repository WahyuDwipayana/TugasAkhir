<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Hari;
use App\Models\Jam;
use App\Models\Meja;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $menu = Menu::all();
        $meja = Meja::all();
        $category = Category::all();
        return view('home.home', ['menu' => $menu, 'meja' => $meja, 'category' => $category]);
    }

    public function indexmeja($id)
    {
        $meja = Meja::find($id);
        $user = User::all();
        $hari = Hari::all();
        $jam = Jam::all();
        return view('home.meja', ['meja' => $meja,  'user' => $user, 'hari' => $hari, 'jam'=> $jam]);
    }

    public function indexmenu(Request $request, $meja)
    {
        $meja = Meja::where('id','like', $meja);
        // $user = User::all();
        $hari = Hari::where('nama_hari','like',$request->nama_hari);
        $jam = Jam::where('jam','like',$request->jam);
        $menu = Menu::all();

        // $request = [
        //     $meja->'id'
        // ]
        // $all = [
        //     Hari::find($meja),
        //     Hari::find($hari),
        //     Jam::find($jam)
        // ];

        // if (isset($all)) {
        //     dd('data sudah ada');
        // }else{
        //     dd("data kosong");
        // }
        // $request = ;

        return view('home.menu', ['meja' => $meja, 'hari' => $hari, 'jam'=> $jam, 'menu'=>$menu]);
    }

    public function tambahmenu(Request $request, $menu)
    {
        $menu = Menu::all();


        return redirect('menu')->with('update', 'Data berhasil diupdate');
    }

}
