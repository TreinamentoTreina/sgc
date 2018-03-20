<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Condominio;
use App\Bloco;
use App\Apartamento;
use Session;
use DB;

class CondominioController extends Controller
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
        $condominios = Condominio::paginate(10);

        return view('condominio.index')->withCondominios($condominios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('condominio.criar');
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
            'nome_condominio' => 'required|max:255',
            'cnpj' => 'required',
            'qtdade_bloco' => 'required|integer',
            'qtdade_andares' => 'required|integer',
            'nome_bloco' => 'required|alpha_num|max:1',
            'qtdade_apartamentos' => 'required|integer',
            "cep" => 'required|integer',
            "endereco" => 'required|max:255',
            "numero" => 'required|integer',
            "bairro" => 'required|max:255',
            "cidade" => 'required|max:255',
            "estado" => 'required|max:2',
            ));

        $condominio = null;

        DB::transaction(function () use ($request, &$condominio)
        {
            //store in the database
            $condominio = new Condominio;            

            $condominio->CONDOMINIO_CNPJ = $request->cnpj;
            $condominio->CONDOMINIO_NOME = $request->nome_condominio;
            $condominio->CONDOMINIO_QTDADE_BLOCO = $request->qtdade_bloco;
            $condominio->CONDOMINIO_CEP = $request->cep;
            $condominio->CONDOMINIO_ENDERECO = $request->endereco;
            $condominio->CONDOMINIO_NUMERO = $request->numero;
            $condominio->CONDOMINIO_BAIRRO = $request->bairro;
            $condominio->CONDOMINIO_CIDADE = $request->cidade;
            $condominio->CONDOMINIO_ESTADO = $request->estado;

            $condominio->save();

            $nome_bloco = null;

            if($request->nome_bloco == 'A' && $request->qtdade_bloco <= 26)
            {
                $nome_bloco = range('A', 'Z');
            } 
            else 
            {
                $nome_bloco = range(1, $request->qtdade_bloco);
            }

            for ($i=0; $i < $request->qtdade_bloco; $i++) 
            {
                $bloco = new Bloco;                

                $bloco->BLOCO_NOME = $nome_bloco[$i];
                $bloco->BLOCO_QTDADE_ANDARES = $request->qtdade_andares;
                $bloco->BLOCO_QTDADE_APTO_POR_ANDAR = $request->qtdade_apartamentos;
                $bloco->BLOCO_FK_CONDOMINIO = $request->cnpj;

                $bloco->save();                

                for ($j=1; $j <= $request->qtdade_andares; $j++) 
                {
                    for ($l=1; $l <= $request->qtdade_apartamentos; $l++) 
                    {
                        $apto = new Apartamento;                        

                        $numero = str_pad($l, 2, "0", STR_PAD_LEFT);

                        $apto->APTO_NUMERO = $j . $numero;
                        $apto->APTO_FK_BLOCO = $bloco->BLOCO_ID;

                        $apto->save();
                    }                
                }
            }        
        });

        Session::flash('success', 'O Condominio foi salvo com successo!');

        //redirect to another page
        return redirect()->route('condominio.show', $request->cnpj);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Condominio  $condominio
     * @return \Illuminate\Http\Response
     */
    public function show(Condominio $condominio)
    {
        $total = DB::table('apartamentos')                     
                     ->join('blocos', 'blocos.BLOCO_ID', '=','apartamentos.APTO_FK_BLOCO')
                     ->join('condominios', 'condominios.CONDOMINIO_CNPJ', '=', 'blocos.BLOCO_FK_CONDOMINIO')
                     ->where('condominios.CONDOMINIO_CNPJ', '=', $condominio->CONDOMINIO_CNPJ)                     
                     ->get();

        return view('condominio.visualizar')->withCondominio($condominio)->withTotal($total);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Condominio  $condominio
     * @return \Illuminate\Http\Response
     */
    public function edit(Condominio $condominio)
    {
        return view('condominio.editar')->withCondominio($condominio);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Condominio  $condominio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Condominio $condominio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Condominio  $condominio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Condominio $condominio)
    {
        dd($condominio);
    }
}
