@extends('layout.app')
@section('contenido')
@if (session('status'))
    <div class="alert alert-info">
        {{ session('status') }}
    </div>
@endif
<div>
<table class="table" class="pagination-danger">
		
		<tbody>
				<ul>
					<div><b>No.  </b> {{ $paro->PRP_RECID }}</div>
					<div><b>Pedido:  </b> {{ $paro->PRP_PEDIDO }}</div>
					<div><b>Fecha:  </b> {{ $date = date('Y-m-d', strtotime($paro->PRP_HORA_INICIO))}}</div>
					<div><b>Hora Inicio:  </b>{{ $date = date('H:i:s', strtotime($paro->PRP_HORA_INICIO))}}</div>
					<div><b>Hora Fin:  </b>{{ $date = date('H:i:s', strtotime($paro->PRP_HORA_FIN))}}</div>
					
					<div><b>Tiempo en PLC:  </b>{{ number_format($paro->PRP_TIEMPO_PLC, 3, '.', ',') }}</div>
					<div><b>Observaciones:  </b>{{ $paro->PRP_OBSERVACIONES }}</div>

					<div><b>Motivo:  </b>{{ $paro->catalogo->PCMP_DESCRIPCION_CORTA }}</div>
					<div><b>Usuario:  </b>{{ $paro->PRP_USUARIO}}</div>
					<div width="122px">
					
					<a href= "{{ url ('/paros/'.$paro->PRP_RECID) }}" title="Editar" class="btn btn-warning btn-xs">
						<i class="fa fa-pencil" aria-hidden="true"></i>
					</a>
					<a href= "{{ url ('/') }}" title="Regresar" class="btn btn-danger btn-xs">
						<i class="fa fa-window-close" aria-hidden="true"></i>
					</a>
					
				</div>
				</div>
			</ul>

		</tbody>
	</table>
	</div>

	@endsection