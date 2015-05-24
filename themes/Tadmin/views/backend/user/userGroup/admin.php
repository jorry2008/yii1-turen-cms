<?php
/* @var $this UserGroupController */
/* @var $model UserGroup */
$this->pageTitle = Yii::t('user_userGroup', 'Administrator Group Manage');

$this->breadcrumbs=array(
	Yii::t('user_userGroup', 'Administrator Group Manage'),
);

// $this->menu=array(
// 	array('label'=>'List UserGroup', 'url'=>array('index')),
// 	array('label'=>'Create UserGroup', 'url'=>array('create')),
// );

// $id = $this->id.'-grid';
$id = 'user-group-grid';
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
								'name',
								array(
									//fa-edit
									//backend/auth/role/config&id=Editor
									'name'=>'role',
									'type'=>'raw',
									//一一查出角色名对应的角色描述
									'value'=>'CHtml::link(\'<i class="fa fa-external-link"></i>\', array(\'/backend/auth/role/config\', \'id\'=>$data->role), array(\'class\'=>\'btn btn-primary btn-xs\',\'data-toggle\'=>\'tooltip\',\'data-original-title\'=>Yii::t(\'user_userGroup\', \'Config The Auth\'),\'target\'=>\'_blank\')).\'&nbsp;\'.Yii::app()->authManager->getAuthItem($data->role)->description',
								),
								array(
									'name'=>'is_default',
									'type'=>'raw',
									'value'=>'($data->is_default)?\'<span class="label label-success">Yes</span>\':CHtml::link(\'<i class="fa fa-gear"></i>\', \'javascript:;\', array(\'class\'=>\'btn btn-primary btn-xs set_default\',\'data-toggle\'=>\'tooltip\',\'data-original-title\'=>Yii::t(\'user_userGroup\', \'Setting Default\')))',
								),
								array(
									'name'=>'status',
									'type'=>'raw',
									'value'=>'($data->status)?\'<span class="label label-success">Yes</span>\':\'<span class="label label-danger">No</span>\'',
								),
								'sort',
								array(
									'header'=>Yii::t('common', 'Operation'),
									//'headerHtmlOptions' => array('style'=>'width:100px'),//th
									'class'=>'CButtonColumn',
									'template'=>'{add} {update} {delete}',//删除view
									
									//增加新按钮
									'buttons'=>array(
										'add' => array(
											'options'=>array('class'=>'btn btn-primary btn-xs','data-toggle'=>'tooltip','title'=>Yii::t('common','Add New Group')),//a
											'label'=>'<i class="fa fa-plus-circle"></i>',
											'imageUrl'=>0,
											'url'=>'Yii::app()->createUrl(\'backend/user/userGroup/create\', array(\'parent_id\'=>$data->id))',
// 											'label'=>'...',     //按钮的文本标签.
// 											'url'=>'...',       //使用 PHP 表达式得出按钮的 URL.
// 											'imageUrl'=>'...',  //按钮的图片路径.
// 											'options'=>array(), //按钮的 HTML 选项.
// 											'click'=>'...',     //当点击按钮时调用的 javascript 函数
// 											'visible'=>'...',   //确定按钮是否显示的 PHP 表达式
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
									//'deleteConfirmation'=>'Yii::t(\'\')',
									'afterDelete'=>'function(link,success,data){layer.msg(data, {shift: 6})}',
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


<?php 
//设置为默认
if(Yii::app()->request->enableCsrfValidation) {
	$csrfTokenName = Yii::app()->request->csrfTokenName;
	$csrfToken = Yii::app()->request->csrfToken;
	$csrf = array($csrfTokenName=>$csrfToken);
} else
	$csrf = array();

$defaultUrl = Yii::app()->createUrl('backend/user/userGroup/setDefault', $csrf);

//处理js
Yii::app()->clientScript->registerScript('set_default', "
//全局变量，记录触发者
var the_this;
$(document).on('click', '#{$id}'+' .set_default', function(){//因为要刷新，所以应该旧延迟绑定
	the_this = $(this);
	//提交处理
	var tr = the_this.parents('tr').eq(0);
	var id = tr.find('.checkbox-column input').val();
	$.ajax({
		type: 'GET',
		dataType: 'json',
		url: '{$defaultUrl}',
		data: 'id='+id,
		success: function(data) {
			if(data.status == '1') {
				jQuery('#{$id}').yiiGridView('update');//更新整个grid
			} else {
				alert(data.message);
			}
		},
		error: function(XHR) {
			console.debug(XHR);
			return false;
			//return afterDelete(th, false, XHR);
		},
		beforeSend: function() {
			layer.msg('加载中', {icon: 16});
		},
		complete: function() {
			//$(this).find('.fa').remove();
		}
	});
	return false;
});

");
?>
