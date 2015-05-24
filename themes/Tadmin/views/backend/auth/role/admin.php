<?php
$this->pageTitle = Yii::t('auth_role', 'Role Manage');

$this->breadcrumbs=array(
	Yii::t('auth_role', 'Role Manage'),
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
				$tip = Yii::t('common', 'Click Into').'('.Yii::t('common', $label).')';
				echo '<li data-toggle="tooltip" data-original-title="'.$tip.'"'.$class.'>'.CHtml::link(Yii::t('common', $label), $url).'</li>';
			}
			echo '</ul>';
			?>
			
			<?php 
			echo $searchHtml;//搜索框
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
								'value'=>'Yii::t(\'common\', \'Role\')',
							),
							'description',
							'bizrule',
							'data',
						array(
							'header'=>Yii::t('common', 'Operation'),
							//'headerHtmlOptions' => array('style'=>'width:100px'),//th
							'class'=>'CButtonColumn',
							'template'=>'{role} {update} {delete}',//删除view
							
							//增加新按钮
							'buttons'=>array(
								'role' => array(
									'options'=>array('class'=>'btn btn-primary btn-xs','data-toggle'=>'tooltip','title'=>Yii::t('common','Role Config')),//a
									'label'=>'<i class="fa fa-gear"></i>',
									'imageUrl'=>0,
									'url'=>'Yii::app()->createUrl(\'backend/auth/role/config\', array(\'id\'=>$data->name))',
// 									'label'=>'...',     //按钮的文本标签.
// 									'url'=>'...',       //使用 PHP 表达式得出按钮的 URL.
// 									'imageUrl'=>'...',  //按钮的图片路径.
// 									'options'=>array(), //按钮的 HTML 选项.
// 									'click'=>'...',     //当点击按钮时调用的 javascript 函数
// 									'visible'=>'...',   //确定按钮是否显示的 PHP 表达式
								),
							),
					
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

