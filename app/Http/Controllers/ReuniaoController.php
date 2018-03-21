<?php

namespace App\Http\Controllers;

use App\Reuniao;
use App\Assunto;
use Illuminate\Http\Request;
use Session;
use DB;

class ReuniaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reunioes = Reuniao::paginate(10);
        return view('reuniao.index')->withReunioes($reunioes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assuntos = Assunto::all();
        return view('reuniao.create')->withAssuntos($assuntos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        #dd($request);
        // Validate the data
        $this->validate($request, array(
            'assunto' => 'required|integer',
            'data_reuniao' => 'required',
            'hora_reuniao' => 'required'
            ));

        $reuniao = null;

        DB::transaction(function () use ($request, &$reuniao)
        {
            //store in the database
            $reuniao = new Reuniao;            

            $reuniao->REUNIAO_ASSUNTO = $request->assunto;
            $reuniao->REUNIAO_DATA = $reuniao->inverteData($request->data_reuniao);
            $reuniao->REUNIAO_HORA = $request->hora_reuniao;
            $reuniao->REUNIAO_FK_CONDOMINIO = "26245509000198";

            $reuniao->save();             
        });

        Session::flash('success', 'A reunião foi salva com successo!');        

        //redirect to another page
        return redirect()->route('reuniao.show', $reuniao->REUNIAO_ID);
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
