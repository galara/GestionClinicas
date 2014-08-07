<?php
/* @var $this AntecedentesMedicosController */
/* @var $model AntecedentesMedicos */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'antecedentes-medicos-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

    <?php
    CHtml::$errorContainerTag = 'p';
    echo $form->errorSummary($model);
    ?>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6 form-group">
                    <?php echo $form->labelEx($model, 'estatura'); ?>
                    <?php echo $form->textField($model, 'estatura', array('class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'estatura'); ?>
                </div>
                <div class="col-md-6 form-group">
                    <?php echo $form->labelEx($model, 'peso'); ?>
                    <?php echo $form->textField($model, 'peso', array('class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'peso'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <?php echo $form->labelEx($model, 'alergias'); ?>
                    <?php echo $form->textArea($model, 'alergias', array('size' => 60, 'maxlength' => 250, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'alergias'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <?php echo $form->labelEx($model, 'antecedentes_personales'); ?>
                    <?php echo $form->textArea($model, 'antecedentes_personales', array('size' => 60, 'maxlength' => 500, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'antecedentes_personales'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <?php echo $form->labelEx($model, 'antecedentes_familiares'); ?>
                    <?php echo $form->textArea($model, 'antecedentes_familiares', array('size' => 60, 'maxlength' => 500, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'antecedentes_familiares'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <?php echo $form->labelEx($model, 'habitos_toxicos'); ?>
                    <?php echo $form->textArea($model, 'habitos_toxicos', array('size' => 60, 'maxlength' => 500, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'habitos_toxicos'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <?php echo $form->labelEx($model, 'examen_fisico'); ?>
                    <?php echo $form->textArea($model, 'examen_fisico', array('size' => 60, 'maxlength' => 500, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'examen_fisico'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <?php echo $form->labelEx($model, 'acotaciones'); ?>
                    <?php echo $form->textArea($model, 'acotaciones', array('size' => 60, 'maxlength' => 500, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'acotaciones'); ?>
                </div>
            </div>
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Save', array('class' => 'btn btn-primary')); ?>
        </div>
    </div>       
</div>

<?php $this->endWidget(); ?>

<!-- form -->