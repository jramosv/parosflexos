@extends('layout.app')
@section('contenido')

<table id="vistaparos" class="display" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>No.</th>
				<th>Maquina</th>
				<th>Equipo</th>
                <th>Turno</th>
				<th>Fecha</th>
                <th>Inicio</th>
                <th>Fin</th>
				<th>Motivo de Paro</th>
				<th>Acciones</th>

			</tr>
		</thead>
	</table>

	@endsection

@push('scripts')


<script>
        $(function() {
            $('#vistaparos').DataTable({
                language:   {
                           url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
                           },
                processing: true,
                serverSide: true,
                "dom": 'lBfrtip',
                ajax: '{!! route('prueba') !!}',
                columns: [
                        
                            {data: 'RECID', name: 'RECID'},
                            {data: 'MAQUINA', name: 'MAQUINA'},
                            {data: 'EQUIPO', name: 'EQUIPO'},
                            {data: 'TURNO', name: 'TURNO'},
                            {data: 'FECHA_APERTURA', name: 'FECHA_APERTURA'},
                            {data: 'HORA_INICIO', name:'HORA_INICIO'},
                            {data: 'HORA_FIN', name: 'HORA_FIN' },
                            {data: 'PARO', name: 'PARO'},
                            {
	            "data": null,
	            "className": "enlace",
	            "defaultContent": null,
                "render": function(data,type,row,meta) {
                    return '<a class="btn btn-warning btn-xs" href="{{ url ('/paros/'.$paro->RECID.'/edit') }}"><i class="fa fa-pencil" aria-hidden="true"></i></a> ';
                },
	        },
                            
               
        ]
        });
    });
    </script>


    @endpush