<div class="modal fade" id="modalBuscar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="col-md-12">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="modalTittle">Buscar Profesional</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class='input-group'>
                            <input type="text" name="clave" id="clave" class="form-control">
                            <span class="input-group-addon" >
                                <a href="" onclick="_buscar('profesional')">
                                    <span class="glyphicon glyphicon-search" data-toggle="modal" data-target="#modalBuscar"></span>
                                </a>
                            </span>
                        </div>
                    </div>
                    <div id="dataTarget"></div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-primary" id="btnAgregar">Nuevo</a>
                    <a href="#" class="btn btn-success" id="deleteButton" data-dismiss="modal">Listo!</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var _tipo;

    function toggleModal(tipo) {

        _tipo = tipo;

        if (tipo === 'profesional') {
            $('#modalTittle').html('Seleccione Profesional');
            $('#btnAgregar').attr('href', '/gestionclinicas/profesionales/crear');
        } else {
            $('#modalTittle').html('Seleccione Paciente');
            $('#btnAgregar').attr('href', '/gestionclinicas/pacientes/crear');
        }

        $('#dataTarget').html('');
        $('#modalBuscar').modal('show');
    }
    //peticion ajax para buscar profesionales o pacientes
    function _buscar() {

        var url = '';
        var valor = '';

        if (_tipo === 'profesional') {
            url = '/gestionclinicas/profesionales/find';
            valor = jQuery.trim($('#clave').val());
        } else {
            url = '/gestionclinicas/pacientes/find';
            valor = jQuery.trim($('#clave').val());
        }

        $.ajax({
            url: url,
            type: 'get',
            dataType: 'JSON',
            data: {clave: valor},
            success: function(data) {
                if (data) {
                    var tabla = '<table class="table table-hover">';

                    $.each(data.datos, function(i, item) {
                        tabla += '<tr>' +
                                '<td>' + item.rut + '</td><td>' + item.nombre + '</td>' +
                                '<td><a href="#" data-toggle="modal" data-target="#modalBuscar">' +
                                '<span class="glyphicon glyphicon-plus" onclick=add("' + item.rut + '") >' +
                                '</span></a>' +
                                '</td>' +
                                '</tr>';
                    });

                    tabla += '</table>';

                    $('#dataTarget').html(tabla);

                } else {
                    $('#dataTarget').html('La búsqueda no produjo resultados.');
                }
            },
            error: function(e) {
                $('#dataTarget').html(e.toString());
            }
        });
    }

    function add(rut) {

        if (_tipo === 'profesional') {
            $('#rutProfesional').val(rut);
        }
        else
            $('#rutPaciente').val(rut);

    }

</script>