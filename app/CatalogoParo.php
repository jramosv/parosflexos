<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatalogoParo extends Model
{

   protected $table = 'PRD_CATALOGO_MOTIVOS_PARO';
   protected $primmaryKey = 'PCMP_ID_PARO';
   public $timestamps = false;

   public function registro()
   {
       return $this->hasMany('App\RegistroParo');
   }
}
