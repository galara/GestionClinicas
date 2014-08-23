<?php
/* @var $this AtencionesController */
/* @var $model Atenciones */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'atenciones-form',
        'enableAjaxValidation' => true,
    ));
    ?>

    <p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

    <?php
    CHtml::$errorContainerTag = 'p';
    CHtml::$errorSummaryCss = 'alert alert-warning';
    echo $form->errorSummary($model, 'Se han detectado los siguienter errores:');
    ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row form-group">
                        <div class="col-md-12">
                            <?php echo $form->labelEx($model, 'sintomas'); ?>
                            <?php echo $form->textArea($model, 'sintomas', array('maxlength' => 1000, 'class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'sintomas', array('class' => 'text-danger')); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label>Diagnóstico:</label>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label>Categoría</label>
                            <?php echo CHtml::dropDownList('idCategoria', '',  CHtml::listData(CategoriasDiagnosticos::model()->findAll(), 'id', 'categoria'), 
                                    array(
                                        'class' => 'form-control',
                                        'id' => 'idCategoria',
                                        'prompt' => 'Seleccione...',
                                        'ajax' => array(
                                            'type' => 'POST',
                                            'url' => CController::createUrl('Atenciones/CargarDiagnosticos'),
                                            'update' => '#diagnosticos',
                                            ),
                                        )); ?>
                        </div>
                        <div class="col-md-6">
                            <?php echo $form->labelEx($model, 'id_diagnostico'); ?>
                            <?php echo $form->dropDownList($model, 'id_diagnostico', array(), array('class' => 'form-control', 'id' => 'diagnosticos')); ?>
                            <?php echo $form->error($model, 'id_diagnostico', array('class' => 'text-danger')); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <?php echo $form->labelEx($model, 'tratamiento'); ?>
                            <?php echo $form->textArea($model, 'tratamiento', array('maxlength' => 500, 'class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'tratamiento', array('class' => 'text-danger')); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <?php echo $form->labelEx($model, 'observaciones'); ?>
                            <?php echo $form->textArea($model, 'observaciones', array('maxlength' => 500, 'class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'observaciones', array('class' => 'text-danger')); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Guardar Cambios', array('class' => 'btn btn-primary')); ?>
        </div>
    </div>
    <?php $this->endWidget(); ?>

</div><!-- form -->