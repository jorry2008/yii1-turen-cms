<?php
/**
 * 
 * 
 */
$this->pageTitle = Yii::t('manage_user', 'Manage Auth Items');

$this->breadcrumbs=array(
	'Auth Items'=>array('index'),
	'Manage',
);
$this->menu=array(
	array('label'=>'List AuthItem', 'url'=>array('index')),
	array('label'=>'Create AuthItem', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#auth-item-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

// fb($typeList);
?>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>
<!-- search-form -->


<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'auth-item-grid',
			'dataProvider'=>$model->search(),
			'summaryText'=>'',//分页简述信息，为空时就不再显示
			'filter'=>$model,
			'itemsCssClass'=>'table table-hover',//表格table上面的class
			'htmlOptions'=>array('class'=>'box-body table-responsive no-padding'),//整个表的样式，与id同级
			//'template'=>"{summary}\n{header}\n{items}\n{pager}",//整个grid的布局占位符
			'pager'=>array(//CGridView默认使用CLinkPager分页显示
				//'class'=>'CLinkPager',
				'header'=>'',//去除头部
				'htmlOptions'=>array('class'=>'pagination pagination-sm no-margin pull-right', 'style'=>'padding-right: 10px;'),
			),//$typeList
			'columns'=>array(
				'name',
				array(
					'name'=>'type',
					'type'=>'raw',
					'value'=>'AuthItemController::getTypeName($data->type)',
				),
				'description',
				'bizrule',
				'data',
				array(
					'class'=>'CButtonColumn',
				),
			),
		)); ?>
		</div>
	</div>
</div>