<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusReuniao extends Model
{
    protected $table = 'status_reuniao';
    protected $primaryKey = 'STATUSR_ID';
    public $timestamps = false;

    public function reunioes()
	{
		return $this->hasMany(Reuniao::class, 'REUNIAO_ASSUNTO');
	}    
}
