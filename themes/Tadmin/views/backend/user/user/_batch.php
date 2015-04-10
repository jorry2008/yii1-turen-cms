<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>


<?php 
//请求之前处理
$confirmation = "if(!confirm(".CJavaScript::encode(Yii::t('zii','Are you sure you want to delete this item?')).")) return false;";
$batchDetleteUrl = Yii::app()->createUrl(('backend/user/user/batchDelete'));
$batchStatusUrl = Yii::app()->createUrl(('backend/user/user/batchStatus'));

if(Yii::app()->request->enableCsrfValidation) {
	$csrfTokenName = Yii::app()->request->csrfTokenName;
	$csrfToken = Yii::app()->request->csrfToken;
	$csrf = "&'$csrfTokenName'='$csrfToken'";
} else
	$csrf = '';

//处理js
Yii::app()->clientScript->registerScript('batch', "
	
	jQuery(document).on('click','#{$id} #all_select',function() {
		jQuery(\"input[name='{$id}_c0\[\]']:enabled\").each(function() {this.checked=true;});
	});
	jQuery(document).on('click','#{$id} #no_select',function() {
		jQuery(\"input[name='{$id}_c0\[\]']:enabled\").each(function() {this.checked=false;});
	});
	jQuery(document).on('click', '#{$id} .batchSave', function(){
		{$confirmation}
		var ac = $('#{$id} #operation').val();
		if(ac == 'batch_del') {
			var th = this,afterDelete = function(){};
			jQuery('#{$id}').yiiGridView('update', {
				type: 'POST',
				url: '{$batchDetleteUrl}',
				data: $('#{$id} input[name=\'{$id}_c0\[\]\'\]').serialize()+'{$csrf}',
				success: function(data) {
					jQuery('#{$id}').yiiGridView('update');
				},
				error: function(XHR) {
					return afterDelete(th, false, XHR);
				}
			});
			return false;
		}
		
		if(ac == 'batch_status') {
			jQuery('#{$id}').yiiGridView('update', {
				type: 'POST',
				url: '{$batchStatusUrl}',
				data: $('#{$id} input[name=\'{$id}_c0\[\]\'\]').serialize()+'{$csrf}',
				success: function(data) {
					jQuery('#{$id}').yiiGridView('update');
					//nothing
				},
				error: function(XHR) {
					//nothing
				}
			});
			return false;
		}
		if(ac == 'batch_null') {
		
		}
	});
	
");


$actions = array(
		'batch_null'=>'NULL',
		'batch_del'=>'BATCH_DELETE',
		'batch_status'=>'BATCH_STATUS',
);
?>

<div id="bottomToolbar" class="pull-left">
<span class="selArea">
<span>BATCH_SELECT</span>
<?php
echo CHtml::link('ALL', 'javascript:;', array('id'=>'all_select'));
echo CHtml::link('NO', 'javascript:;', array('id'=>'no_select'));
echo CHtml::dropDownList('operation', 'batch_null', $actions);
echo CHtml::button('保存', array('class'=>'btn btn-primary btn-flat batchSave'));
?>
</span>
</div>


