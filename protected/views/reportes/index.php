<?php
Yii::app()->params['moduloActivo'] = $this->selectedItem;

$this->breadcrumbs = array(
    'Reportes',
);
?>

<h1>Reportes</h1>
<h6>
    (*) Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dictum erat nec sem tempus, eget aliquet ante vestibulum. Aenean sapien purus, pulvinar a dignissim vel, 
    feugiat a elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
</h6>
<hr>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Pacientes atendidos</h3>
    </div>
    <div class="panel-body">
        <?php echo CHtml::beginForm(CController::createUrl('reportes/pacientesatendidos')) ?>
        <div class="form-group row">
            <div class="col-md-4">
                <?php echo CHtml::label('Desde', 'desde') ?>
                <div class="input-group date" >
                    <?php echo CHtml::textField('fDesde', '', array('class' => 'form-control', 'readonly' => 'readonly', 'id' => 'desde')) ?>
                    <span class="input-group-addon">
                        <span class="add-on glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <?php echo CHtml::label('Hasta', 'hasta') ?>
                <div class="input-group date" >
                    <?php echo CHtml::textField('fHasta', '', array('class' => 'form-control', 'readonly' => 'readonly', 'id' => 'hasta')) ?>
                    <span class="input-group-addon">
                        <span class="add-on glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <?php echo CHtml::label('Rut Médico', 'medico') ?>
                <div class="input-group">
                    <?php echo CHtml::textField('rutMedico', '', array('class' => 'form-control', 'id' => 'medico', 'readonly' => 'readonly')) ?>
                    <span class="input-group-addon" >
                        <a href="#" data-toggle="modal" data-target="#modalBuscar">
                            <span class="glyphicon glyphicon-search"></span>
                        </a>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                <?php echo CHtml::submitButton('Generar informe PDF', array('class' => 'btn btn-primary')) ?>
            </div>
        </div>
        <?php echo CHtml::endForm() ?>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Informe de enfermedades recurrentes</h3>
    </div>
    <div class="panel-body">
        <?php echo CHtml::beginForm(CController::createUrl('reportes/enfermedadesrecurrentes')) ?>
        <div class="form-group row">
            <div class="col-md-4">
                <?php echo CHtml::label('Desde', 'desde') ?>
                <div class="input-group date" >
                    <?php echo CHtml::textField('fDesde', '', array('class' => 'form-control', 'readonly' => 'readonly', 'id' => 'desde')) ?>
                    <span class="input-group-addon">
                        <span class="add-on glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <?php echo CHtml::label('Hasta', 'hasta') ?>
                <div class="input-group date" >
                    <?php echo CHtml::textField('fHasta', '', array('class' => 'form-control', 'readonly' => 'readonly', 'id' => 'hasta')) ?>
                    <span class="input-group-addon">
                        <span class="add-on glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                <?php echo CHtml::submitButton('Generar informe PDF', array('class' => 'btn btn-primary')) ?>
            </div>
        </div>
        <?php echo CHtml::endForm() ?>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Informe de personas afectadas por enfermedad</h3>
    </div>
    <div class="panel-body">
        <?php echo CHtml::beginForm(CController::createUrl('reportes/personasenfermedad')) ?>
        <div class="form-group row">
            <div class="col-md-3">
                <?php echo CHtml::label('Desde', 'desde') ?>
                <div class="input-group date" >
                    <?php echo CHtml::textField('fDesde', '', array('class' => 'form-control', 'readonly' => 'readonly', 'id' => 'desde')) ?>
                    <span class="input-group-addon">
                        <span class="add-on glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="col-md-3">
                <?php echo CHtml::label('Hasta', 'hasta') ?>
                <div class="input-group date" >
                    <?php echo CHtml::textField('fHasta', '', array('class' => 'form-control', 'readonly' => 'readonly', 'id' => 'hasta')) ?>
                    <span class="input-group-addon">
                        <span class="add-on glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="col-md-3">
                <?php echo CHtml::label('Categoría Enfermedad', 'idCategoria') ?>
                <?php
                echo CHtml::dropDownList('idCategoria', 'idCategoria', CHtml::listData(CategoriasDiagnosticos::model()->findAll(), 'id', 'categoria'), array(
                    'class' => 'form-control',
                    'id' => 'idCategoria',
                    'prompt' => 'Seleccione...',
                    'ajax' => array(
                        'type' => 'POST',
                        'url' => CController::createUrl('Reportes/CargarDiagnosticos'),
                        'update' => '#diagnosticos',
                    ),
                ));
                ?>
            </div>
            <div class="col-md-3">
                <?php echo CHtml::label('Diagnóstico', 'id_diagnostico'); ?>
                <?php echo CHtml::dropDownList('idDiagnostico', 'id_diagnostico', array(), array('class' => 'form-control', 'id' => 'diagnosticos', 'required' => 'required')); ?>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                <?php echo CHtml::submitButton('Generar informe PDF', array('class' => 'btn btn-primary')) ?>
            </div>
        </div>
        <?php echo CHtml::endForm() ?>
    </div>
</div>
<!-- modal -->
<?php echo $this->renderPartial('_buscar') ?>
<!-- fin modal -->

<script type="text/javascript">
    $(function() {
        $('.input-group.date').datepicker({
            format: "yyyy-mm-dd",
            startDate: "1960-01-01",
            startView: 1,
            language: "es"
        });
    });
</script>

