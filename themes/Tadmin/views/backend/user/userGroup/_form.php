<?php
/* @var $this UserGroupController */
/* @var $model UserGroup */
/* @var $form CActiveForm */
?>

<?php 
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-group-form',
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
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'parent_id', array('class'=>'col-md-2 text-right form-label')); ?>
		<div class="col-md-10">
			<div class="col-md-7">
			<?php //实现为当前分类添加子分类的效果?>
			<?php echo $form->dropDownList($model,'parent_id',$model->getUserGroupSelect(),array('disabled'=>(!empty($model->parent_id) && ($this->getAction()->id == 'create')),'class'=>'form-control col-md-5','placeholder'=>Yii::t('common', 'Enter..'))); ?>
			</div>
			<span class="help-block">Example block-level help text here.</span>
			<?php echo $form->error($model,'parent_id'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'role', array('class'=>'col-md-2 text-right form-label')); ?>
		<div class="col-md-10">
			<div class="col-md-7">
			<?php //没有管理员权限，按钮应该不可用?>
			<?php echo $form->dropDownList($model,'role',Yii::app()->authManager->getAuthItemsForSelects(CAuthItem::TYPE_ROLE),array('class'=>'form-control col-md-5','placeholder'=>Yii::t('common', 'Enter..'),'style'=>'width:75%;margin-right:5px;')); ?>
			<?php echo CHtml::link(Yii::t('common', 'Edit'), array('/backend/auth/role/admin'), array('target'=>'_blank', 'class'=>'btn btn-primary'));?>
			</div>
			<span class="help-block">Example block-level help text here.</span>
			<?php echo $form->error($model,'role'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'sort', array('class'=>'col-md-2 text-right form-label')); ?>
		<div class="col-md-10">
			<div class="col-md-7">
			<?php echo $form->numberField($model,'sort',array('class'=>'form-control col-md-5','placeholder'=>Yii::t('common', 'Enter..'))); ?>
			</div>
			<span class="help-block">Example block-level help text here.</span>
			<?php echo $form->error($model,'sort'); ?>
		</div>
	</div>
	
	<style>
	#UserGroup_status br {
		display: none;
	}
	#UserGroup_status label {
		padding-right: 25px;
	}
	</style>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'status', array('class'=>'col-md-2 text-right form-label')); ?>
		<div class="col-md-10">
			<div class="col-md-7">
			<?php echo $form->radioButtonList($model, 'status', array(UserGroup::USER_GROUP_YES=>Yii::t('user_userGroup', 'Enable'),UserGroup::USER_GROUP_NO=>Yii::t('user_userGroup', 'Disable'))); ?>
			</div>
			<span class="help-block">Example block-level help text here.</span>
			<?php echo $form->error($model,'status'); ?>
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
	
<?php $this->endWidget(); ?><!-- form -->
