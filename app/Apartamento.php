<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartamento extends Model
{
    protected $table = 'apartamentos';
    protected $primaryKey = 'APTO_ID';
    public $timestamps = false;

    public function bloco()
    {
    	return $this->belongsTo(Bloco::class, 'APTO_FK_BLOCO', 'BLOCO_ID');
    }
}
