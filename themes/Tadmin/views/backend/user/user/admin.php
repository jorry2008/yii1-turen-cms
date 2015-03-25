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



<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
        
            <div class="box-header">
                <h3 class="box-title">Responsive Hover Table</h3>
                <div class="box-tools">
                    <div class="input-group">
                        <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search" />
                        <div class="input-group-btn">
                            <button class="btn btn-sm btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <td>
                            175
                        </td>
                        <td>
                            Mike Doe
                        </td>
                        <td>
                            11-7-2014
                        </td>
                        <td>
                            <span class="label label-danger">Denied</span>
                        </td>
                        <td>
                            Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.
                        </td>
                    </tr>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>



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
			$this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'user-grid',
				'dataProvider'=>$model->search(),
				//'filter'=>$model,//不显示过滤器
				'summaryText'=>'',//不显示分页信息
				'itemsCssClass'=>'table table-hover',//表格table上的样式
				'htmlOptions'=>array('class'=>'box-body table-responsive no-padding'),//整个表的样式，与id同级
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
