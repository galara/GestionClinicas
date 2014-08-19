<?php
/* @var $this CiudadesController */
/* @var $model Ciudades */

Yii::app()->params['moduloActivo'] = $this->selectedItem; 

$this->breadcrumbs = array(
    'Ciudades' => array('index'),
    $model->ciudad . ' ' . $model->id => array('ciudades/ver/' . $model->id),
    'Editar',
);

?>

<h1>Modificar Ciudad #<?php echo $model->id; ?></h1>
<hr>
<div class="row">
    <div class="col-md-7">
        <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
    </div>
    <div class="col-md-4 col-md-offset-1">
        <div class="panel panel-primary">
            <div class="panel-heading">Operaciones</div>
            <div class="panel-body">
                <?php
                echo CHtml::link('Listar', '/gestionclinicas/ciudades/') . '<br>';
                echo CHtml::link('Crear', '/gestionclinicas/ciudades/nueva') . '<br>';
                echo CHtml::link('Volver', Yii::app()->request->urlReferrer);
                ?>
            </div>
        </div>
        <?php
        ?> 
    </div>
</div>