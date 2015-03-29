<?php 
/**
 * 
 * @author xia.q
 *
 */
Yii::import('zii.widgets.grid.CGridView');

class TGridView extends CGridView
{
// 	public $headerBoxCss = 

	public $route;
	public $model;
	
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
				<h3 class="box-title">管理员列表</h3>
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
}





