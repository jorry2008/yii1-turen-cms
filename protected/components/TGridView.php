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
	
	//设置批量操作有哪些动作
	public $actions = array();//动作
	
	/**
	 * 拓展一个header模板
	 */
	public function renderheader()
	{
		Yii::app()->clientScript->registerScript('search', "
			$('.search-form form').submit(function(){
				$('#user-grid').yiiGridView('update', {
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
		
		$str .= '</span>';
		$str .= '</div>';
		
		$test = 'test';
		
		//处理js
		Yii::app()->clientScript->registerScript('batch', "
			$('#bottomToolbar #all_select').on('click', function(){
				$('input[name=\'user-grid_c0\[\]\']:enabled').each(function(){
					this.checked=true;
				});
			});
			$('#bottomToolbar #no_select').on('click', function(){
				$('input[name=\'user-grid_c0\[\]\']:enabled').each(function(){
					this.checked=false;
				});
			});
			$('#bottomToolbar #operation').on('change', function(){
				//console.debug('{$test}');
				console.debug($(this).val());
				
				
			});
			
// 			$('#user-grid').yiiGridView('getChecked', {
// 				data: $(this).serialize()
// 			});
		");
		
		
		return $str;
	}
}





