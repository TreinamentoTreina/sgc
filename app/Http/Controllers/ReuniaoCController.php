<?php

namespace App\Http\Controllers;

use App\ReuniaoC;
use App\Assunto;
use Illuminate\Http\Request;
use Session;
use DB;
use Auth;

class ReuniaoCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reunioes = ReuniaoC::orderByDesc("REUNIAO_DATA")->where("REUNIAO_STATUS", "<=", 2)->paginate(10);
        return view('reuniaoC.index')->withReunioes($reunioes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assuntos = Assunto::all();
        return view('reuniaoC.create')->withAssuntos($assuntos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        // Validate the data
        $this->validate($request, array(
            'assunto' => 'required|integer',
            'observacao' => 'required'
            ));

        $reuniao = null;

        DB::transaction(function () use ($request, &$reuniao)
        {
            //store in the database
            $reuniao = new ReuniaoC;

            $reuniao->REUNIAO_ASSUNTO = $request->assunto;
            $reuniao->REUNIAO_DATA = $reuniao->inverteData($request->data_reuniao);
            $reuniao->REUNIAO_HORA = $request->hora_reuniao;
            $reuniao->REUNIAO_OBSERVACAO = $request->observacao . ", Solicitado por: " . Auth::user()->condomino->CONDOMINO_NOME.", ".  Auth::user()->condomino->apartamento->bloco->BLOCO_NOME ." - ". Auth::user()->condomino->apartamento->APTO_NUMERO;
            $reuniao->REUNIAO_FK_CONDOMINIO = "26245509000198";
            $reuniao->REUNIAO_STATUS = 3;

            $reuniao->save();             
        });        

        Session::flash('success', 'A reunião foi solicitada com successo!');        

        //redirect to another page
        return redirect()->route('reuniaoC.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reuniao  $reuniao
     * @return \Illuminate\Http\Response
     */
    public function show($reuniao)
    {
        $reuniao = ReuniaoC::find($reuniao);
        return view('reuniaoC.show')->withReuniao($reuniao);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reuniao  $reuniao
     * @return \Illuminate\Http\Response
     */
    public function edit(ReuniaoC $reuniao)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reuniao  $reuniao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReuniaoC $reuniao)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reuniao  $reuniao
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReuniaoC $reuniao)
    {
        
    }
}
