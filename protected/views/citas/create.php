<?php
/* @var $this CitasController */
/* @var $model Citas */
Yii::app()->params['moduloActivo'] = $this->selectedItem;

$this->breadcrumbs = array(
    'Citas' => array('index'),
    'Agendar Cita',
);
?>

<div class="col-md-12">
    <h1>Agendar Cita</h1>
    <hr>
</div>
<div class="row">
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
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