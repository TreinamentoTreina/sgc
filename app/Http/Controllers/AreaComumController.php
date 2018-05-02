<?php

namespace App\Http\Controllers;

use App\AreaComum;
use Illuminate\Http\Request;
use Session;
use DB;

class AreaComumController extends Controller
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
        $areas = AreaComum::paginate(10);
        return view('area_comum.index')->withAreas($areas);
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
            'nome' => 'required|max:254',
            'breve_descricao' => 'required'
            ));

        $area = null;

        DB::transaction(function () use ($request, &$area)
        {
            //store in the database
            $area = new AreaComum;            

            $area->AREA_COMUM_NOME = $request->nome;
            $area->AREA_COMUM_BREVE_DESCRICAO = $request->breve_descricao;

            $area->save();             
        });

        Session::flash('success', 'A Area comum foi salva com successo!');        

        //redirect to another page
        return redirect()->route('area.index');
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AreaComum  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AreaComum $area)
    {
        #dd($request);
        // Validate the data
        $this->validate($request, array(
            'nome' => 'required|max:254',
            'breve_descricao' => 'required'
            ));        

        DB::transaction(function () use ($request, &$area)
        {
            $area->AREA_COMUM_NOME = $request->nome;
            $area->AREA_COMUM_BREVE_DESCRICAO = $request->breve_descricao;

            $area->save();
        });

        Session::flash('success', 'A Area comum foi atualizada com successo!');        

        //redirect to another page
        return redirect()->route('area.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AreaComum  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(AreaComum $area)
    {
        DB::beginTransaction();
        try 
        {
            $area->delete();
            DB::commit();
            Session::flash('success', 'A Area comum foi deletada com sucesso.');
            return redirect()->route('area.index');
        } 
        catch (\Exception $e) 
        {
            DB::rollback();
            Session::flash('error', 'Erro ao excluir area comum');
            return redirect()->route('area.index');
        }
    }
}