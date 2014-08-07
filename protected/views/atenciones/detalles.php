<?php
/* @var $this AtencionesController */
/* @var $model Atenciones */

Yii::app()->params['moduloActivo'] = $this->selectedItem;

$this->breadcrumbs = array(
    'Atenciones' => array('index'),
    'Detalle Atención #' . $model->id,
);
?>

<h1>Detalle Atención #<?php echo $model->id ?></h1>

<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <label>
                            Fecha:
                        </label>
                        <br>
                        <?php echo date('d-m-Y', strtotime($model->fecha)) ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <label>
                            Médico Tratante:
                        </label>
                        <br>
                        <?php echo $model->fkProfesional->nombre_1 . ' ' . $model->fkProfesional->apellido_paterno ?>
                    </div>
                    <div class="col-md-6">
                        <label>
                            Paciente:
                        </label>
                        <br>
                        <?php echo $model->fkPaciente->nombre_1 . ' ' . $model->fkPaciente->apellido_paterno ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <label>
                            Síntomas:
                        </label>
                        <br>
                        <?php echo $model->sintomas ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <label>
                            Diagnóstico:
                        </label>
                        <br>
                        <?php echo $model->fkDiagnostico->diagnostico ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <label>
                            Tratamiento Recetado:
                        </label>
                        <br>
                        <?php echo $model->tratamiento ?>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">Operaciones</div>
            <div class="panel-body">
                <?php
                echo CHtml::link('Ver todos', '/gestionclinicas/pacientes/') . '<br>';
                echo CHtml::link('Completar datos clínicos', '/gestionclinicas/') . '<br>';
                echo CHtml::link('Volver', Yii::app()->request->urlReferrer);
                ?>
            </div>
        </div>
    </div>
</div>