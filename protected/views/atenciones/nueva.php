<?php
/* @var $this AtencionesController */
/* @var $model Atenciones */

Yii::app()->params['moduloActivo'] = $this->selectedItem;

$this->breadcrumbs=array(
	'Atenciones'=>array('index'),
	'Paciente ' . $this->rutPaciente => array(Yii::app()->createUrl('/pacientes/detalles/' .$this->rutPaciente)),
        'Atención Médica'
);

?>

<h1>Atención Médica Paciente #<?php echo $this->rutPaciente ?></h1>
<hr>
<div class="row">
    <div class="col-md-9">
        <?php $this->renderPartial('_form', array('model' => $model)); ?>
    </div>
    <div class="col-md-3">
        <div class="panel panel-primary">
            <div class="panel-heading">Operaciones</div>
            <div class="panel-body">
                <?php
                echo CHtml::link('Ver Datos de Paciente', '/gestionclinicas/pacientes/detalles/' . $this->rutPaciente) . '<br>';
                echo CHtml::link('Ver datos clínicos', '/gestionclinicas/antecedentesmedicos/ver/' . $this->rutPaciente) . '<br>';
                echo CHtml::link('Completar datos clínicos', '/gestionclinicas/antecedentesmedicos/crear/' .$this->rutPaciente) . '<br>';
                echo CHtml::link('Volver', Yii::app()->request->urlReferrer);
                ?>
            </div>
        </div>
    </div>
</div>