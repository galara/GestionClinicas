<?php
/* @var $this AtencionesController */
/* @var $dataProvider CActiveDataProvider */

Yii::app()->params['moduloActivo'] = $this->selectedItem;

$this->breadcrumbs = array(
    'Atenciones',
);
?>
<!-- Mensaje -->
<?php if (!is_null($this->mensaje)): ?>
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <?php echo $this->mensaje ?>
    </div>
<?php endif; ?>
<!-- fin mensaje -->
<!-- tabla de atenciones -->
<div class="row col-md-8">
    <h2>Registro de Atenciones</h2>
    <hr>
    <!-- Listado de pacientes -->
    <?php if (!empty($atenciones)): ?>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Médico</th>
                    <th>Paciente</th>
                    <th>Fecha</th>
                    <th>Ver</th>
                </tr>
            </thead>
            <?php foreach ($atenciones as $atencion): ?>
                <tbody class="table">
                    <tr>
                        <td>
                            <?php echo $atencion->id ?>
                        </td>
                        <td>
                            <?php echo  $atencion->fkProfesional->nombre_1 . ' ' . $atencion->fkProfesional->apellido_paterno . ' ' . $atencion->fkProfesional->apellido_materno ?>
                        </td>
                        <td>
                            <?php echo $atencion->fkPaciente->nombre_1 . ' ' . $atencion->fkPaciente->apellido_paterno . ' ' . $atencion->fkPaciente->apellido_materno ?>
                        </td>
                        <td><?php echo date('d/m/Y', strtotime($atencion->fecha))?></td>
                        <td>
                            <a href="<?php echo Yii::app()->createUrl('/atenciones/ver/' . $atencion->id) ?>">
                                <span class="glyphicon glyphicon-zoom-in"></span>
                            </a>
                        </td>
                    </tr>
                </tbody>
            <?php endforeach; ?>
        </table>
        <!-- fin listado de pacientes -->
        <!-- Paginador -->
        <div class="row">
            <div class="col-md-10">
                <?php
                $this->widget('CLinkPager', array(
                    'pages' => $pages,
                    'header' => '',
                    'nextPageLabel' => 'Next',
                    'prevPageLabel' => 'Prev',
                    'selectedPageCssClass' => 'active',
                    'hiddenPageCssClass' => 'disabled',
                    'prevPageLabel' => 'Anterior',
                    'nextPageLabel' => 'Siguiente',
                    'firstPageLabel' => '<<',
                    'lastPageLabel' => '>>',
                    'htmlOptions' => array(
                        'class' => 'pagination',
                    )
                ))
                ?>
                <!-- fin paginador -->
            </div>
        </div>

    <?php else: ?>
        <h3>No hay datos para mostrar</h3>
    <?php endif; ?>
    <!-- fin listado de pacientes -->
</div>
<!-- fin tabla de busquedas -->
<!-- filtros de busqueda -->
<div class="row col-sm-3 col-sm-offset-1">
    <!-- Formulario de búsqueda -->
    <div class="row">
        <div class="col-md-12">
            <?php echo CHtml::beginForm(CController::createUrl('Atenciones/index'), 'POST', array('class' => 'form-horizontal', 'role' => 'form')) ?>
            <form>
                <div class="row form-group">
                    <div class="col-md-6">
                        <label>Búsqueda</label>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <label>Desde:</label><br>
                        <div class='input-group date' id='from'>
                            <?php echo CHtml::textField('fDesde', '', array('class' => 'form-control', 'readonly' => 'readonly', 'id' => 'desde')) ?>
                            <span class="input-group-addon" id="fechaDesde"  >
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <label>Hasta:</label><br>
                        <div class='input-group date' id='from'>
                            <?php echo CHtml::textField('fHasta', '', array('class' => 'form-control', 'readonly' => 'readonly', 'id' => 'hasta')) ?>
                            <span class="input-group-addon" id="fechaHasta">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <label>Categoría</label>
                        <?php
                        echo CHtml::dropDownList('idCategoria', '', CHtml::listData(CategoriasDiagnosticos::model()->findAll(), 'id', 'categoria'), array(
                            'class' => 'form-control',
                            'id' => 'idCategoria',
                            'prompt' => 'Seleccione...',
                            'ajax' => array(
                                'type' => 'POST',
                                'url' => CController::createUrl('Atenciones/CargarDiagnosticos'),
                                'update' => '#diagnosticos',
                            ),
                        ));
                        ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <label>Diagnóstico:</label>
                        <br>
                        <?php echo CHtml::dropDownList('idDiagnostico', '', array(), array('class' => 'form-control', 'id' => 'diagnosticos')); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <label>Paciente</label>
                        <div class='input-group'>
                            <?php echo CHtml::textField('rutPaciente', '', array('maxlength' => 12, 'class' => 'form-control', 'id' => 'rutPaciente', 'readonly' => 'readonly')); ?>
                            <span class="input-group-addon" >
                                <a href="#" onclick="toggleModal('paciente')">
                                    <span class="glyphicon glyphicon-search"></span>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <label>Médico</label>
                        <div class='input-group'>
                            <?php echo CHtml::textField('rutProfesional', '', array('maxlength' => 12, 'class' => 'form-control', 'id' => 'rutProfesional', 'readonly' => 'readonly')); ?>
                            <span class="input-group-addon" >
                                <a href="#" onclick="toggleModal('profesional')">
                                    <span class="glyphicon glyphicon-search"></span>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
                <hr>
                <input type="submit" class="btn btn-primary" value="Filtrar Búsqueda" >
            </form>
        </div>
    </div>
    <?php echo CHtml::endForm() ?>
    <!-- fin formulario de busqueda -->
</div>
<!-- filtros de busqueda -->

<!-- modal -->
<?php echo $this->renderPartial('_buscar'); ?>
<!-- fin modal-->
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
