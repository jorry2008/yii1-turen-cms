<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<?php 
Yii::app()->clientScript->registerScript('search', "
		jQuery(document).on('submit','.search-form form',function() {
			$('#{$id}').yiiGridView('update', {
				data: $(this).serialize()
			});
			return false;
		});
");
?>

	<div class="box-tools search-form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'action'=>Yii::app()->createUrl($this->route),
		'method'=>'get',
	)); ?>
	
		<div class="input-group">
			<?php echo $form->textField($model,'keyword',array('placeholder'=>Yii::t('common', 'Keyword'), 'style'=>'width: 150px;','class'=>'form-control input-sm pull-right')); ?>
			<div class="input-group-btn">
			<?php echo CHtml::htmlButton('<i class="fa fa-search"></i>',array('class'=>'btn btn-sm btn-default', 'type'=>'submit')); ?>
			</div>
		</div>
	
	<?php $this->endWidget(); ?>
	</div>
<!-- search-form -->
