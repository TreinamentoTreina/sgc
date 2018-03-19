<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    protected $table = 'telefones';      
    public $timestamps = false;
    public $incrementing = false;

    public function condomino()
    {  
        return $this->belongsTo(Condomino::class,'TELEFONE_FK_CONDOMINO','CONDOMINO_CPF');
    }
}
