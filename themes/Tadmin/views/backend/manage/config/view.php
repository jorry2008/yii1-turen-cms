<?php
/* @var $this SettingController */
/* @var $model Setting */

$this->breadcrumbs=array(
	'Settings'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Setting', 'url'=>array('index')),
	array('label'=>'Create Setting', 'url'=>array('create')),
	array('label'=>'Update Setting', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Setting', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Setting', 'url'=>array('admin')),
);
?>

<h1>View Setting #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'code',
		'key',
		'value',
		'serialized',
	),
)); ?>
