<?php
/* @var $this AntecedentesMedicosController */
/* @var $model AntecedentesMedicos */
Yii::app()->params['moduloActivo'] = 'pacientes';

$this->breadcrumbs = array(
    'Pacientes' => array('/pacientes'),
    'Paciente ' . ' ' . $this->_rutPaciente => array('/pacientes/detalles/' . $this->_rutPaciente ),
    'Antecedentes Médicos',
);
?>

<!-- Mensajes de informacion -->
<?php if (!is_null($this->_mensaje)): ?>
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <?php echo $this->_mensaje ?>
    </div>
<?php endif; ?>
<!-- fin mensajes de informacion -->

<h1>Detalles Paciente Rut: <?php echo $this->_rutPaciente; ?></h1>
<hr>

<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">
                        <strong>
                            Estatura:
                        </strong>
                    </div>
                    <div class="col-md-3">
                        <?php echo $model->estatura . '  cms'?> 
                    </div>
                    <div class="col-md-3">
                        <strong>
                            Peso:
                        </strong>
                    </div>
                    <div class="col-md-3">
                        <?php echo $model->peso . ' Kg'?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <strong>
                            Alergias:
                        </strong>
                    </div>
                    <div class="col-md-12">
                        <?php echo $model->alergias?> 
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <strong>
                            Antecedentes Personales:
                        </strong>
                    </div>
                    <div class="col-md-12">
                        <?php echo $model->antecedentes_personales?> 
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <strong>
                            Antecedentes Familiares:
                        </strong>
                    </div>
                    <div class="col-md-12">
                        <?php echo $model->antecedentes_familiares?> 
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <strong>
                            Hábitos Tóxicos:
                        </strong>
                    </div>
                    <div class="col-md-12">
                        <?php echo $model->habitos_toxicos?> 
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <strong>
                            Exámen Físico:
                        </strong>
                    </div>
                    <div class="col-md-12">
                        <?php echo $model->examen_fisico?> 
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <strong>
                            Acotaciones:
                        </strong>
                    </div>
                    <div class="col-md-12">
                        <?php echo $model->acotaciones?> 
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
                echo CHtml::link('Completar Datos Médicos', '/gestionclinicas/pacientes/crear') . '<br>';
                echo CHtml::link('Volver', Yii::app()->request->urlReferrer);
                ?>
            </div>
        </div>
        <a href="/gestionclinicas/antecedentesmedicos/editar/<?php echo $this->_rutPaciente ?>" class="btn btn-primary">
            <span class="glyphicon glyphicon-pencil"></span>&nbsp; Editar Datos
        </a>
    </div>
</div>
