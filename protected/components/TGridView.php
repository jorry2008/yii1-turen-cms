<?php 
/**
 * 
 * @author xia.q
 *
 */
Yii::import('zii.widgets.grid.CGridView');

class TGridView extends CGridView
{
	public $headerHtml = '';
	public $batchHtml = '';
	
	public function init()
	{
		parent::init();
		
	}
	
	/**
	 * 拓展一个header模板
	 */
	public function renderheader()
	{
		echo $this->headerHtml;
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
		return $this->batchHtml;
	}
}

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



