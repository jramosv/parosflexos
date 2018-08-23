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
                <th>Tiempo en PLC</th>
				<th>Motivo de Paro</th>
				<th>Acciones</th>

			</tr>
		</thead>

         <tfoot>
			<tr>
				<th>No.</th>
				<th>Maquina</th>
				<th>Equipo</th>
                <th>Turno</th>
				<th>Fecha</th>
                <th>Inicio</th>
                <th>Tiempo en PLC</th>
				<th>Motivo de Paro</th>
				<th>Acciones</th>

			</tr>
		</tfoot>
	</table>

	@endsection

@push('scripts')

<script type="text/javascript">
    $(document).ready(function() {
        $('#vistaparos').DataTable( {
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
            },
            ajax: '{!! route('datatable') !!}',
                columns: [
                        
                            {data: 'RECID', name: 'RECID'},
                            {data: 'MAQUINA', name: 'MAQUINA'},
                            {data: 'EQUIPO', name: 'EQUIPO'},
                            {data: 'TURNO', name: 'TURNO'},
                            {data: 'FECHA_APERTURA', name: 'FECHA_APERTURA'},
                            {data: 'HORA_INICIO', name:'HORA_INICIO'},
                            {data: 'TIEMPO_PARO_PLC', name: 'TIEMPO_PARO_PLC' },
                            {data: 'PARO', name: 'PARO'},
                            {
	            "data": null,
	            "className": "enlace",
	            "defaultContent": null,
                "render": function(data,type,row,meta) {
                    return '<div class="btn-group"> <a class="btn btn-info btn-xs" title="Información" href="/paros/' + row.RECID + '/show"><i class="fa fa-info-circle" aria-hidden="true"></i></a><a class="btn btn-warning btn-xs" title="Editar" href="/paros/' + row.RECID + '"><i class="fa fa-pencil" aria-hidden="true"></i></a> </div>';
                },
	        },
                            
               
        ],
            responsive: true,
            initComplete: function () {
                this.api().columns([1,4,7]).every( function () {
                    var column = this;
                    var select = $('<select><option value=""></option></select>')
                        .appendTo( $(column.header()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );

                column.data().unique().sort().each( function ( d, j ) {
                   select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
                } );
            }
        });
    });
</script>




    @endpush