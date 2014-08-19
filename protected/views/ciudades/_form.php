<?php
/* @var $this CiudadesController */
/* @var $model Ciudades */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'ciudades-form',
        'enableAjaxValidation' => true,
    ));
    ?>

    <?php
    CHtml::$errorSummaryCss = 'alert alert-warning';
    CHtml::$errorContainerTag = 'p';
    echo $form->errorSummary($model, 'Se han detectado los siguientes errores:', '', array());
    ?>
    
    <p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'ciudad') ?>
        <?php echo $form->textField($model, 'ciudad', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'ciudad', array('class' => 'text-danger')); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'id_comuna') ?>
        <?php echo $form->dropDownList($model, 'id_comuna', CHtml::listData(Comunas::model()->findAll(), 'id', 'comuna'), array('class' => 'form-control', 'prompt' => 'Seleccione...')); ?>
        <?php echo $form->error($model, 'id_comuna', array('class' => 'text-danger')); ?>
    </div>

    <?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Guardar cambios', array('class' => 'btn btn-primary')); ?>

    <?php $this->endWidget(); ?>

</div>
<!-- form -->