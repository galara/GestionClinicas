<?php

Yii::app()->params['moduloActivo'] = 'mantenedores';

$this->breadcrumbs = array(
    'Regiones' => array('index'),
    $model->id,
);
?>

<!-- Mensajes cambiar el metodo para mostrar por otro validado -->
<?php if (isset($this->mensaje)): ?>
    <div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        La región ha sido creada exitosamente
    </div>
<?php endif; ?>
<!-- fin mensajes -->

<h1>Detalles Región #<?php echo $model->id; ?></h1>

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
                        <td>Nombre:</td><td><?php echo $model->region ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <a href="/gestionclinicas/regiones/editar/<?php echo $model->id ?>" class="btn btn-primary">
            <span class="glyphicon glyphicon-pencil"></span>&nbsp; Modificar
        </a>
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
    </div>
</div>
