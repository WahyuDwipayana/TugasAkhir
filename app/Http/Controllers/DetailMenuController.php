<?php

namespace App\Http\Controllers;

use App\Models\DetailMenu;
use Illuminate\Http\Request;

class DetailMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\DetailMenu  $detailMenu
     * @return \Illuminate\Http\Response
     */
    public function show(DetailMenu $detailMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailMenu  $detailMenu
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailMenu $detailMenu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailMenu  $detailMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailMenu $detailMenu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailMenu  $detailMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailMenu $detailMenu)
    {
        //
    }
}
