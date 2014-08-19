<?php
/* @var $this ComunasController */
/* @var $model Comunas */
Yii::app()->params['moduloActivo'] = $this->selectedItem; 

$this->breadcrumbs = array(
    'Comunas' => array('index'),
    $model->comuna=> array('comunas/ver/' . $model->id),
    'Editar',
);
?>

<h1>Modificar Comuna #<?php echo $model->id; ?></h1>
<hr>
<div class="row">
    <div class="col-md-7">
        <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
    </div>
    <div class="col-md-3 col-md-offset-1">
        <div class="panel panel-primary">
            <div class="panel-heading">Operaciones</div>
            <div class="panel-body">
                <?php
                echo CHtml::link('Listar', '/gestionclinicas/comunas/') . '<br>';
                echo CHtml::link('Crear', '/gestionclinicas/comunas/nueva') . '<br>';
                echo CHtml::link('Volver', Yii::app()->request->urlReferrer);
                ?>
            </div>
        </div>
        <?php
        ?> 
    </div>
</div>