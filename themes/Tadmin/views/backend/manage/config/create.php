<?php
/* @var $this SettingController */
/* @var $model Setting */

$this->breadcrumbs=array(
	'Settings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Setting', 'url'=>array('index')),
	array('label'=>'Manage Setting', 'url'=>array('admin')),
);
?>

<h1>Create Setting</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>