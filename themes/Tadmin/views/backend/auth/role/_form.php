<?php
/* @var $this RoleController */
/* @var $model AuthItem */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'role-form',
	//'action'=>$this->createUrl($action),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>
	<?php echo $form->errorSummary($model); ?>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'name', array('class'=>'col-md-2 text-right form-label')); ?>
		<div class="col-md-10">
			<div class="col-md-7">
			<?php echo $form->textField($model,'name',array('class'=>'form-control col-md-5','placeholder'=>Yii::t('common', 'Enter..'))); ?>
			</div>
			<span class="help-block">Example block-level help text here.</span>
			<?php echo $form->error($model,'name'); ?>
		</div>
	</div>
	
	<?php echo $form->hiddenField($model, 'type',array('value'=>CAuthItem::TYPE_ROLE)); ?>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'description', array('class'=>'col-md-2 text-right form-label')); ?>
		<div class="col-md-10">
			<div class="col-md-7">
			<?php echo $form->textArea($model,'description',array('class'=>'form-control col-md-5','placeholder'=>Yii::t('common', 'Enter..'))); ?>
			</div>
			<span class="help-block">Example block-level help text here.</span>
			<?php echo $form->error($model,'description'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'bizrule', array('class'=>'col-md-2 text-right form-label')); ?>
		<div class="col-md-10">
			<div class="col-md-7">
			<?php echo $form->textArea($model,'bizrule',array('class'=>'form-control col-md-5','placeholder'=>Yii::t('common', 'Enter..'))); ?>
			</div>
			<span class="help-block">Example block-level help text here.</span>
			<?php echo $form->error($model,'bizrule'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'data', array('class'=>'col-md-2 text-right form-label')); ?>
		<div class="col-md-10">
			<div class="col-md-7">
			<?php echo $form->textArea($model,'data',array('class'=>'form-control col-md-5','placeholder'=>Yii::t('common', 'Enter..'))); ?>
			</div>
			<span class="help-block">Example block-level help text here.</span>
			<?php echo $form->error($model,'data'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-md-2 text-right form-label"></label>
		<div class="col-md-10">
			<div class="col-md-7">
			<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('common', 'Create') : Yii::t('common', 'Update'), array('class'=>'btn btn-primary')); ?>
			</div>
		</div>
	</div>

<?php $this->endWidget(); ?>
<!-- form -->