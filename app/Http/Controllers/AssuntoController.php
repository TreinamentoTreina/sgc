<?php

namespace App\Http\Controllers;

use App\Assunto;
use Illuminate\Http\Request;
use Session;
use DB;

class AssuntoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assuntos = Assunto::paginate(10);
        return view('assunto.index')->withAssuntos($assuntos);
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
            'assunto' => 'required|max:254'
            ));

        $assunto = null;

        DB::transaction(function () use ($request, &$assunto)
        {
            //store in the database
            $assunto = new Assunto;            

            $assunto->ASSUNTO_DESCRICAO = $request->assunto;

            $assunto->save();             
        });

        Session::flash('success', 'O assunto foi salvo com successo!');        

        //redirect to another page
        return redirect()->route('assunto.index');
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Assunto  $assunto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assunto $assunto)
    {
        #dd($request);
        // Validate the data
        $this->validate($request, array(
            'assunto' => 'required|max:254'
            ));        

        DB::transaction(function () use ($request, &$assunto)
        {
            $assunto->ASSUNTO_DESCRICAO = $request->assunto;

            $assunto->save();
        });

        Session::flash('success', 'O assunto foi atualizado com successo!');        

        //redirect to another page
        return redirect()->route('assunto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Assunto  $assunto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assunto $assunto)
    {
        DB::beginTransaction();
        try 
        {
            $assunto->delete();
            DB::commit();
            Session::flash('success', 'O assunto foi deletado com sucesso.');
            return redirect()->route('assunto.index');
        } 
        catch (\Exception $e) 
        {
            DB::rollback();
            Session::flash('error', 'Erro ao excluir assunto');
            return redirect()->route('assunto.index');
        }

    }
}
