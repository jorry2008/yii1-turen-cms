<?php
/* @var $this UserController */
/* @var $model User */

$this->pageTitle = '管理员管理';

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
		
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php 
// $this->renderPartial('_search',array(
// 	'model'=>$model,
// )); 
?>
</div><!-- search-form -->


<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
			<?php 
			//yiiPager
			//$this->widget('zii.widgets.grid.CGridView', array(
			$this->widget('TGridView', array(
				'id'=>'user-grid',
				'dataProvider'=>$model->search(),
				//'filter'=>$model,//不显示过滤器
				'summaryText'=>'',//不显示分页信息
				'itemsCssClass'=>'table table-hover',//表格table上的样式
				'htmlOptions'=>array('class'=>'box-body table-responsive no-padding'),//整个表的样式，与id同级
				'template'=>"{summary}\n{header}\n{items}\n{pager}",//创建一个新的header
				//'updateSelector'=>'{sort}',
				'pager'=>array(//CGridView默认使用CLinkPager分页显示
					//'class'=>'CLinkPager',
					'header'=>'',//去除头部
					'htmlOptions'=>array('class'=>'pagination pagination-sm no-margin pull-right', 'style'=>'padding-right: 10px;'),
				),
				'columns'=>array(
					array(
						'class'=>'CCheckBoxColumn',
						'selectableRows' => 2,//0:禁止所有选项，1：单选，2：多选
			// 			'headerTemplate'=>'{item}<span class="lbl"></span>',
			// 			'checkBoxHtmlOptions'=>array('class'=>'ace'),
					),
					'user_name',
					'nick_name',
					'email',
					array(
						'name'=>'user_group_id',
						'type'=>'raw',
						'value'=>'UserGroup::model()->findByPk($data->user_group_id)->name',
					),
					'login_ip',
					array(
						'name'=>'date_added',
						'type'=>'raw',
						'value'=>'Yii::app()->locale->getDateFormatter()->formatDateTime($data->date_added,\'short\')',
					),
					array(
						'name'=>'status',
						'type'=>'raw',
						'value'=>'($data->status)?\'<span class="label label-success">Yes</span>\':\'<span class="label label-danger">No</span>\'',
					),
					array(
						'class'=>'CButtonColumn',
					),
				),
			)); ?>
		</div>
	</div>
</div>
