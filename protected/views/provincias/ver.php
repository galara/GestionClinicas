<?php
/* @var $this ProvinciasController */
/* @var $model Provincias */
Yii::app()->params['moduloActivo'] = $this->selectedItem;

$this->breadcrumbs = array(
    'Provincias' => array('index'),
    $model->Provincia,
);

?>

<h1>Detalles Provincia #<?php echo $model->id; ?></h1>
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
                        <td>Nombre:</td><td><?php echo $model->Provincia ?></td>
                    </tr>
                    <tr>
                        <td>Región:</td><td><?php echo $model->fkRegion->region ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <a href="/gestionclinicas/provincias/editar/<?php echo $model->id ?>" class="btn btn-primary">
            <span class="glyphicon glyphicon-pencil"></span>&nbsp; Modificar
        </a>
    </div>
    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">Operaciones</div>
            <div class="panel-body">
                <?php
                echo CHtml::link('Listar', '/gestionclinicas/provincias/') . '<br>';
                echo CHtml::link('Crear', '/gestionclinicas/provincias/nueva') . '<br>';
                echo CHtml::link('Volver', Yii::app()->request->urlReferrer);
                ?>
            </div>
        </div>
    </div>
</div>
