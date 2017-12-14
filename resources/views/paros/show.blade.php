@extends('layout.app')
@section('contenido')

<table id="paros-table" class="display" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th class="text-center">No.</th>
				<th class="text-center">Pedido</th>
				<th class="text-center">Hora de Inicio</th>
				<th class="text-center">Hora Fin</th>
				<th class="text-center">Observaciones</th>
				<th class="text-center">Tiempo de PLC</th>
				<th class="text-center">Motivo de Paro</th>
				<th class="text-center">Acciones</th>

			</tr>
		</thead>
	</table>

	@endsection

@push('scripts')


<script>
        $(function() {
            $('#paros-table').DataTable({
                language:   {
                           url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
                           },
                processing: true,
                serverSide: true,
                "dom": 'lBfrtip',
                ajax: '{!! route('listado') !!}',
                columns: [
                            { "data": "PRP_RECID" },
                            { "data": "PRP_PEDIDO" },
                            { "data": "PRP_HORA_INICIO" },
                            { "data": "PRP_HORA_FIN" },
                            { "data": "PRP_OBSERVACIONES" },
                            { "data": "PRP_TIEMPO_PLC" },
                            { "data": "PCMP_ID_PARO" },
                            {
	            "data": null,
	            "className": "enlace",
	            "defaultContent": null,
                "render": function(data,type,row,meta) {
                    return '<a class="btn btn-warning btn-xs" href="{{ url ('/paros/'.$paro->PRP_RECID.'/edit') }}"><i class="fa fa-pencil" aria-hidden="true"></i></a> ';
                },
	        },
                            
               
        ]});
    });
    </script>


    @endpush