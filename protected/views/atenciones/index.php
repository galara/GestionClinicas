<?php
/* @var $this AtencionesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Atenciones',
);

$this->menu=array(
	array('label'=>'Create Atenciones', 'url'=>array('create')),
	array('label'=>'Manage Atenciones', 'url'=>array('admin')),
);
?>

<h1>Atenciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
