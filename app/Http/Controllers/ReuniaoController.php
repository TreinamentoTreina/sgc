<?php

namespace App\Http\Controllers;

use App\Reuniao;
use Illuminate\Http\Request;

class ReuniaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reuniao.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reuniao.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reuniao  $reuniao
     * @return \Illuminate\Http\Response
     */
    public function show(Reuniao $reuniao)
    {
        return view('reuniao.show')->withReuniao($reuniao);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reuniao  $reuniao
     * @return \Illuminate\Http\Response
     */
    public function edit(Reuniao $reuniao)
    {
        return view('reuniao.create')->withReuniao($reuniao);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reuniao  $reuniao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reuniao $reuniao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reuniao  $reuniao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reuniao $reuniao)
    {
        //
    }
}
