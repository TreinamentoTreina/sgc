<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservaAreaComum extends Model
{
    protected $table = 'reserva_area';
    protected $primaryKey = 'RESERVA_AREA_ID';
    public $timestamps = false;

    public function areaComum()
    {  
        return $this->belongsTo(AreaComum::class,'RESERVA_AREA_FK_ID_AREA','AREA_COMUM_ID');
    }

    public function condomino()
    {  
        return $this->belongsTo(Condomino::class,'RESERVA_AREA_RESERVADO_POR','CONDOMINO_CPF');
    }

    public function inverteData($data)
    {
	    if(count(explode("/",$data)) > 1)
	    {
	        return implode("-",array_reverse(explode("/",$data)));
	    }
	    elseif(count(explode("-",$data)) > 1)
	    {
	        return implode("/",array_reverse(explode("-",$data)));
	    }
	}
}
