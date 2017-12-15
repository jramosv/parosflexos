<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CatalogoParo;
use App\RegistroParo;
use App\VistaParos;
use Yajra\DataTables\DataTables;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\MotivoParo;
use DB;
use Carbon\Carbon;

class ParosController extends Controller
{
    public function index()
    {
        $paros = RegistroParo::orderBy('PRP_HORA_INICIO','desc')->paginate(10);
        $catalogo = CatalogoParo::all();
        
        return view('paros.index', compact ('paros','catalogo'));
    }

    public function prueba()
    {
        $vistaparos = DB::table('PRD_VIEW_PAROS')
        ->orderBy('HORA_INICIO', 'desc')
        ->take(5000)
        ->select('RECID', 'MAQUINA', 'EQUIPO', 'TURNO', 'FECHA_APERTURA','HORA_INICIO','TIEMPO_PARO_PLC','PARO'
        )->get();
        
         return Datatables::of($vistaparos)
         ->editColumn('FECHA_APERTURA', function ($user) {
            return $user->FECHA_APERTURA ? with(new Carbon($user->FECHA_APERTURA))->format('d/m/Y') : '';
        })
        ->editColumn('HORA_INICIO', function ($user) {
            return $user->HORA_INICIO ? with(new Carbon($user->HORA_INICIO))->format('H:i:s') : '';
        })
         ->make(true);

    }


    public function listado()
    {
        $registro = DB::table('PRD_REGISTRO_PAROS')
        ->join('PRD_CATALOGO_MOTIVOS_PARO','PRD_REGISTRO_PAROS.PRP_ID_PARO','=', 'PRD_CATALOGO_MOTIVOS_PARO.PCMP_ID_PARO')
        
        ->orderBy('PRP_HORA_INICIO', 'desc')
        ->take(100)
        ->select(
        'PRP_RECID',
        'PRP_PEDIDO',
        'PRP_HORA_INICIO',
        'PRP_HORA_FIN',
        'PRP_OBSERVACIONES',
        'PRP_TIEMPO_PLC',
        'PRD_CATALOGO_MOTIVOS_PARO.PCMP_ID_PARO'
        )
        ->get();
     
        return DataTables::of($registro)

        ->make(true);
        
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
        $paro = DB::table('PRD_VIEW_PAROS')->where('RECID', $id)->first();
        return view('paros.prueba', compact ('paro'));

    }
  
}
