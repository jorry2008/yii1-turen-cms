<?php
/* @var $this AuthItemController */
/* @var $model AuthItem */

$this->breadcrumbs=array(
	'Auth Items'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List AuthItem', 'url'=>array('index')),
	array('label'=>'Create AuthItem', 'url'=>array('create')),
	array('label'=>'Update AuthItem', 'url'=>array('update', 'id'=>$model->name)),
	array('label'=>'Delete AuthItem', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->name),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AuthItem', 'url'=>array('admin')),
);
?>

<h1>View AuthItem #<?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'type',
		'description',
		'bizrule',
		'data',
	),
)); ?>
