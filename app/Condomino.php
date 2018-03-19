<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condomino extends Model
{
    protected $table = 'condominos';
    protected $primaryKey = 'CONDOMINO_CPF';    
    public $timestamps = false;
    public $incrementing = false;

    public function telefones()
	{
		return $this->hasMany(Telefone::class, 'TELEFONE_FK_CONDOMINO');
	}
}
