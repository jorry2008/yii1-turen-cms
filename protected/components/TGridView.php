<?php 
/**
 * 
 * @author xia.q
 *
 */
Yii::import('zii.widgets.grid.CGridView');

class TGridView extends CGridView
{
	public $route;
	public $model;
	public $headerTitle;
	public $deleteConfirmation;
	
	//设置批量操作有哪些动作
	public $actions = array();//动作
	public $batchDetleteUrl;
	public $batchStatusUrl;
	
	
	public function init()
	{
		parent::init();
		
		if($this->deleteConfirmation===null)
			$this->deleteConfirmation=Yii::t('zii','Are you sure you want to delete this item?');
		if($this->batchDetleteUrl===null)
			$this->batchDetleteUrl = Yii::app()->createUrl(('backend/user/user/batchDelete'));
		if($this->batchStatusUrl===null)
			$this->batchStatusUrl = Yii::app()->createUrl(('backend/user/user/batchStatus'));
	}
	
	/**
	 * 拓展一个header模板
	 */
	public function renderheader()
	{
		$id = $this->id;
		Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$('#{$id}').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
		");
		
		echo '<div class="box-header">
				<h3 class="box-title">'.$this->headerTitle.'</h3>
				<div class="box-tools search-form">';
		
		$form=$this->beginWidget('CActiveForm', array(
			'action'=>Yii::app()->createUrl($this->route),
			'method'=>'get',
		));
		
		echo '<div class="input-group">';
		echo $form->textField($this->model,'keyword',array('placeholder'=>'Search', 'style'=>'width: 150px;','class'=>'form-control input-sm pull-right'));
		echo '<div class="input-group-btn">
					<button type="submit" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
				</div>
			</div>';
		
		$this->endWidget();
		
		echo '</div></div>';
	}
	
	/**
	 * Renders the pager.
	 * 重写一个渲染分页栏目，增加一个批量功能
	 */
	public function renderPager()
	{
		if(!$this->enablePagination)
			return;
	
		$pager=array();
		$class='CLinkPager';
		if(is_string($this->pager))
			$class=$this->pager;
		elseif(is_array($this->pager))
		{
			$pager=$this->pager;
			if(isset($pager['class']))
			{
				$class=$pager['class'];
				unset($pager['class']);
			}
		}
		$pager['pages']=$this->dataProvider->getPagination();
	
		echo '<div class="'.$this->pagerCssClass.'">';
		echo $this->renderBatch();//也可以单独调用
		
		if($pager['pages']->getPageCount()>1)
			$this->widget($class,$pager);
		else
			$this->widget($class,$pager);
		
		echo '</div>';
	}
	
	/**
	 * 渲染一个批量处理效果
	 */
	public function renderBatch()
	{
		$id=$this->getId();
		
		$str = '<div id="bottomToolbar" class="pull-left">'."\n";
		$str .= '<span class="selArea">'."\n";
		$str .= '<span>'.'SELECT:'.'</span>';
		if(empty($this->actions))
			$this->actions = array(
					'batch_null'=>'NULL',
					'batch_del'=>'BATCH DELETE',
					'batch_status'=>'BATCH STATUS',
			);
		
		$str .= CHtml::link('ALL', 'javascript:;', array('id'=>'all_select'));
		$str .= CHtml::link('NO', 'javascript:;', array('id'=>'no_select'));
		$str .= CHtml::dropDownList('operation', 'batch_null', $this->actions);
		$str .= CHtml::button('保存', array('class'=>'btn btn-primary btn-flat batchSave'));
		
		$str .= '</span>';
		$str .= '</div>';
		
		//请求之前处理
		if(is_string($this->deleteConfirmation))
			$confirmation="if(!confirm(".CJavaScript::encode($this->deleteConfirmation).")) return false;";
		else
			$confirmation='';
		
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
	var ac = $('#{$id} #operation').val();
	//var checked_arr = $('#{$id}').yiiGridView('getChecked', '{$id}_c0');
	
	if(ac == 'batch_del') {
		$confirmation
		var th = this,afterDelete = function(){};
		jQuery('#{$id}').yiiGridView('update', {
			type: 'POST',
			url: '{$this->batchDetleteUrl}',
			data: $('#{$id} input[name=\'{$id}_c0\[\]\'\]').serialize()+'{$csrf}',
			success: function(data) {
				jQuery('#{$id}').yiiGridView('update');
				afterDelete(th, true, data);
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
			url: '{$this->batchStatusUrl}',
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
		
		
		
		//统一调用一个GridView对象方法
// 		jQuery('#user-grid').yiiGridView({
// 			'ajaxUpdate':['user-grid'],
// 			'ajaxVar':'ajax',
// 			'pagerClass':'pager',
// 			'loadingClass':'grid-view-loading',
// 			'filterClass':'filters',
// 			'tableClass':'table table-hover',
// 			'selectableRows':1,
// 			'enableHistory':false,
// 			'updateSelector':'{page}, {sort}',
// 			'filterSelector':'{filter}',
// 			'pageVar':'User_page',
// 		});
		
		//单独调用一个指定的方法
// 		$('#user-grid').yiiGridView('getChecked', 'user-grid_c0')//返回指定列的选中对象
		
		
		return $str;
	}
}





