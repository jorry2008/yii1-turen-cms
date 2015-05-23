<?php
/* @var $this UserController */
/* @var $model User */
?>

<?php 
$updateUrl = Yii::app()->createUrl(('backend/manage/message/update'));

if(Yii::app()->request->enableCsrfValidation) {
	$csrfTokenName = Yii::app()->request->csrfTokenName;
	$csrfToken = Yii::app()->request->csrfToken;
	$csrf = "&'$csrfTokenName'='$csrfToken'";
} else
	$csrf = '';


//处理js
Yii::app()->clientScript->registerScript('modal', "

//全局变量，记录触发者	
var the_this;
		
$(document).on('click', '.{$id}'+'_modal .update', function(){//因为要刷新，所以应该旧延迟绑定
	the_this = $(this);
	$('#{$id}'+'_modal').modal('show');
	return false;
});

//一开始就得执行注册
$('#{$id}'+'_modal').on('show.bs.modal', function (event) {//这是js触发，没有所谓的data源，因此event为空
	var tr = the_this.parents('tr').eq(0);
	var sourceMessage = tr.find('.message').text();
	var message = tr.find('.translation').text();
	
	//modal部分
	var modal = $(this);
	modal.find('.modal-body #message-source').text(sourceMessage);
	modal.find('.modal-body #message-text').val(message);
});


//提交处理
$('.modal-footer #modal-save').on('click', function(){
	var tr = the_this.parents('tr').eq(0);
	var key = tr.find('.checkbox-column input').val();
	var id = key.split(',')[0];
	var language = key.split(',')[1];
	var translation = $('.modal-body #message-text').val();
	
	$.ajax({
		type: 'POST',
		dataType: 'json',
		url: '{$updateUrl}',
		data: 'id='+id+'&language='+language+'&translation='+translation,
		success: function(data) {
			jQuery('#{$id}').yiiGridView('update');//更新整个grid
			if(data.status == 1) 
				$('#{$id}'+'_modal').modal('hide');//退出拟态窗口
			else 
				alert(data.message);
		},
		error: function(XHR) {
			console.debug(XHR);
			return false;
			//return afterDelete(th, false, XHR);
		},
		beforeSend: function() {
			//$(this).prepend('<i class=\"fa fa-refresh fa-spin\"></i>');
		},
		complete: function() {
			//$(this).find('.fa').remove();
		}
	});
});


");
?>

<div class="modal" id="<?php echo $id.'_modal';?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><?php echo $this->pageTitle; ?></h4>
      </div>
      <div class="modal-body">
        <?php echo CHtml::form();?>
          <div class="form-group">
            <label for="recipient-name" class="control-label"><?php echo Yii::t('manage_message', 'Source Lang:');?></label>
            <p id="message-source"></p>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label"><?php echo Yii::t('manage_message', 'Translation:');?></label> 
            <?php echo CHtml::textArea('message', '', array('class'=>'form-control', 'id'=>'message-text'));?>
          </div>
        <?php echo CHtml::endForm()?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo Yii::t('manage_message', 'Close');?></button>
        <button type="button" class="btn btn-primary" id="modal-save"><?php echo Yii::t('common', 'Save');?></button>
      </div>
    </div>
  </div>
</div>
