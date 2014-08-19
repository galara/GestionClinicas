<?php
/* @var $this ProvinciasController */
/* @var $model Provincias */
/* @var $form CActiveForm */
?>
<!-- form -->
<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'provincias-form',
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
        <?php echo $form->labelEx($model, 'id') ?>
        <?php echo $form->textField($model, 'id', array('size' => 45, 'maxlength' => 3, 'class' => 'form-control',  'readonly' => $model->isNewRecord ? '' : 'readonly')); ?>
        <?php echo $form->error($model, 'id', array('class' => 'text-danger')); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'Provincia') ?>
        <?php echo $form->textField($model, 'Provincia', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'Provincia', array('class' => 'text-danger')); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'id_region') ?>
        <?php echo $form->dropDownList($model, 'id_region', CHtml::listData(Regiones::model()->findAll(), 'id', 'region'), array('class' => 'form-control', 'prompt' => 'Seleccione...')); ?>
        <?php echo $form->error($model, 'id_region', array('class' => 'text-danger')); ?>
    </div>

    <?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Guardar cambios', array('class' => 'btn btn-primary')); ?>

    <?php $this->endWidget(); ?>

</div>
<!-- form -->