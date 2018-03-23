<?php

namespace App\Http\Controllers;

use App\Condomino;
use Illuminate\Http\Request;
use Session;
use DB;

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
        return view('condomino.criar');
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
            "nome_condomino" => 'required',
            "cpf" => 'required',
            "email" => 'required',
            "apartamento" => 'required|integer'
            ));

        $condomino = null;

        DB::transaction(function () use ($request, &$condomino)
        {
            //store in the database
            $condomino = new Condomino;            

            $condomino->CONDOMINO_CPF = $request->cpf;
            $condomino->CONDOMINO_NOME = $request->nome_condomino;
            $condomino->CONDOMINO_EMAIL = $request->email;
            if(isset($request->sindico))
            {
                $condomino->CONDOMINO_SINDICO = $request->sindico;
            } 
            else 
            {
                $condomino->CONDOMINO_SINDICO = 0;
            }
            $condomino->CONDOMINO_FK_APARTAMENTO = $request->apartamento;

            $condomino->save();             
        });        

        Session::flash('success', 'O condomino foi salvo com successo!');        

        //redirect to another page
        return redirect()->route('condomino.show', $condomino->CONDOMINO_CPF);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Condomino  $condomino
     * @return \Illuminate\Http\Response
     */
    public function show(Condomino $condomino)
    {
        dd($condomino);
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
