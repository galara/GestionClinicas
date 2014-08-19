<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'citas-form',
        'enableAjaxValidation' => true,
    ));
    ?>

    <?php
    CHtml::$errorSummaryCss = 'alert alert-warning';
    CHtml::$errorContainerTag = 'p';
    echo $form->errorSummary($model, 'Se han detectado los siguientes errores:', '', array());
    ?>

    <div class='col-md-6'>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'rut_paciente'); ?>
            <div class='input-group'>
                <?php echo $form->textField($model, 'rut_paciente', array('maxlength' => 12, 'class' => 'form-control', 'id' => 'rutPaciente', 'readonly' => 'readonly')); ?>
                <span class="input-group-addon" >
                    <a href="#" onclick="toggleModal('paciente')">
                        <span class="glyphicon glyphicon-search"></span>
                    </a>
                </span>
            </div>
            <?php echo $form->error($model, 'rut_paciente', array('class' => 'text-danger')); ?>
        </div>
    </div>
    <div class='col-md-6'>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'rut_profesional'); ?>
            <div class='input-group'>
                <?php echo $form->textField($model, 'rut_profesional', array('maxlength' => 12, 'class' => 'form-control', 'id' => 'rutProfesional', 'readonly' => 'readonly')); ?>
                <span class="input-group-addon" >
                    <a href="#" onclick="toggleModal('profesional')">
                        <span class="glyphicon glyphicon-search"></span>
                    </a>
                </span>
            </div>
            <?php echo $form->error($model, 'rut_profesional', array('class' => 'text-danger')); ?>
        </div>
    </div>
    <div class='col-md-6'>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'hora_inicio', array('class' => 'control-label', 'for' => 'from')); ?>
            <div class='input-group date' id='from'>
                <?php echo $form->textField($model, 'hora_inicio', array('class' => 'form-control', 'readonly' => 'readonly')); ?>
                <span class="input-group-addon" >
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
            <?php echo $form->error($model, 'hora_inicio', array('class' => 'text-danger')); ?>
        </div>
    </div>
    <div class='col-md-6'>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'hora_termino', array('class' => 'control-label', 'for' => 'to')); ?>
            <div class='input-group date' id='to'>
                <?php echo $form->textField($model, 'hora_termino', array('class' => 'form-control', 'readonly' => 'readonly')); ?>
                <span class="input-group-addon" >
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
            <?php echo $form->error($model, 'hora_termino', array('class' => 'text-danger')); ?>
        </div>
    </div>
    <div class='col-md-12'>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'id_tipo_cita'); ?>
            <?php echo $form->dropDownList($model, 'id_tipo_cita', CHtml::listData(TipoCita::model()->findAll(), 'id', 'tipo_cita'), array('class' => 'form-control', 'prompt'=> 'Seleccione...')); ?>
            <?php echo $form->error($model, 'id_tipo_cita', array('class' => 'text-danger')); ?>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'motivo'); ?>
            <?php echo $form->textField($model, 'motivo', array('size' => 60, 'maxlength' => 150, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'motivo', array('class' => 'text-danger')); ?>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'descripcion'); ?>
            <?php echo $form->textArea($model, 'descripcion', array('maxlength' => 500, 'class' => 'form-control', 'rows' => '3')); ?>
            <?php echo $form->error($model, 'descripcion'); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <?php echo CHtml::submitButton('Agendar Cita', array('class' => 'btn btn-primary')); ?>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>

<!-- Modal -->
<?php //echo $this->renderPartial('_buscar', array('model' => $model)); ?>
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
                                <a href="" onclick="_buscar()">
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
<!-- fin modal -->

<script type="text/javascript">

    var _tipo;
    
    function toggleModal(tipo){
        
        _tipo = tipo;
        
        if(tipo === 'profesional'){
           $('#modalTittle').html('Seleccione Profesional'); 
           $('#btnAgregar').attr('href', '/gestionclinicas/profesionales/crear');
        }else{
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

    $(function() {
        $('#from').datetimepicker({
            language: 'es',
            minDate: new Date()
        });
        $('#to').datetimepicker({
            language: 'es',
            minDate: new Date()
        });

    });

</script>