@extends('layout.app')
@section('contenido')
	<div class="container">
	<h4>Editar Pedido {{$paro->PRP_PEDIDO}}</h4>

<form action="{{ action('ParosController@update', ['id' => $paro->PRP_RECID ])}}" method="POST" >
            {{ csrf_field() }}
            {{ method_field('PUT') }}

		<div class="form-group {{ $errors->has('PRP_OBSERVACIONES') ? 'has-error' : '' }}">
			<label for="PRP_OBSERVACIONES">Oservaciones</label>
			<input type="text" name="PRP_OBSERVACIONES" class="form-control" placeholder="Observaciones" value="{{ $paro->PRP_OBSERVACIONES }}" />
			@if( $errors->has('PRP_OBSERVACIONES'))
				<span class="help-block">
					<strong>{{ $errors->first('PRP_OBSERVACIONES') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('PRP_ID_PARO') ? 'has-error' : '' }}">
			<label for="PRP_ID_PARO">Motivos de Paro</label>
			<select name="PRP_ID_PARO" class="form-control" >
				<option value="0">[ Seleccione un motivo ]</option>
				@foreach($catalogo as $item)
					<option value= {{ $item->PCMP_ID_PARO }} {{ ( $paro->PRP_ID_PARO ) == $item->PCMP_ID_PARO ?'selected' : '' }} > {{ $item->PCMP_DESCRIPCION_CORTA }} </option>
				@endforeach
			</select>
			@if( $errors->has('PRP_ID_PARO'))
				<span class="help-block">
					<strong>{{ $errors->first('PRP_ID_PARO') }}</strong>
				</span>
			@endif
		</div>
		
		<input type="submit" class="btn btn-primary" value="Actualizar">
		<a href="{{ url('/')}}" class="btn btn-warning">Cancelar</a>
	</form>
</div>
@endsection
