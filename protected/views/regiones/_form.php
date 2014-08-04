<?php Yii::app()->params['moduloActivo'] = 'mantenedores'; ?>

<div class="">
    <?php
    CHtml::$errorContainerTag = 'p';
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'regiones-form',
        'enableAjaxValidation' => true,
    ));
    ?>

    <p class="note">Campos con <span class="required">*</span> son requeridos.</p>

    <?php // echo $form->errorSummary($model, '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>', '', array('class' => 'alert alert-info alert-dismissible')); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'id') ?>
        <?php echo $form->textField($model, 'id', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'id', array('class' => 'text-danger')); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'region') ?>
        <?php echo $form->textField($model, 'region', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'region', array('class' => 'text-danger')); ?>
    </div>

    <?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Guardar cambios', array('class' => 'btn btn-primary')); ?>

    <?php $this->endWidget(); ?>
</div>


<!-- form -->