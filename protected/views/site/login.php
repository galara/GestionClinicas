<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>

<h1>Ingreso a Gestión Clínicas</h1>

<p>Por favor ingrese los siguientes datos para ingresar al sistema:</p>

<div class="col-lg-6">
    <div class="form-horizontal">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'login-form',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
        ));
        
        ?>

        <p class="note">Campos con <span class="required">*</span> son requeridos.</p>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Rut*', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($model, 'username', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'username', array('class' => 'text-danger')); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Contrase&ntilde;a*', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo $form->passwordField($model, 'password', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'password', array('class' => 'text-danger')); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Perfil*</label>
            <div class="col-sm-10">
                <?php
                echo $form->dropDownList($model, 'perfil', array(
                    '' => 'Seleccione...',
                    'administrativo' => 'Administrativo'
                        ), array('class' => 'form-control'))
                ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <?php echo $form->checkBox($model, 'rememberMe'); ?>
                <?php echo $form->label($model, 'rememberMe'); ?>
<?php echo $form->error($model, 'rememberMe'); ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
<?php echo CHtml::submitButton('Ingresar', array('class' => 'btn btn-primary')); ?>
            </div>
        </div>

<?php $this->endWidget(); ?>
    </div>
</div><!-- form -->
