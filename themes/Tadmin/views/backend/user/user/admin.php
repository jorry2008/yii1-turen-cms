<?php
/* @var $this UserController */
/* @var $model User */

$this->pageTitle = Yii::t('user_user', 'Administrator Manage');

$this->breadcrumbs=array(
	Yii::t('common', 'Manage'),
);

/*
$this->menu=array(
	array('label'=>'List', 'url'=>array('admin')),
	array('label'=>'Create', 'url'=>array('create')),
	array('label'=>'Update', 'url'=>array('update')),
);
*/

$id = $this->id.'-grid';
$searchHtml = $this->renderPartial('_search', array('model'=>$model, 'id'=>$id),true);
$batchHtml = $this->renderPartial('_batch', array('model'=>$model, 'id'=>$id),true);
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
	                	<?php 
						$this->widget('TGridView', array(
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
							'template'=>"{summary}\n{items}\n{pager}",//整个grid的布局占位符
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
						// 			'headerTemplate'=>'{item}<span class="lbl"></span>',
						// 			'checkBoxHtmlOptions'=>array('class'=>'ace'),
								),
								'user_name',
								'nick_name',
								'email',
								array(
									//'header'=>'测试列头部文本',
									'name'=>'user_group_id',
									'type'=>'raw',
									'value'=>'$data->user_group->name',//'UserGroup::model()->findByPk($data->user_group_id)->name',
									//'htmlOptions'=>array('class'=>'aaaa'),
									//'cssClassExpression'=>'$row+8',
									//'visible'=>true,
									//'footer'=>'测试列底部文本',
									//'filter'=>'abc',//创建一个过滤器，可以是数组，默认为当前字段的input text类型
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
									'name'=>'is_admin',
									'type'=>'raw',
									'value'=>'$data->is_admin',
								),
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

