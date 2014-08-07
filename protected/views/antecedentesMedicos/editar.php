<?php
/* @var $this AntecedentesMedicosController */
/* @var $model AntecedentesMedicos */
Yii::app()->params['moduloActivo'] = 'pacientes';

$this->breadcrumbs = array(
    'Pacientes' => array('/pacientes'),
    'Paciente ' . ' ' . $this->_rutPaciente => array('/pacientes/detalles/' . $this->_rutPaciente ),
    'Modificar Antecedentes Médicos',
);
?>

<h1>Modificar Antecedentes Médicos paciente rut: <?php echo $this->_rutPaciente ?></h1>
<hr>
<div class="row">
    <div class="col-md-9">
        <?php $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
    <div class="col-md-3">
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