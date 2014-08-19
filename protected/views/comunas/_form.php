<?php
/* @var $this ComunasController */
/* @var $model Comunas */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'comunas-form',
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
        <?php echo $form->labelEx($model, 'comuna') ?>
        <?php echo $form->textField($model, 'comuna', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'comuna', array('class' => 'text-danger')); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'id_provincia') ?>
        <?php echo $form->dropDownList($model, 'id_provincia', CHtml::listData(Provincias::model()->findAll(), 'id', 'Provincia'), array('class' => 'form-control', 'prompt' => 'Seleccione...')); ?>
        <?php echo $form->error($model, 'id_provincia', array('class' => 'text-danger')); ?>
    </div>
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Guardar cambios', array('class' => 'btn btn-primary')); ?>
    <?php $this->endWidget(); ?>

</div>
<!-- form -->