<?php
/* @var $this AuthItemController */
/* @var $model AuthItem */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'auth-item-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
	<?php echo $form->errorSummary($model); ?>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'name', array('class'=>'col-md-2 text-right form-label')); ?>
		<div class="col-md-10">
			<div class="col-md-7">
			<?php echo $form->textField($model,'name',array('class'=>'form-control col-md-5','placeholder'=>'Enter..')); ?>
			</div>
			<span class="help-block">Example block-level help text here.</span>
			<?php echo $form->error($model,'name'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'type', array('class'=>'col-md-2 text-right form-label')); ?>
		<div class="col-md-10">
			<div class="col-md-7">
			<?php echo $form->dropDownList($model,'type',AuthItemController::getTypeName(),array('class'=>'form-control col-md-5','placeholder'=>'Enter..')); ?>
			</div>
			<span class="help-block">Example block-level help text here.</span>
			<?php echo $form->error($model,'type'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'description', array('class'=>'col-md-2 text-right form-label')); ?>
		<div class="col-md-10">
			<div class="col-md-7">
			<?php echo $form->textArea($model,'description',array('class'=>'form-control col-md-5','placeholder'=>'Enter..')); ?>
			</div>
			<span class="help-block">Example block-level help text here.</span>
			<?php echo $form->error($model,'description'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'bizrule', array('class'=>'col-md-2 text-right form-label')); ?>
		<div class="col-md-10">
			<div class="col-md-7">
			<?php echo $form->textArea($model,'bizrule',array('class'=>'form-control col-md-5','placeholder'=>'Enter..')); ?>
			</div>
			<span class="help-block">Example block-level help text here.</span>
			<?php echo $form->error($model,'bizrule'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'data', array('class'=>'col-md-2 text-right form-label')); ?>
		<div class="col-md-10">
			<div class="col-md-7">
			<?php echo $form->textArea($model,'data',array('class'=>'form-control col-md-5','placeholder'=>'Enter..')); ?>
			</div>
			<span class="help-block">Example block-level help text here.</span>
			<?php echo $form->error($model,'data'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-md-2 text-right form-label"></label>
		<div class="col-md-10">
			<div class="col-md-7">
			<?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '更新', array('class'=>'btn btn-primary')); ?>
			</div>
		</div>
	</div>

<?php $this->endWidget(); ?>
<!-- form -->