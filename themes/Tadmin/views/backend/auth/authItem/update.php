<?php
/* @var $this AuthItemController */
/* @var $model AuthItem */

$this->breadcrumbs=array(
	'Auth Items'=>array('index'),
	$model->name=>array('view','id'=>$model->name),
	'Update',
);

$this->menu=array(
	array('label'=>'List AuthItem', 'url'=>array('index')),
	array('label'=>'Create AuthItem', 'url'=>array('create')),
	array('label'=>'View AuthItem', 'url'=>array('view', 'id'=>$model->name)),
	array('label'=>'Manage AuthItem', 'url'=>array('admin')),
);
?>

<h1>Update AuthItem <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>