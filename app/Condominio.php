<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condominio extends Model
{
    protected $table = 'condominios';
    protected $primaryKey = 'CONDOMINIO_CNPJ';    
    public $timestamps = false;
    public $incrementing = false;

    public function blocos()
	{
		return $this->hasMany(Bloco::class, 'BLOCO_FK_CONDOMINIO');
	}	
}
