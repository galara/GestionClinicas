<?php
$this->breadcrumbs = array(
    'Regiones' => array('index'),
    'Editar',
);
?>

<h1>Editar Región #<?php echo $model->id; ?></h1>
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
                echo CHtml::link('Listar', '/gestionclinicas/regiones/') . '<br>';
                echo CHtml::link('Crear', '/gestionclinicas/regiones/create') . '<br>';
                echo CHtml::link('Volver', Yii::app()->request->urlReferrer);
                ?>
            </div>
        </div>
        <?php
        ?> 
    </div>
</div>