<?php
/* @var $this UserController */
/* @var $model User */
$this->pageTitle = Yii::t('manage_message', 'Translation Update');

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'View User', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
//$model->id
?>

<?php //echo $form->errorSummary($model); ?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
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
                <div>
                    <?php echo $model->source->message; ?>
                </div>
            </div>
            <!-- /.col -->
            <div class='col-sm-6 col-md-6'>
                <h4 class='text-center'>译文</h4>
                <div>
                    <?php echo $form->textArea($model,'translation', array('rows'=>2, 'style'=>'width:100%')); ?>
					<?php echo $form->error($model,'translation'); ?>
                </div>
            </div>
            <!-- /.col -->
            <div class='col-sm-2 col-md-2'>
                <h4 class='text-center'>操作</h4>
                <div>
					<?php echo CHtml::htmlButton('<i class="fa fa-save"></i> save', array('class'=>'btn btn-primary','type'=>'submit'));?>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><br />
    <!-- /.box-body -->
</div>
<!-- /.box -->
<?php $this->endWidget(); ?>

<?php 
//处理js
Yii::app()->clientScript->registerScript('batch', "

$('#jj').on('click', function(){
	$('#exampleModal').modal('show');
});

$('#exampleModal').on('show.bs.modal', function (event) {
		alert('abcddd');
	var button = $(event.relatedTarget);
	var recipient = button.data('whatever');
	var modal = $(this);
	modal.find('.modal-title').text('New message to ' + recipient);
	modal.find('.modal-body input').val(recipient);
});


");
?>

<button type="button" id="jj">afds</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Translation Message</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="control-label">源语言:</label>
            <p>Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.</p>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">译文:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
