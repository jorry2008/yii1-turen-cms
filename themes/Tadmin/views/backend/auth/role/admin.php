<?php
$this->pageTitle = Yii::t('manage_user', 'Manage Role');

$this->breadcrumbs=array(
	'Manage',
);

$id = $this->id.'-grid';
$searchHtml = $this->renderPartial('_search', array('model'=>$model, 'id'=>$id),true);
?>

<div class="row">
    <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom turen_grid">
            <?php 
			echo '<ul class="nav nav-tabs">';
			foreach ($this->menu as $menu) {
				$label = $menu['label'];
				$url = $menu['url'];
				$class = ($url == 'javascript:;')?' class="active"':'';
				echo '<li'.$class.'>'.CHtml::link($label, $url).'</li>';
			}
			echo '</ul>';
			?>
			
			<?php 
			echo $searchHtml//搜索框
			?>
            <div class="tab-content clearfix">
                <div class="tab-pane active">
                	<?php $this->widget('zii.widgets.grid.CGridView', array(
						'id'=>$id,
						'dataProvider'=>$model->search(),
						'summaryText'=>'',//分页简述信息，为空时就不再显示
						//'filter'=>$model,
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
							'header'=>Yii::t('common', 'Operation'),
							//'headerHtmlOptions' => array('style'=>'width:100px'),//th
							'class'=>'CButtonColumn',
							'template'=>'{update} {delete}',//删除view
					
							//'htmlOptions'=>array('class'=>'hidden-sm hidden-xs action-buttons'),//td
							'viewButtonOptions'=>array('class'=>'btn btn-primary btn-xs','data-toggle'=>'tooltip','title'=>Yii::t('common','View The Item')),//a
							'viewButtonLabel'=>'<i class="fa fa-eye"></i>',
							'viewButtonImageUrl'=>0,
							
							//'htmlOptions'=>array('class'=>'hidden-sm hidden-xs action-buttons'),//td
							'updateButtonOptions'=>array('class'=>'btn btn-primary btn-xs','data-toggle'=>'tooltip','title'=>Yii::t('common','Update The Item')),//a
							'updateButtonLabel'=>'<i class="fa fa-edit"></i>',
							'updateButtonImageUrl'=>0,
							
							//'htmlOptions'=>array('class'=>'hidden-sm hidden-xs action-buttons'),//td
							'deleteButtonOptions'=>array('class'=>'btn btn-danger btn-xs','data-toggle'=>'tooltip','title'=>Yii::t('common','Delete The Item')),//a
							'deleteButtonLabel'=>'<i class="fa fa-bitbucket"></i>',
							'deleteButtonImageUrl'=>0,
							//'deleteConfirmation'=>'您确定要删除吗？',
							),
						),
					)); ?>
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

