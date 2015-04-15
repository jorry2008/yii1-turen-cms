<?php
/* @var $this UserController */
/* @var $model User */
$this->pageTitle = Yii::t('manage_message', 'Translation Update');

$this->breadcrumbs=array(
	'Users'=>array('index'),
	//$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	//array('label'=>'View User', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
//$model->id
// fb(Yii::app()->baseUrl);
// fb(Yii::app()->homeUrl);
?>

<?php 
//echo $form->errorSummary($model); 
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'action'=>Yii::app()->createUrl($this->route),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<div class='box box-primary'>
	<!-- 
    <div class='box-header with-border'>
        <h3 class='box-title'><i class="fa fa-tag"></i></h3>
    </div>
     -->
    <div class='box-body'>
    	<div class='row'>
            <div class='col-sm-4 col-md-4'>
                <h4 class='text-center'>源语言</h4>
            </div>
            <!-- /.col -->
            <div class='col-sm-6 col-md-6'>
                <h4 class='text-center'>译文</h4>
            </div>
            <!-- /.col -->
            <div class='col-sm-2 col-md-2'></div>
            <!-- /.col -->
        </div>
    <?php foreach ($models as $key=>$model) {?>
        <div class='row' style="margin: 10px 0 10px;">
            <div class='col-sm-4 col-md-4'>
                <div class='text-center'>
                    <?php echo $model->source->message; ?>
                </div>
            </div>
            <!-- /.col -->
            <div class='col-sm-6 col-md-6'>
                <div>
                    <?php echo $form->textArea($model,'translation', array('rows'=>2, 'style'=>'width:100%')); ?>
					<?php echo $form->error($model,'translation'); ?>
                </div>
            </div>
            <!-- /.col -->
            <div class='col-sm-2 col-md-2'></div>
            <!-- /.col -->
        </div>
        <?php }?>
        <!-- /.row -->
        
		<div class='text-center'>
			<?php echo CHtml::htmlButton('<i class="fa fa-save"></i> save', array('class'=>'btn btn-primary','type'=>'submit'));?>
		</div>
                
    </div><br />
    <!-- /.box-body -->
</div>
<!-- /.box -->
<?php $this->endWidget(); ?>

