<?php
/* @var $this PacientesController */
/* @var $model Pacientes */
Yii::app()->params['moduloActivo'] = 'pacientes';

$this->breadcrumbs = array(
    'Pacientes' => array('index'),
    $model->rut,
);
?>

<h1>Detalles Paciente Rut: <?php echo $model->rut; ?></h1>

<hr>

<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">
                        <a href="#" class="thumbnail">
                            <img data-src="holder.js/100%x150" alt="...">
                        </a>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12">
                                Datos Personales:
                            </div>
                        </div>
                        <hr>
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
                        <div class="row">
                            <div class="col-md-6">
                                <strong>
                                    Fecha de Nacimiento:
                                </strong>                                
                                <?php echo $model->fecha_nacimiento ?>
                            </div>
                            <div class="col-md-6">
                                <strong>
                                    Sexo: <br> 
                                </strong>
                                <?php echo $model->fkSexo->sexo ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <strong>
                                    Estado Civil: <br> 
                                </strong>
                                <?php echo $model->fkEstadoCivil->estado_civil ?>
                            </div>
                            <div class="col-md-6">
                                <strong>
                                    Previsión: <br> 
                                </strong>
                                <?php echo $model->fkPrevision->prevision ?>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        Contacto
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <strong>
                            Celular <br> 
                        </strong>
                        <?php echo $model->celular ?>
                    </div>
                    <div class="col-md-3">
                        <strong>
                            Telefono <br> 
                        </strong>
                        <?php echo $model->telefono ?>
                    </div>
                    <div class="col-md-3">
                        <strong>
                            Cel. Familiar <br> 
                        </strong>
                        <?php echo $model->celular_contacto ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <strong>
                            Dirección: <br>
                        </strong>
                        <?php echo $model->direccion ?>
                    </div>
                    <div class="col-md-4">
                        <strong>
                            Ciudad: <br>
                        </strong>
                        <?php echo $model->fkCiudad->ciudad ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        Datos Médicos
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        Edad: <br>
                        00 
                    </div>
                    <div class="col-md-3">
                        Estatura: <br>
                        <?php echo $model->estatura . ' ' . 'Cm.' ?>
                    </div>
                    <div class="col-md-3">
                        Peso: <br>
                        <?php echo $model->peso . ' ' . 'Kg.' ?>
                    </div>
                </div>
                <hr>
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
                echo CHtml::link('Volver', Yii::app()->request->urlReferrer);
                ?>
            </div>
        </div>
        <a href="/gestionclinicas/pacientes/editar/<?php echo $model->rut ?>" class="btn btn-primary">
            <span class="glyphicon glyphicon-pencil"></span>&nbsp; Editar Datos
        </a>
    </div>
</div>
