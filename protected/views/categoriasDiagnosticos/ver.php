<?php
/* @var $this CategoriasDiagnosticosController */
/* @var $model CategoriasDiagnosticos */
Yii::app()->params['moduloActivo'] = $this->selectedItem;

$this->breadcrumbs=array(
	'Categorias Diagnosticos'=>array('index'),
	$model->categoria,
);
?>

<h1>Detalles Categoría #<?php echo $model->id; ?></h1>

<hr>

<div class="row">
    <div class="col-md-7">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-hover">
                    <tr>
                        <td>ID:</td><td><?php echo $model->id ?></td>
                    </tr>
                    <tr>
                        <td>Categoría:</td><td><?php echo $model->categoria ?></td>
                    </tr>
                    <tr>
                        <td>Descripción:</td><td><?php echo $model->descripcion ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <a href="/gestionclinicas/categoriasdiagnosticos/editar/<?php echo $model->id ?>" class="btn btn-primary">
            <span class="glyphicon glyphicon-pencil"></span>&nbsp; Modificar
        </a>
    </div>
    <div class="col-md-3 col-md-offset-1">
        <div class="panel panel-primary">
            <div class="panel-heading">Operaciones</div>
            <div class="panel-body">
                <?php
                echo CHtml::link('Listar', '/gestionclinicas/categoriasdiagnosticos/') . '<br>';
                echo CHtml::link('Crear', '/gestionclinicas/categoriasdiagnosticos/nuevo') . '<br>';
                echo CHtml::link('Volver', Yii::app()->request->urlReferrer);
                ?>
            </div>
        </div>
    </div>
</div>
