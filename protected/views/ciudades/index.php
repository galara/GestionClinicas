<?php
/* @var $this CiudadesController */
/* @var $dataProvider CActiveDataProvider */

Yii::app()->params['moduloActivo'] = $this->selectedItem;

$this->breadcrumbs = array(
    'Ciudades',
);
?>

<?php if (!is_null($this->mensaje)): ?>
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <?php echo $this->mensaje ?>
    </div>
<?php endif; ?>

<h1>Ciudades</h1>
<hr>
<div class="row col-md-8">
    <?php if (!empty($ciudades)): ?>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Comuna</th>
                    <th colspan="3">Acciones</th>
                </tr>
            </thead>

            <tbody class="table">
                <?php foreach ($ciudades as $ciudad): ?>
                    <tr>
                        <td><?php echo $ciudad->id ?></td>
                        <td><?php echo $ciudad->ciudad ?></td>
                        <td><?php echo $ciudad->fkComuna->comuna ?></td>
                        <td>
                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/ciudades/ver/<?php echo $ciudad->id ?>">
                                <span class="glyphicon glyphicon-zoom-in"></span>
                            </a>
                        </td>
                        <td>
                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/ciudades/editar/<?php echo $ciudad->id ?>">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                        </td>
                        <td>
                            <a href="#" onclick="openModal('<?php echo $ciudad->id ?>', '<?php echo $ciudad->ciudad ?>')">
                                <span class="glyphicon glyphicon-remove"></span>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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
            </div>
            <div class="col-md-2">
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/ciudades/nueva" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus"></span>&nbsp; Agregar
                </a>
            </div>
        </div>

    <?php else: ?>
        <h3>No hay datos para mostrar</h3>
        <div class="row">
            <div class="col-lg-12 right">
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/ciudades/nueva" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus"></span>&nbsp; Agregar
                </a>
            </div>
        </div>
    <?php endif; ?>
    <br>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">¿Eliminar Registro?</h4>
            </div>
            <div class="modal-body" id="dataTarget">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <a href="#" class="btn btn-primary" id="deleteButton">Aceptar</a>
            </div>
        </div>
    </div>
</div>
<div class="col-md-3 col-md-offset-1">
    <label>Filtros:</label>
    <?php echo CHtml::beginForm(CController::createUrl('ciudades/index'), 'POST', array('class' => 'form-horizontal', 'role' => 'form')) ?>
    <div class="row form-group">
        <div class="col-sm-12">
            <label for="buscar" class="control-label">Palabra Clave:</label>
            <input type="search" name="palabraClave" value="<?php isset($_POST['palabraClave']) ? CHtml::encode($_POST['palabraClave']) : ''; ?>"
                   class="form-control" id="buscar" placeholder="Ingrese una palabra para la búsqueda">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-12">
            <label for="listaComunas" class="control-label">Comuna:</label>
            <?php echo CHtml::dropDownList('idComuna', '', CHtml::listData(Comunas::model()->findAll(), 'id', 'comuna'), array('class' => 'form-control', 'id' => 'idComuna', 'prompt' => 'Seleccione...')) ?>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span>&nbsp; Buscar</button>
        </div>
    </div>
    <?php echo CHtml::endForm() ?>
</div>
<!-- Scripts -->
<script type="text/javascript">

    function openModal(id, nombre) {
        $('#dataTarget').html(nombre + ', id: ' + id);
        $('#deleteButton').attr('href', 'ciudades/eliminar/' + id);
        $('#myModal').modal('show');
    }

</script>
<!-- Fin -->
