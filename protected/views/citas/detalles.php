<h2>Detalles Cita #<?php echo $model->id; ?></h2>

<div class="col-md-12">
    <hr>
    <div class="col-md-12">
        <label>
            Profesional:
        </label>
        <label>
            <?php echo $model->fkProfesional->nombre_1 . ' ' . $model->fkProfesional->apellido_paterno ?>
        </label>
    </div>
    <div class="col-md-12">
        <label>
            Paciente:
        </label>
        <label>
            <?php echo $model->fkPaciente->nombre_1 . ' ' . $model->fkPaciente->apellido_paterno ?>
        </label>
    </div>
    <div class='col-md-12'>
        <label>
            Hora de Inicio:
        </label>
        <label>
            <?php echo $model->hora_inicio ?>
        </label>
    </div>
    <div class='col-md-12'>
        <label>
            Hora de Inicio:
        </label>
        <label>
            <?php echo $model->hora_termino ?>
        </label>
    </div>
    <div class='col-md-12'>
        <label>
            Motivo:
        </label>
        <label>
            <?php echo $model->motivo ?>
        </label>
    </div>
    <div class='col-md-12'>
        <label>
            Descripción:
        </label>
        <label>
            <?php echo $model->descripcion ?>
        </label>
    </div>
</div>

<div class="col-md-12">
    <hr>
    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    <?php echo CHtml::link('Editar Cita', '/gestionclinicas/citas/editar/' . $model->id, array('class'=>'btn btn-primary'))?>
    <?php echo CHtml::link('Tomar Cita', Yii::app()->createUrl('/atenciones/nueva/' . $model->rut_paciente . '?cita=' . $model->id), array('class'=>'btn btn-success'))?>
</div>