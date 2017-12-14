<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VistaParos extends Model
{
    protected $table = 'PRD_VIEW_PAROS';
    protected $primaryKey = 'RECID';

    public $timestamps = false;
        
}
