<?php

namespace App\Http\Controllers;

use App\Condomino;
use Illuminate\Http\Request;

class CondominoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('condomino.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('condomino.create');
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
     * @param  \App\Condomino  $condomino
     * @return \Illuminate\Http\Response
     */
    public function show(Condomino $condomino)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Condomino  $condomino
     * @return \Illuminate\Http\Response
     */
    public function edit(Condomino $condomino)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Condomino  $condomino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Condomino $condomino)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Condomino  $condomino
     * @return \Illuminate\Http\Response
     */
    public function destroy(Condomino $condomino)
    {
        //
    }
}
