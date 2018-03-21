<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reuniao extends Model
{
    protected $table = 'reunioes';
    protected $primaryKey = 'REUNIAO_ID';
    public $timestamps = false;

    public function condominio()
    {  
        return $this->belongsTo(Reuniao::class,'REUNIAO_FK_CONDOMINIO','CONDOMINIO_CNPJ');
    }

    public function assunto()
    {  
        return $this->belongsTo(Assunto::class,'REUNIAO_ASSUNTO','ASSUNTO_ID');
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
