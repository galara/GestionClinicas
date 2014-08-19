<?php
/* @var $this DiagnosticosController */
/* @var $model Diagnosticos */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'diagnosticos-form',
        'enableAjaxValidation' => true,
    ));
    ?>

    <?php
    CHtml::$errorSummaryCss = 'alert alert-warning';
    CHtml::$errorContainerTag = 'p';
    echo $form->errorSummary($model, 'Se han detectado los siguientes errores:', '', array());
    ?>

    <p class="note">Campos con <span class="required">*</span> son requeridos.</p>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'diagnostico') ?>
        <?php echo $form->textField($model, 'diagnostico', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'diagnostico', array('class' => 'text-danger')); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'id_categoria') ?>
        <?php echo $form->dropDownList($model, 'id_categoria', CHtml::listData(CategoriasDiagnosticos::model()->findAll(), 'id', 'categoria'), array('class' => 'form-control', 'prompt' => 'Seleccione...')); ?>
        <?php echo $form->error($model, 'id_categoria', array('class' => 'text-danger')); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'descripcion'); ?>
        <?php echo $form->textArea($model, 'descripcion', array('size' => 500, 'maxlength' => 500, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'descripcion', array('class' => 'text-danger')); ?>
    </div>
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Guardar cambios', array('class' => 'btn btn-primary')); ?>
    <?php $this->endWidget(); ?>

</div>
<!-- form -->