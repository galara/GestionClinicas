<?php
/* @var $this ProvinciasController */
/* @var $model Provincias */
Yii::app()->params['moduloActivo'] = $this->selectedItem; 

$this->breadcrumbs = array(
    'Provincias' => array('index'),
    'Nueva',
);

?>

<h1>Agregar Provincia</h1>
<hr>
<div class="row">
    <div class="col-md-8">
        <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
    </div>  
    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">Operaciones</div>
            <div class="panel-body">
                <?php
                echo CHtml::link('Listar', '/gestionclinicas/provincias/') . '<br>';
                echo CHtml::link('Volver', Yii::app()->request->urlReferrer);
                ?>
            </div>
        </div>
        <?php
        ?> 
    </div>
</div>