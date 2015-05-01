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
?>


<?php 
/*
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
echo CHtml::link('Advanced Search','#',array('class'=>'search-button'));
$this->renderPartial('_search',array('model'=>$model,));
*/
?>
<!-- search-form -->

<div class="row">
    <div class="col-md-12">
        <!-- Custom Tabs (Pulled to the right) -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
                <li class="pull-left header"><i class="fa fa-th"></i>角色管理</li>
                
                <li<?php echo ($this->active == 'create')?' class="active"':'';?>><a href="#tab_create" data-toggle="tab">创建</a></li>
                <li<?php echo ($this->active == 'admin')?' class="active"':'';?>><a href="#tab_admin" data-toggle="tab">所有</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane clearfix<?php echo ($this->active == 'admin')?' active':'';?>" id="tab_admin">
                    <?php $this->widget('zii.widgets.grid.CGridView', array(
							'id'=>'role-grid',
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
									'value'=>'RoleController::getTypeName($data->type)',
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
                <!-- /.tab-pane -->
                <div class="tab-pane clearfix<?php echo ($this->active == 'create')?' active':'';?>" id="tab_create">
                	<?php $this->renderPartial('_form', array('model'=>$model,'action'=>$action)); ?>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
