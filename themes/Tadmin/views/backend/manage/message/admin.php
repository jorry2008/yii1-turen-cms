<?php
/* @var $this UserController */
/* @var $model User */
$this->pageTitle = Yii::t('manage_message', 'Translation Manage');

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
);


// fb($this->route, FirePHP::TRACE);
$id = $this->id.'-grid';
$headerHtml = $this->renderPartial('_search', array('model'=>$model, 'id'=>$id),true);
$batchHtml = $this->renderPartial('_batch', array('model'=>$model, 'id'=>$id),true);
//调用通用弹出窗modal
$this->renderPartial('_modal', array('model'=>$model, 'id'=>$id));
?>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
			<?php 
			//yiiPager
			//$this->widget('zii.widgets.grid.CGridView', array(
			$this->widget('TGridView', array(
				//jorry Ext
				'headerHtml'=>$headerHtml,
				'batchHtml'=>$batchHtml,
				
				'id'=>$id,
				'dataProvider'=>$model->search(),
				//'filter'=>$model,//不显示过滤器
				//'filterPosition'=>'body',
				//'hideHeader'=>true,//是否隐藏列头，默认false
				//'enableSorting'=>false,//禁止排序
				//'enablePagination'=>false,//是否开启分页
				'summaryText'=>'',//分页简述信息，为空时就不再显示
				//'summaryTagName'=>'',//分页简述的标签
				//'summaryCssClass'=>'',//分页简述的class
				//'emptyText'=>'',//当记录为空时，返回的是什么文字
				//'emptyCssClass'=>'',//当记录为空时，标签的class
				//'pagerCssClass'=>'',//整个分页的class
				//'loadingCssClass'=>'',//当加载的时候，整个表的样式，与id同级，class样式名
				'itemsCssClass'=>'table table-hover',//表格table上面的class
				'htmlOptions'=>array('class'=>'box-body table-responsive no-padding'),//整个表的样式，与id同级
				'template'=>"{summary}\n{header}\n{items}\n{pager}",//整个grid的布局占位符
				//'updateSelector'=>'{sort}',
				
				//'rowCssClassExpression'=>'$row%2',//构造一个表达式，来填充tr的样式class名
				//'rowHtmlOptionsExpression'=>'$row',//??
				
				
				'pager'=>array(//CGridView默认使用CLinkPager分页显示
					//'class'=>'CLinkPager',
					'header'=>'',//去除头部
					'htmlOptions'=>array('class'=>'pagination pagination-sm no-margin pull-right', 'style'=>'padding-right: 10px;'),
				),
				'columns'=>array(//就是指一个单元格对象，默认为CDataColumn对象
					array(
						'class'=>'CCheckBoxColumn',
						'selectableRows' => 2,//0:禁止所有选项，1：单选，2：多选
					),
// 					'id',
					array(
						'name'=>'source.category',
						'type'=>'raw',
						'value'=>'$data->source->category',
					),
					array(
						'name'=>'source.message',
						'type'=>'raw',
						'value'=>'$data->source->message',
						'htmlOptions' => array('class'=>'message'),
					),
					'language',
					array(
						'name'=>'translation',
						'type'=>'raw',
						'value'=>'$data->translation',
						'htmlOptions' => array('class'=>'translation'),
					),
// 					Yii::app()->createUrl($route)
					array(
						'header'=>'Operation',//头信息
						'class'=>'CButtonColumn',
						'template'=>'{update} {delete}',
						'htmlOptions'=>array('class'=>$id.'_modal'),//button css模态窗口要用到
						//'updateButtonOptions'=>array('data-id'=>'$data->primaryKey'),
						'updateButtonUrl'=>'trim("javascript():;")',
					),
				),
			)); ?>
		</div>
	</div>
</div>
<?php //echo CHtml::link('abc','javascript:;');?>