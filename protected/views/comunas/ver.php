<?php
/* @var $this ComunasController */
/* @var $model Comunas */
Yii::app()->params['moduloActivo'] = $this->selectedItem;

$this->breadcrumbs=array(
	'Comunas'=>array('index'),
	$model->comuna,
);

?>

<h1>Detalles Comuna #<?php echo $model->id; ?></h1>

<hr>

<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-hover">
                    <tr>
                        <td>ID:</td><td><?php echo $model->id ?></td>
                    </tr>
                    <tr>
                        <td>Nombre:</td><td><?php echo $model->comuna ?></td>
                    </tr>
                    <tr>
                        <td>Provincia:</td><td><?php echo $model->fkProvincia->Provincia ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <a href="/gestionclinicas/comunas/editar/<?php echo $model->id ?>" class="btn btn-primary">
            <span class="glyphicon glyphicon-pencil"></span>&nbsp; Modificar
        </a>
    </div>
    <div class="col-md-4">
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
    </div>
</div>
