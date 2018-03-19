<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bloco extends Model
{
    protected $table = 'blocos';
    protected $primaryKey = 'BLOCO_ID';
    public $timestamps = false;

    public function condominio()
    {  
        return $this->belongsTo(Condominio::class,'BLOCO_FK_CONDOMINIO','CONDOMINIO_CNPJ');
    }

    public function apartamentos()
	{
		return $this->hasMany(Apartamento::class, 'APTO_FK_BLOCO');
	}
}
