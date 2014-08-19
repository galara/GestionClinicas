<?php
/* @var $this PacientesController */
/* @var $model Pacientes */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'pacientes-form',
        'enableAjaxValidation' => true,
        'htmlOptions' => array('enctype' => 'multipart/form-data')
    ));
    ?>
    <p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

    <?php
    CHtml::$errorContainerTag = 'p';
    CHtml::$errorSummaryCss = 'alert alert-warning';
    echo $form->errorSummary($model, 'Se han detectado los siguientes errores:', '', array());
    ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="#" class="thumbnail" id="imagen">
                                <?php if (!is_null($model->foto)): ?>
                                    <?php echo CHtml::image('/gestionclinicas/pacientes/displayImage/' . $model->rut, '', array('style' => 'width:100%;height:200px')) ?>
                                <?php else: ?>
                                    <img  data-src="holder.js/100%x200" alt="..." id="foto">
                                <?php endif ?>
                            </a>
                            <?php echo $form->filefield($model, 'foto', array('class' => 'filestyle', 'data-input' => 'false', 'data-buttonText' => '&nbsp Buscar imagen')) ?>
                            <br>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-12">
                                    Datos Personales:
                                </div>
                            </div>
                            <hr>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <?php echo $form->labelEx($model, 'rut'); ?>
                                    <?php echo $form->textField($model, 'rut', array('size' => 12, 'maxlength' => 12, 'class' => 'form-control', 'placeholder' => 'ej: 12123123-1', 'readonly' => $model->isNewRecord ? '' : 'readonly')); ?>
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
                        <div class="col-md-6 form-group" id="from">
                            <?php echo $form->labelEx($model, 'fecha_nacimiento'); ?>
                            <div class="input-group date" >
                                <?php echo $form->textField($model, 'fecha_nacimiento', array('class' => 'form-control', 'readonly' => 'readonly')) ?>
                                <span class="input-group-addon">
                                    <span class="add-on glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            <?php echo $form->error($model, 'fecha_nacimiento', array('class' => 'text-danger')); ?>
                        </div>
                        <div class="col-md-6 form-group">
                            <?php echo $form->labelEx($model, 'id_estadocivil'); ?>
                            <?php echo $form->dropDownList($model, 'id_estadocivil', CHtml::listData(EstadoCivil::model()->findAll(), 'id', 'estado_civil'), array('class' => 'form-control', 'prompt' => 'Seleccione...')); ?>
                            <?php echo $form->error($model, 'id_estadocivil', array('class' => 'text-danger')); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <?php echo $form->labelEx($model, 'id_sexo'); ?>
                            <?php echo $form->dropDownList($model, 'id_sexo', CHtml::listData(Sexo::model()->findAll(), 'id', 'sexo'), array('class' => 'form-control', 'prompt' => 'Seleccione...')) ?>
                            <?php echo $form->error($model, 'id_sexo', array('class' => 'text-danger')); ?>
                        </div>
                        <div class="col-md-6 form-group">
                            <?php echo $form->labelEx($model, 'id_prevision'); ?>
                            <?php echo $form->dropDownList($model, 'id_prevision', CHtml::listData(Prevision::model()->findAll(), 'id', 'prevision'), array('class' => 'form-control', 'prompt' => 'Seleccione...')) ?>
                            <?php echo $form->error($model, 'id_prevision', array('class' => 'text-danger')); ?>
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
                        <div class="col-md-4 form-group">
                            <?php echo $form->labelEx($model, 'celular'); ?>
                            <?php echo $form->textField($model, 'celular', array('size' => 9, 'maxlength' => 9, 'class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'celular', array('class' => 'text-danger')); ?>
                        </div>
                        <div class="col-md-4 form-group">
                            <?php echo $form->labelEx($model, 'telefono'); ?>
                            <?php echo $form->textField($model, 'telefono', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'telefono', array('class' => 'text-danger')); ?>
                        </div>
                        <div class="col-md-4 form-group">
                            <?php echo $form->labelEx($model, 'celular_contacto'); ?>
                            <?php echo $form->textField($model, 'celular_contacto', array('size' => 9, 'maxlength' => 9, 'class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'celular_contacto', array('class' => 'text-danger')); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <?php echo $form->labelEx($model, 'email'); ?>
                            <?php echo $form->emailField($model, 'email', array('size' => 45, 'maxlength' => 45, 'type' => 'email', 'class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'email', array('class' => 'text-danger')); ?>
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
                            <?php echo $form->dropDownList($model, 'id_ciudad', CHtml::listData(Ciudades::model()->findAll(), 'id', 'ciudad'), array('class' => 'form-control', 'prompt' => 'Seleccione...'));
                            ?>
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

<script type="text/javascript">

    $(function() {
        $('#from .input-group.date').datepicker({
            format: "yyyy-mm-dd",
            startDate: "1960-01-01",
            startView: 1,
            language: "es"
        });
    });

    function archivo(evt) {
        var files = evt.target.files;
        for (var i = 0, f; f = files[i]; i++) {

            if (!f.type.match('image.*')) {
                continue;
            }

            var reader = new FileReader();
            reader.onload = (function(theFile) {
                return function(e) {
                    // Insertamos la imagen
                    document.getElementById("imagen").innerHTML =
                            ['<img src="', e.target.result, '" title="', escape(theFile.name), '" style="width:159px;height:200px" />'].join('');
                };
            })(f);
            reader.readAsDataURL(f);
        }
    }

    document.getElementById('Pacientes_foto').addEventListener('change', archivo, false);</script>

<!-- dar formato al rut -->
<script type="text/javascript">

    function formatearRut(Rut)
    {
        var digitoVerificador = 7;
        //var asd = getDigito(178200666);
        var sRut = new String(Rut);
        var sRutFormateado = '';
        sRut = quitarFormato(sRut);
        if (digitoVerificador) {
            var sDV = sRut.charAt(sRut.length - 1);
            sRut = sRut.substring(0, sRut.length - 1);
        }

        while (sRut.length > 3)
        {
            sRutFormateado = "." + sRut.substr(sRut.length - 3) + sRutFormateado;
            sRut = sRut.substring(0, sRut.length - 3);
        }

        sRutFormateado = sRut + sRutFormateado;
        if (sRutFormateado !== "" && digitoVerificador)
        {
            sRutFormateado += "-" + sDV;
        }
        else if (digitoVerificador)
        {
            sRutFormateado += sDV;
        }

        document.getElementById('Pacientes_rut').value = sRutFormateado;
    }

    function getDigito(rut) {
        var dvr = '0';
        var suma = 0;
        var mul = 2;
        for (i = rut.length - 1; i >= 0; i--)
        {
            suma = suma + rut.charAt(i) * mul;
            if (mul == 7)
            {
                mul = 2;
            }
            else
            {
                mul++;
            }
        }
        res = suma % 11;
        if (res == 1)
        {
            return 'k';
        }
        else if (res == 0)
        {
            return '0';
        }
        else
        {
            return 11 - res;
        }
    }

    function quitarFormato(rut)
    {
        var strRut = new String(rut);
        while (strRut.indexOf(".") != -1)
        {
            strRut = strRut.replace(".", "");
        }
        while (strRut.indexOf("-") != -1)
        {
            strRut = strRut.replace("-", "");
        }

        return strRut;
    }

//    function formato_rut(rut)
//    {
//        
//        var sRut1 = rut;      //contador de para saber cuando insertar el . o la -
//        var nPos = 0; //Guarda el rut invertido con los puntos y el guión agregado
//        var sInvertido = ""; //Guarda el resultado final del rut como debe ser
//        var sRut = "";
//
//        for (var i = sRut1.length - 1; i >= 0; i--) {
//            sInvertido += sRut1.charAt(i);
//            if (i == sRut1.length - 1)
//                sInvertido += "-";
//            else if (nPos == 3)
//            {
//                sInvertido += ".";
//                nPos = 0;
//            }
//            nPos++;
//        }
//        for (var j = sInvertido.length - 1; j >= 0; j--)
//        {
//            if (sInvertido.charAt(sInvertido.length - 1) != ".")
//                sRut += sInvertido.charAt(j);
//            else if (j != sInvertido.length - 1)
//                sRut += sInvertido.charAt(j);
//        }
//        //Pasamos al campo el valor formateado
//        rut = sRut.toUpperCase();
//      
//        document.getElementById('Pacientes_rut').value = rut;
//    }
</script>
<!-- fin formato rut -->