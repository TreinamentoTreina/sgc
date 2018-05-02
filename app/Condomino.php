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

	public function apartamento()
    {
    	return $this->belongsTo(Apartamento::class, 'CONDOMINO_FK_APARTAMENTO', 'APTO_ID');
    }

    public function usuario()
    {  
        return $this->belongsTo(User::class,'CONDOMINO_FK_USER_ID','id');
    }
}
