<?php
$this->pageTitle=Yii::app()->name . ' - '.Yii::t('user_common', 'Login');
$this->breadcrumbs=array(
	Yii::t('user_common', 'Login'),
);
?>

<div class="login-box-body">
    <p class="login-box-msg"><?php echo Yii::t('user_common', 'Sign in to start your session');?></p>
    
    <?php 
    $form = $this->beginWidget('CActiveForm', array(
		'id'=>'login-form',//作为ajax标识识别
		//'enableAjaxValidation'=>false,//服务器端验证
		'enableClientValidation'=>true,//客户端验证
	)); 
    ?>
    	<div class="row">
            <div class="col-xs-12">
    		<?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-danger')); ?>
    		</div>
    	</div>
    
        <div class="form-group has-feedback">
        	<?php //echo $form->labelEx($model,'user_name'); ?>
            <?php echo $form->emailField($model, 'email', array('class'=>'form-control', 'placeholder'=>Yii::t('user_common', 'Email'))); ?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <?php echo $form->error($model,'email'); ?>
        </div>
        
        <div class="form-group has-feedback">
			<?php //echo $form->labelEx($model,'password'); ?>
			<?php echo $form->passwordField($model, 'password', array('class'=>'form-control', 'placeholder'=>Yii::t('user_common', 'Password'))); ?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <?php echo $form->error($model,'password'); ?>
        </div>
        
        <div class="row">
            <div class="col-xs-5">
	            <div class="checkbox">
					<label>
						<?php //echo $form->label($model,'rememberMe'); ?>
						<?php echo $form->checkBox($model,'rememberMe').Yii::t('user_common', 'Remember Me'); ?>
						<?php echo $form->error($model,'rememberMe'); ?>
					</label>
				</div>
            </div>
            <!-- /.col -->
            <?php if(CCaptcha::checkRequirements()): ?>
            <div class="col-xs-7">
            	<?php echo $form->textField($model,'verifyCode',array('placeholder'=>Yii::t('user_common', 'VerifyCode'))); ?>
            	<?php $this->widget('CCaptcha',array('clickableImage'=>true,'showRefreshButton'=>false,
            			'imageOptions'=>array('alt'=>Yii::t('user_common', 'Click Update'),'title'=>Yii::t('user_common', 'Click Update'),'style'=>'cursor:pointer'))); ?>
            	
            	<?php echo $form->error($model,'verifyCode'); ?>
            </div>
            <?php endif; ?>
            <!-- /.col -->
        </div>
        
        <div class="row">
            <!-- /.col -->
            <div class="col-xs-12">
                <?php echo CHtml::submitButton(Yii::t('user_common', 'Sign In'), array('class'=>'btn btn-primary btn-block btn-flat')); ?>
            </div>
            <!-- /.col -->
        </div>
        
    <?php $this->endWidget(); ?>
    
    <!-- /.social-auth-links -->
</div>
<!-- /.login-box-body -->

