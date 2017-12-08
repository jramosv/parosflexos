<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistroParo extends Model
{
    protected $table = 'PRD_REGISTRO_PAROS';
    protected $primaryKey = 'PRP_RECID';
    public $timestamps = false;
    protected $fillable = ['PRP_ID_PARO', 
    'PRP_OBSERVACIONES',
    'PRP_CORRELATIVO',
    'PRP_NO_CORRIDA',
    'PRP_PEDIDO',
    'PRP_NO_PARTE',
    'PRP_REPETICION',
    'PRP_HORA_INICIO',
    'PRP_HORA_FIN',
    'PRP_USUARIO',
    'PRP_AFECTA',
];
    
    public function catalogo()
    {
        return $this->belongsTo('App\CatalogoParo','PRP_ID_PARO','PCMP_ID_PARO');

    }
}
