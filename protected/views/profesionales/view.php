<?php
/* @var $this ProfesionalesController */
/* @var $model Profesionales */

$this->breadcrumbs=array(
	'Profesionales'=>array('index'),
	$model->rut,
);

$this->menu=array(
	array('label'=>'List Profesionales', 'url'=>array('index')),
	array('label'=>'Create Profesionales', 'url'=>array('create')),
	array('label'=>'Update Profesionales', 'url'=>array('update', 'id'=>$model->rut)),
	array('label'=>'Delete Profesionales', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->rut),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Profesionales', 'url'=>array('admin')),
);
?>

<h1>View Profesionales #<?php echo $model->rut; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'rut',
		'nombres_1',
		'nombre_2',
		'apellido_parterno',
		'apellido_materno',
		'celular',
		'telefono',
		'id_sexo',
		'id_ciudad',
		'direccion',
		'email',
		'fecha_nacimiento',
		'pass',
		'id_especialidad_medica',
		'registro',
	),
)); ?>
