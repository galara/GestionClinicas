<div class="modal-dialog">
    <div class="col-md-12">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Buscar Profesional</h4>
            </div>
            <div class="modal-body" id="dataTarget">
                <div class="form-group">
                    <div class='input-group'>
                        <input type="text" class="form-control">
                        <span class="input-group-addon" >
                            <a href="" >
                                <span class="glyphicon glyphicon-search" data-toggle="modal" data-target="#modalBuscar"></span>
                            </a>
                        </span>
                    </div>
                </div>
            </div>
            <div id="dataTarget"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <a href="#" class="btn btn-primary" id="deleteButton">Aceptar</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function buscar(tipo) {

        var url = '';
        var valor = '';

        if (tipo === 'profesional') {
            url = '/gestionclinicas/profesionales/find';
            valor = jQuery.trim($('#claveProfesional').val());
            $('#modalTitle').html('Seleccione Profesional');
        } else {
            url = '/gestionclinicas/pacientes/find';
            valor = jQuery.trim($('#clavePaciente').val());
            $('#modalTitle').html('Seleccione Paciente');
        }

        //alert(valor + ' ' + url);

        $.ajax({
            url: url,
            type: 'get',
            dataType: 'JSON',
            data: {clave: valor},
            success: function(data) {
                if (data) {
                    var tabla = '<table class="table table-hover">';

                    $.each(data.datos, function(i, item) {
                        tabla += '<tr><td>' + item.rut + '</td><td>' + item.nombre_1 + ' '
                                + item.apellido_paterno + '</td>' +
                                '<td><a href="#"><span class="glyphicon glyphicon-plus onclick=add("' + item.rut + '","' + tipo + '")></span></a></td></tr>';
                    });

                    tabla += '</table>';

                    $('#dataTarget').html(tabla);
                    //fillTable(data, tipo);
                    //$('#dataTarget').html(data);
                } else {
                    $('#dataTarget').html('El profesional no se encuentra registrado');
                }
                $('#modalBuscar').modal('show');
            },
            error: function(e) {
                $('#dataTarget').html(e);
                $('#modalBuscar').modal('show');
            }
        });
    }
</script>