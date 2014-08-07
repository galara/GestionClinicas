<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'citas-form',
    'enableAjaxValidation' => true,
        ));
?>

<?php echo $form->errorSummary($model, '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>', '', array('class' => 'alert alert-info alert-dismissible')); ?>

<div class="col-sm-9">
    <div class='col-md-6'>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'rut_paciente'); ?>
            <div class='input-group'>
                <?php echo $form->textField($model, 'rut_paciente', array('maxlength' => 12, 'class' => 'form-control', 'id' => 'clavePaciente')); ?>
                <span class="input-group-addon" >
                    <a href="" >
                        <span class="glyphicon glyphicon-search" onclick="buscar('paciente')"></span>
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
                <?php echo $form->textField($model, 'rut_profesional', array('maxlength' => 12, 'class' => 'form-control', 'id' => 'claveProfesional')); ?>
                <span class="input-group-addon" >
                    <a href="" >
                        <span class="glyphicon glyphicon-search" data-toggle="modal" data-target="#modalBuscar"></span>
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
            <?php echo $form->dropDownList($model, 'id_tipo_cita', array(CHtml::listData(TipoCita::model()->findAll(), 'id', 'tipo_cita')), array('class' => 'form-control')); ?>
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
            <?php echo CHtml::submitButton('Guardar cambios', array('class' => 'btn btn-primary')); ?>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>

<!-- Modal -->
<div class="modal fade" id="modalBuscar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <?php echo $this->renderPartial('_buscar', array('model' => $model)); ?>
    <!-- <div class="modal-dialog">
        <div class="col-md-12">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Buscar Profesional</h4>
                </div>
                <div class="modal-body" id="dataTarget">
    <?php //echo $this->renderPartial('_buscar', array('model' => null)); ?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <a href="#" class="btn btn-primary" id="deleteButton">Aceptar</a>
                </div>
            </div>
        </div>
    </div> -->
</div>
<!-- fin modal -->

<script type="text/javascript">

    //peticion ajax para buscar profesionales o pacientes
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

     function add(rut, tipo) {

        if (tipo === 'profesional')
            $('#rutProfesional').value = rut;
        else
            $('#rutPaciente').value = rut;

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