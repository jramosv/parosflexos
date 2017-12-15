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
        return view('paros.index');
    }

    public function getData()
    {
        $vistaparos = DB::table('PRD_VIEW_PAROS')
        ->orderBy('RECID', 'desc')
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
         ->editColumn('TIEMPO_PARO_PLC', function ($data) {
                return number_format($data->TIEMPO_PARO_PLC,2, ',', ' ');
            })
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

  
}
