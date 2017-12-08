@extends('layout.app')
@section('contenido')

<div>
<table class="table" class="pagination-danger">
		<thead>
			<tr>
				<th class="text-center">No.</th>
				<th class="text-center">Pedido</th>
				<th class="text-center">Fecha</th>
				<th class="text-center">Hora de Inicio</th>
				<th class="text-center">Hora Fin</th>
				<th class="text-center">Observaciones</th>
				<th class="text-center">Tiempo de PLC</th>
				<th class="text-center">Motivo de Paro</th>
				<th>Acciones</th>

			</tr>
		</thead>
		<tbody>
			@foreach($paros as $paro)
				<tr>
					<td width="20px">{{ $paro->PRP_RECID }}</td>
					<td class="text-center">{{ $paro->PRP_PEDIDO }}</td>
					<td class="text-center">{{ $date = date('Y-m-d', strtotime($paro->PRP_HORA_INICIO))}}</td>
					<td class="text-center">{{ $date = date('H:i:s', strtotime($paro->PRP_HORA_INICIO))}}</td>
					<td class="text-center">{{ $date = date('H:i:s', strtotime($paro->PRP_HORA_FIN))}}</td>
					<td class="text-center">{{ $paro->PRP_OBSERVACIONES }}</td>
					<td class="text-center">{{ number_format($paro->PRP_TIEMPO_PLC, 3, '.', ',') }}</td>
					<td class="text-center">{{ $paro->catalogo->PCMP_DESCRIPCION_CORTA }}</td>
					<td width="122px">
					
					<a href= "{{ url ('/paros/'.$paro->PRP_RECID.'/edit') }}" title="Editar" class="btn btn-warning btn-xs">
						<i class="fa fa-pencil" aria-hidden="true"></i>
					</a>
					
				</td>
				</td>
			</tr>
	@endforeach

		</tbody>
	</table>
	</div>
	{!! $paros->render() !!}

	@endsection