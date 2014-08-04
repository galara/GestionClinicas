<?php
/* @var $this ProfesionalesController */
/* @var $model Profesionales */
Yii::app()->params['moduloActivo'] = $this->selectedItem;

$this->breadcrumbs = array(
    'Profesionales' => array('index'),
    'Nuevo Profesional',
);
?>

<h1>Nuevo Profesional Médico</h1>
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
                echo CHtml::link('Ver todos', '/gestionclinicas/profesionales/') . '<br>';
                echo CHtml::link('Completar datos clínicos', '/gestionclinicas/') . '<br>';
                echo CHtml::link('Volver', Yii::app()->request->urlReferrer);
                ?>
            </div>
        </div>
    </div>
</div>