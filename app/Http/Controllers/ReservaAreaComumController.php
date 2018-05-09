<?php

namespace App\Http\Controllers;

use App\ReservaAreaComum;
use App\AreaComum;
use Illuminate\Http\Request;
use Session;
use DB;
use Auth;

class ReservaAreaComumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = ReservaAreaComum::orderByDesc("RESERVA_AREA_DATA_RESERVA")->paginate(10);
        return view('reserva.index')->withReservas($reservas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = AreaComum::all();
        return view('reserva.create')->withAreas($areas);
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
            'area' => 'required|integer',
            'data_reserva' => 'required',
            'hora_reserva' => 'required'
            ));

        $reserva = new ReservaAreaComum; 

        $verifica = ReservaAreaComum::where("RESERVA_AREA_DATA_RESERVA", "=", $reserva->inverteData($request->data_reserva))->where("RESERVA_AREA_FK_ID_AREA", "=", $request->area)->get();        

        if(count($verifica) == 1)
        {
            Session::flash('error', 'Já existe uma reserva nessa data!');        

            //redirect to another page
            return redirect()->route('reserva.index');

        }

        $reserva = null;


        DB::transaction(function () use ($request, &$reserva)
        {
            //store in the database
            $reserva = new ReservaAreaComum;            

            $reserva->RESERVA_AREA_FK_ID_AREA = $request->area;
            $reserva->RESERVA_AREA_DATA_RESERVA = $reserva->inverteData($request->data_reserva);
            $reserva->RESERVA_AREA_HORARIO_INICIO = $request->hora_reserva;
            $reserva->RESERVA_AREA_RESERVADO_POR = Auth::user()->condomino->CONDOMINO_CPF;

            $reserva->save();             
        });        

        Session::flash('success', 'A reserva foi realizada com successo!');        

        //redirect to another page
        return redirect()->route('reserva.show', $reserva->RESERVA_AREA_ID);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReservaAreaComum  $reservaAreaComum
     * @return \Illuminate\Http\Response
     */
    public function show($reservaAreaComum)
    {
        $reservaAreaComum = ReservaAreaComum::find($reservaAreaComum);
        return view('reserva.show')->withReserva($reservaAreaComum);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReservaAreaComum  $reservaAreaComum
     * @return \Illuminate\Http\Response
     */
    public function edit(ReservaAreaComum $reservaAreaComum)
    {
        $areas = AreaComum::all();
        return view('reserva.create')->withAreas($areas)->withReserva($reservaAreaComum);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReservaAreaComum  $reservaAreaComum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReservaAreaComum $reservaAreaComum)
    {
        // Validate the data
        $this->validate($request, array(
            'area' => 'required|integer',
            'data_reserva' => 'required',
            'hora_reserva' => 'required'
            ));        

        DB::transaction(function () use ($request, &$reservaAreaComum)
        {
            //store in the database
            $reservaAreaComum = new ReservaAreaComum;            

            $reservaAreaComum->RESERVA_AREA_FK_ID_AREA = $request->area;
            $reservaAreaComum->RESERVA_AREA_DATA_RESERVA = $reservaAreaComum->inverteData($request->data_reserva);
            $reservaAreaComum->RESERVA_AREA_HORARIO_INICIO = $request->hora_reserva;
            $reservaAreaComum->RESERVA_AREA_RESERVADO_POR = Auth::user()->condomino->CONDOMINO_CPF;

            $reservaAreaComum->save();             
        });        

        Session::flash('success', 'A reserva foi realizada com successo!');        

        //redirect to another page
        return redirect()->route('reserva.show', $reservaAreaComum->RESERVA_AREA_ID);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReservaAreaComum  $reservaAreaComum
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReservaAreaComum $reservaAreaComum)
    {
        DB::beginTransaction();
        try 
        {
            $reservaAreaComum->delete();
            DB::commit();
            Session::flash('success', 'A reserva foi deletada com sucesso.');
            return redirect()->route('reserva.index');
        } 
        catch (\Exception $e) 
        {
            DB::rollback();
            Session::flash('error', 'Erro ao excluir reserva');
            return redirect()->route('reserva.index');
        }        
    }
}
