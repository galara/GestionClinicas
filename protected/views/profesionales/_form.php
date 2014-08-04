<?php
/* @var $this ProfesionalesController */
/* @var $model Profesionales */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'profesionales-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

    <?php
// echo $form->errorSummary($model); 
    CHtml::$errorContainerTag = 'p';
    ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="#" class="thumbnail">
                                <img data-src="holder.js/100%x200" alt="...">
                            </a>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-12">
                                    Datos Personales:
                                </div>
                            </div>
                            <hr>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <?php echo $form->labelEx($model, 'rut'); ?>
                                    <?php echo $form->textField($model, 'rut', array('size' => 12, 'maxlength' => 12, 'class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'rut', array('class' => 'text-danger')); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <?php echo $form->labelEx($model, 'nombre_1'); ?>
                                    <?php echo $form->textField($model, 'nombre_1', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'nombre_1', array('class' => 'text-danger')); ?>
                                </div>
                                <div class="col-md-6 form-group">
                                    <?php echo $form->labelEx($model, 'nombre_2'); ?>
                                    <?php echo $form->textField($model, 'nombre_2', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'nombre_2', array('class' => 'text-danger')); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <?php echo $form->labelEx($model, 'apellido_paterno'); ?>
                            <?php echo $form->textField($model, 'apellido_paterno', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'apellido_paterno', array('class' => 'text-danger')); ?>
                        </div>
                        <div class="col-md-6 form-group">
                            <?php echo $form->labelEx($model, 'apellido_materno'); ?>
                            <?php echo $form->textField($model, 'apellido_materno', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'apellido_materno', array('class' => 'text-danger')); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <?php echo $form->labelEx($model, 'fecha_nacimiento'); ?>
                            <?php echo $form->dateField($model, 'fecha_nacimiento', array('class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'fecha_nacimiento', array('class' => 'text-danger')); ?>
                        </div>                   
                        <div class="col-md-6 form-group">
                            <?php echo $form->labelEx($model, 'id_sexo'); ?>
                            <?php echo $form->dropDownList($model, 'id_sexo', array(CHtml::listData(Sexo::model()->findAll(), 'id', 'sexo')), array('class' => 'form-control')) ?>
                            <?php echo $form->error($model, 'id_sexo', array('class' => 'text-danger')); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <?php echo $form->labelEx($model, 'id_especialidad_medica'); ?>
                            <?php echo $form->dropDownList($model, 'id_especialidad_medica', array(CHtml::listData(EspecialidadesMedicas::model()->findAll(), 'id', 'especialidad')), array('class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'id_especialidad_medica', array('class' => 'text-danger')); ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            Nueva Contraseña:
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <?php echo $form->labelEx($model, 'pass'); ?>
                            <?php echo $form->passwordField($model, 'celular', array('size' => 13, 'maxlength' => 13, 'class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'celular', array('class' => 'text-danger')); ?>
                        </div>
                        <div class="col-md-6 form-group">
                            <?php echo $form->labelEx($model, 'pass'); ?>
                            <?php echo $form->passwordField($model, 'telefono', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'telefono', array('class' => 'text-danger')); ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            Datos de contacto:
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <?php echo $form->labelEx($model, 'celular'); ?>
                            <?php echo $form->textField($model, 'celular', array('size' => 13, 'maxlength' => 13, 'class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'celular', array('class' => 'text-danger')); ?>
                        </div>
                        <div class="col-md-6 form-group">
                            <?php echo $form->labelEx($model, 'telefono'); ?>
                            <?php echo $form->textField($model, 'telefono', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'telefono', array('class' => 'text-danger')); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <?php echo $form->labelEx($model, 'email'); ?>
                            <?php echo $form->emailField($model, 'email', array('size' => 45, 'maxlength' => 45, 'type' => 'email', 'class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'direccion', array('class' => 'text-danger')); ?>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-md-8 form-group">
                            <?php echo $form->labelEx($model, 'direccion'); ?>
                            <?php echo $form->textField($model, 'direccion', array('size' => 60, 'maxlength' => 80, 'class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'direccion', array('class' => 'text-danger')); ?>
                        </div>
                        <div class="col-md-4 form-group">
                            <?php echo $form->labelEx($model, 'id_ciudad'); ?>
                            <?php echo $form->dropDownList($model, 'id_ciudad', array(CHtml::listData(Ciudades::model()->findAll(), 'id', 'ciudad')), array('class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'id_ciudad', array('class' => 'text-danger')); ?>
                        </div>
                    </div>                   
                    <hr>
                </div>
            </div>
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar Datos' : 'Guardar cambios', array('class' => 'btn btn-primary')); ?>
        </div>
    </div>

    <?php $this->endWidget(); ?>

</div>
<!-- form -->