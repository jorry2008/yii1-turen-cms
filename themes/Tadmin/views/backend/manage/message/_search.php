<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<?php 
Yii::app()->clientScript->registerScript('search', "
		$('.search-form form').submit(function(){
			$('#{$id}').yiiGridView('update', {
				data: $(this).serialize()
			});
			return false;
		});
");
?>

<div class="box-header">
	<h3 class="box-title"><?php echo Yii::t('manage_user', 'Administrator List');?></h3>
	<div class="box-tools search-form">
	
	<?php $form=$this->beginWidget('CActiveForm', array(
		'action'=>Yii::app()->createUrl($this->route),
		'method'=>'get',
	)); ?>
	
		<div class="input-group">
			<?php echo $form->textField($model,'keyword',array('placeholder'=>'Search', 'style'=>'width: 150px;','class'=>'form-control input-sm pull-right')); ?>
			<div class="input-group-btn">
			<?php echo CHtml::htmlButton('<i class="fa fa-search"></i>',array('class'=>'btn btn-sm btn-default', 'type'=>'submit')); ?>
			</div>
		</div>
	
	<?php $this->endWidget(); ?>
	
	</div>
</div>
<!-- search-form -->
