<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CatalogoParo;
use App\RegistroParo;
use Yajra\Datatables\Datatables;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\MotivoParo;
use DB;

class ParosController extends Controller
{
    public function index()
    {
        $paros = RegistroParo::orderBy('PRP_HORA_INICIO','desc')->paginate(10);
        $catalogo = CatalogoParo::all();
        
        return view('paros.index', compact ('paros','catalogo'));
    }


    public function listado()
    {
        $registro = DB::table('PRD_REGISTRO_PAROS')
        ->join('PRD_CATALOGO_MOTIVOS_PARO','PRD_REGISTRO_PAROS.PRP_ID_PARO','=', 'PRD_CATALOGO_MOTIVOS_PARO.PCMP_ID_PARO')
        
        ->orderBy('PRP_HORA_INICIO', 'desc')
        ->take(10)
        ->select(
        'PRP_PEDIDO',
        'PRP_HORA_INICIO',
        'PRP_HORA_FIN',
        'PRP_OBSERVACIONES',
        'PRP_TIEMPO_PLC',
        'PRP_RECID',
        'PRD_CATALOGO_MOTIVOS_PARO.PCMP_ID_PARO')
        ->get();
     
        return datatables::of($registro)->make();
    }

    public function edit($id)

    {
        $paro = RegistroParo::where('PRP_RECID', $id)->first();
        $catalogo = CatalogoParo::all();
        return view('paros.edit', compact('paro', 'catalogo'));
    }

    public function update(MotivoParo $request, $id)
    {
        $paro = RegistroParo::where('PRP_RECID', $id)->first();/* 
        dump($paro); */
        
   $paro->update(
            $request->only(
                [
                    'PRP_OBSERVACIONES',
                    'PRP_ID_PARO'
                ]
            ));
        return redirect('/paros')->with('status', 'El motivo se actualizo correctamente!');
        
    }

    public function show($id)
    {
        // get the nerd
        
        $paro = RegistroParo::where('PRP_RECID', $id)->first();
        return view('paros.show', compact ('paro'));

    }
  
}
