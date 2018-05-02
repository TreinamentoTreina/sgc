<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaComum extends Model
{
    protected $table = 'areas_comuns';
    protected $primaryKey = 'AREA_COMUM_ID';
    public $timestamps = false;
}
