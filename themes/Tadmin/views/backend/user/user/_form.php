<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	//'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
)); ?>
	<?php echo $form->errorSummary($model); ?>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'user_name', array('class'=>'col-md-2 text-right form-label')); ?>
		<div class="col-md-10">
			<div class="col-md-7">
			<?php echo $form->textField($model,'user_name',array('class'=>'form-control col-md-5','placeholder'=>'Enter..')); ?>
			</div>
			<span class="help-block">Example block-level help text here.</span>
			<?php echo $form->error($model,'user_name'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'nick_name', array('class'=>'col-md-2 text-right form-label')); ?>
		<div class="col-md-10">
			<div class="col-md-7">
			<?php echo $form->textField($model,'nick_name',array('class'=>'form-control col-md-5','placeholder'=>'Enter..')); ?>
			</div>
			<span class="help-block">Example block-level help text here.</span>
			<?php echo $form->error($model,'nick_name'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'password', array('class'=>'col-md-2 text-right form-label')); ?>
		<div class="col-md-10">
			<div class="col-md-7">
			<?php echo $form->passwordField($model,'password',array('class'=>'form-control col-md-5','placeholder'=>'Enter..')); ?>
			</div>
			<span class="help-block">Example block-level help text here.</span>
			<?php echo $form->error($model,'password'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'email', array('class'=>'col-md-2 text-right form-label')); ?>
		<div class="col-md-10">
			<div class="col-md-7">
			<?php echo $form->emailField($model,'email',array('class'=>'form-control col-md-5','placeholder'=>'Enter..')); ?>
			</div>
			<span class="help-block">Example block-level help text here.</span>
			<?php echo $form->error($model,'email'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'user_group_id', array('class'=>'col-md-2 text-right form-label')); ?>
		<div class="col-md-10">
			<div class="col-md-7">
			<?php echo $form->dropDownList($model, 'user_group_id', $group_list, array('class'=>'form-control col-md-5','placeholder'=>'Enter..', 'style'=>'width:75%;margin-right:5px;')); ?>
			<?php echo CHtml::link(Yii::t('user_user', 'New Create'), array('/backend/user/user'), array('target'=>'_blank', 'class'=>'btn btn-primary'));?>
			</div>
			<span class="help-block">Example block-level help text here.</span>
			<?php echo $form->error($model,'user_group_id'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'role', array('class'=>'col-md-2 text-right form-label')); ?>
		<div class="col-md-10">
			<div class="col-md-7">
			<?php echo $form->dropDownList($model, 'role', $role_list, array('class'=>'form-control col-md-5','placeholder'=>'Enter..', 'style'=>'width:75%;margin-right:5px;')); ?>
			<?php echo CHtml::link(Yii::t('user_user', 'New Create'), array('/backend/auth/role/create'), array('target'=>'_blank', 'class'=>'btn btn-primary'));?>
			</div>
			<span class="help-block">Example block-level help text here.</span>
			<?php echo $form->error($model,'role'); ?>
		</div>
	</div>
	
	<style>
	#User_status br, #User_is_admin br {
		display: none;
	}
	#User_status label, #User_is_admin label {
		padding-right: 25px;
	}
	</style>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'status', array('class'=>'col-md-2 text-right form-label')); ?>
		<div class="col-md-10">
			<div class="col-md-7">
			<?php echo $form->radioButtonList($model, 'status', array(User::USER_YES=>Yii::t('user_user', 'Enable'),User::USER_NO=>Yii::t('user_user', 'Disable'))); ?>
			</div>
			<span class="help-block">Example block-level help text here.</span>
			<?php echo $form->error($model,'status'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'is_admin', array('class'=>'col-md-2 text-right form-label')); ?>
		<div class="col-md-10">
			<div class="col-md-7">
			<?php echo $form->radioButtonList($model, 'is_admin', array(User::USER_YES=>Yii::t('user_user', 'Is Admin'),User::USER_NO=>Yii::t('user_user', 'No Admin'))); ?>
			</div>
			<span class="help-block">Example block-level help text here.</span>
			<?php echo $form->error($model,'is_admin'); ?>
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