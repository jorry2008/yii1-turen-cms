<?php
/* @var $this UserController */
/* @var $model User */
?>

<?php 
//处理js
Yii::app()->clientScript->registerScript('modal', "

//一开始就得执行注册
$('#{$id}'+'_modal').on('show.bs.modal', function (event) {
	
	console.debug(event);
	//var button = $(event.relatedTarget);//触发的那个对象??
	//var recipient = button.data('message-text');
	
	//modal部分
// 	var modal = $(this);
// 	modal.find('.modal-title').text(title);
// 	modal.find('.modal-body input').val(recipient);
});

$('.{$id}'+'_modal .update').on('click', function(){
	$('#{$id}'+'_modal').modal('show');
});

");
?>

<div class="modal fade" id="<?php echo $id.'_modal';?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><?php echo $this->pageTitle; ?></h4>
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
