<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assunto extends Model
{
    protected $table = 'assunto_reunioes';
    protected $primaryKey = 'ASSUNTO_ID';
    public $timestamps = false;

    public function reunioes()
	{
		return $this->hasMany(Reuniao::class, 'REUNIAO_ASSUNTO');
	}    
}
