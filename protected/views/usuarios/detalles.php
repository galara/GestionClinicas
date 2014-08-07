<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */

Yii::app()->params['moduloActivo'] = $this->selectedItem;

$this->breadcrumbs = array(
    'Usuarios' => array('index'),
    $model->rut,
);
?>

<h1>Detalles Usuario Rut: <?php echo $model->rut; ?></h1>
<hr>

<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <strong>
                            Nombres:
                        </strong>
                    </div>
                    <div class="col-md-12">
                        <?php echo $model->nombre_1 . ' ' . $model->nombre_2 . ' ' . $model->apellido_paterno . ' ' . $model->apellido_materno ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <strong>
                            Celular:<br>
                        </strong> 
                        <?php echo $model->calular ?>
                    </div>
                    <div class="col-md-4">
                        <strong>
                            Teléfono:<br>
                        </strong> 
                        <?php echo $model->telefono ?>
                    </div>
                    <div class="col-md-4">
                        <strong>
                            Email: <br> 
                        </strong>
                        <?php echo $model->email ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-8">
                        <strong>
                            Dirección:<br>
                        </strong> 
                        <?php echo $model->direccion ?>
                    </div>
                    <div class="col-md-4">
                        <strong>
                            Ciudad:<br>
                        </strong> 
                        <?php echo $model->fkCiudad->ciudad ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <strong>
                            Sexo:<br>
                        </strong> 
                        <?php echo $model->fkSexo->sexo ?>
                    </div>
                    <div class="col-md-6">
                        <strong>
                            Contraseña:<br>
                        </strong> 
                        <?php echo $model->pass ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">Operaciones</div>
            <div class="panel-body">
                <?php
                echo CHtml::link('Pacientes', '/gestionclinicas/pacientes/') . '<br>';
                echo CHtml::link('Nuevo Paciente', '/gestionclinicas/pacientes/crear') . '<br>';
                echo CHtml::link('Completar Datos Médicos', '/gestionclinicas/antecedentesmedicos/crear/' . $model->rut) . '<br>';
                echo CHtml::link('Ver Datos Médicos', '/gestionclinicas/antecedentesmedicos/ver/' . $model->rut) . '<br>';
                echo CHtml::link('Volver', Yii::app()->request->urlReferrer);
                ?>
            </div>
        </div>
        <a href="/gestionclinicas/usuarios/editar/<?php echo $model->rut ?>" class="btn btn-primary">
            <span class="glyphicon glyphicon-pencil"></span>&nbsp; Editar Datos
        </a>
    </div>
</div>
