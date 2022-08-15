<?php

namespace App\Http\Controllers;

use App\Models\DetailReservasi;
use App\Models\Hari;
use App\Models\Jam;
use App\Models\Meja;
use App\Models\Menu;
use Illuminate\Http\Request;

class DetailReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $meja = Meja::where('id','like', $meja);
        // // $user = User::all();
        // $hari = Hari::where('nama_hari','like',$hari);
        // $jam = Jam::where('jam','like',$jam);
        // $menu = Menu::all();

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

        return view('home.detail');
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
     * @param  \App\Models\DetailReservasi  $detailReservasi
     * @return \Illuminate\Http\Response
     */
    public function show(DetailReservasi $detailReservasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailReservasi  $detailReservasi
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailReservasi $detailReservasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailReservasi  $detailReservasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailReservasi $detailReservasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailReservasi  $detailReservasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailReservasi $detailReservasi)
    {
        //
    }
}
