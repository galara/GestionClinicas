<?php
/* @var $this CategoriasDiagnosticosController */
/* @var $model CategoriasDiagnosticos */

Yii::app()->params['moduloActivo'] = $this->selectedItem;

$this->breadcrumbs = array(
    'Categorías Diagnósticos' => array('index'),
    $model->categoria => array('categoriasdiagnosticos/ver/' . $model->id),
    'Editar',
);
?>

<h1>Modificar Categogía de Diagnóstico #<?php echo $model->id; ?></h1>
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
                echo CHtml::link('Listar', '/gestionclinicas/categoriasdiagnosticos/') . '<br>';
                echo CHtml::link('Crear', '/gestionclinicas/categoriasdiagnosticos/nueva') . '<br>';
                echo CHtml::link('Volver', Yii::app()->request->urlReferrer);
                ?>
            </div>
        </div>
        <?php
        ?> 
    </div>
</div>