<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'usuarios-form',
        'enableAjaxValidation' => true,
    ));
    ?>

    <?php
    CHtml::$errorSummaryCss = 'alert alert-warning';
    CHtml::$errorContainerTag = 'p';
    echo $form->errorSummary($model, 'Se han detectado los siguientes errores:', '', array());
    ?>
    
    <p class="note">Campos con <span class="required">*</span> son obligatorios.</p>
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row form-group">
                        <div class="col-md-6">
                            <?php echo $form->labelEx($model, 'rut'); ?>
                            <?php echo $form->textField($model, 'rut', array('size' => 12, 'maxlength' => 12, 'class' => 'form-control', 'readonly' => $model->isNewRecord ? '' : 'readonly', 'placeholder' => 'Ej:11222333-4')); ?>
                            <?php echo $form->error($model, 'rut', array('class' => 'text-danger')); ?>
                        </div>
                    </div> 
                    <div class="row form-group">
                        <div class="col-md-6">
                            <?php echo $form->labelEx($model, 'nombre_1'); ?>
                            <?php echo $form->textField($model, 'nombre_1', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'nombre_1', array('class' => 'text-danger')); ?>
                        </div>
                        <div class="col-md-6">
                            <?php echo $form->labelEx($model, 'nombre_2'); ?>
                            <?php echo $form->textField($model, 'nombre_2', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'nombre_2', array('class' => 'text-danger')); ?>
                        </div>
                    </div> 
                    <div class="row form-group">
                        <div class="col-md-6">
                            <?php echo $form->labelEx($model, 'apellido_paterno'); ?>
                            <?php echo $form->textField($model, 'apellido_paterno', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'apellido_paterno', array('class' => 'text-danger')); ?>
                        </div>
                        <div class="col-md-6">
                            <?php echo $form->labelEx($model, 'apellido_materno'); ?>
                            <?php echo $form->textField($model, 'apellido_materno', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'apellido_materno', array('class' => 'text-danger')); ?>
                        </div>
                    </div> 
                    <div class="row form-group">
                        <div class="col-md-6">
                            <?php echo $form->labelEx($model, 'calular'); ?>
                            <?php echo $form->textField($model, 'calular', array('size' => 9, 'maxlength' => 9, 'class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'calular', array('class' => 'text-danger')); ?>
                        </div>
                        <div class="col-md-6">
                            <?php echo $form->labelEx($model, 'telefono'); ?>
                            <?php echo $form->textField($model, 'telefono', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'telefono', array('class' => 'text-danger')); ?>
                        </div>
                    </div> 
                    <div class="row form-group">
                        <div class="col-md-6">
                            <?php echo $form->labelEx($model, 'email'); ?>
                            <?php echo $form->textField($model, 'email', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'email', array('class' => 'text-danger')); ?>
                        </div>
                        <div class="col-md-6">
                            <?php echo $form->labelEx($model, 'id_sexo'); ?>
                            <?php echo $form->dropDownList($model, 'id_sexo', CHtml::listData(Sexo::model()->findAll(), 'id', 'sexo'), array('class' => 'form-control', 'prompt' => 'Seleccione...')) ?>
                            <?php echo $form->error($model, 'id_sexo', array('class' => 'text-danger')); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <?php echo $form->labelEx($model, 'pass'); ?>
                            <?php echo $form->passwordField($model, 'pass', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'pass', array('class' => 'text-danger')); ?>
                        </div>
                        <div class="col-md-6">
                            <?php echo $form->labelEx($model, 'pass_repeat'); ?>
                            <?php echo $form->passwordField($model, 'pass_repeat', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'pass_repeat', array('class' => 'text-danger')); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-8">
                            <?php echo $form->labelEx($model, 'direccion'); ?>
                            <?php echo $form->textField($model, 'direccion', array('size' => 60, 'maxlength' => 150, 'class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'direccion', array('class' => 'text-danger')); ?>
                        </div>
                        <div class="col-md-4">
                            <?php echo $form->labelEx($model, 'id_ciudad'); ?>
                            <?php echo $form->dropDownList($model, 'id_ciudad', CHtml::listData(Ciudades::model()->findAll(), 'id', 'ciudad'), array('class' => 'form-control', 'prompt' => 'Seleccione...')); ?>
                            <?php echo $form->error($model, 'id_ciudad', array('class' => 'text-danger')); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar Datos' : 'Guardar cambios', array('class' => 'btn btn-primary')); ?>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div><!-- form -->