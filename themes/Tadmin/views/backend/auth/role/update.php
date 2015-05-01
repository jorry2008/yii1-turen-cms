<?php
/* @var $this RoleController */
/* @var $model AuthItem */

$this->breadcrumbs=array(
	'Auth Items'=>array('index'),
	$model->name=>array('view','id'=>$model->name),
	'Update',
);

$this->menu=array(
	array('label'=>'List AuthItem', 'url'=>array('index')),
	array('label'=>'Create AuthItem', 'url'=>array('create')),
	array('label'=>'View AuthItem', 'url'=>array('view', 'id'=>$model->name)),
	array('label'=>'Manage AuthItem', 'url'=>array('admin')),
);
?>

<div class="row">
    <div class="col-md-12">
        <!-- TABLE: LATEST ORDERS -->
        <div class="box box-primary collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo $model->isNewRecord?'<i class="fa fa-plus"></i> 创建':'<i class="fa fa-arrow-circle-up"></i> 更新'; ?></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    <!-- <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                <?php $this->renderPartial('_form', array('model'=>$model,'action'=>$action)); ?>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <!-- 
            <div class="box-footer clearfix">
                <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">
                    Place New Order
                </a>
                <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">
                    View All Orders
                </a>
            </div>
             -->
            <!-- /.box-footer -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->



<?php 
Yii::app()->clientScript->registerScript('batch', "
	jQuery(document).on('click','#role_box input:checkbox',function() {
		var type = $(this).attr('data-type');
		var name_ = $(this).val();
		var val = $(this).is(\":checked\");
		if(type == 'task') {
			jQuery(\"input[name=\'\"+name_+\"\[\]\']:enabled\").each(function() {this.checked=val;});
		} else if(type == 'operation') {
			$(this).parents('.box.box-solid').find('.task_on').attr('checked', false);
		}
	});
");
?>
<div class="row">
    <div class="col-md-12">
        <!-- TABLE: LATEST ORDERS -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-plus"></i> 授权</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <!-- <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                </div>
            </div><!-- /.box-header -->
            <div class="box-body" id="role_box">
            <?php echo CHtml::form($this->createUrl('addAuthToRole', array('id'=>$model->name))); ?>
            <?php 
            $col = 3;//$selectItems
            if(count($tasksAndOperations) > 0) {
            	foreach ($tasksAndOperations as $key=>$value) {
            		$task = $value['task'];
            		$operations = $value['operations'];
            		echo (($key+1)%$col == 0)?'<div class="row">':'';
            		?>
            		<div class="col-md-4">
				        <div class="box box-solid">
				            <div class="box-header with-border">
				                <?php echo CHtml::checkBox($task->name.'[]', in_array($task->name, $selectItems), array('id'=>$task->name, 'class'=>'task_on', 'value'=>$task->name, 'data-type'=>'task'));?>
				                <h3 class="box-title"><?php echo CHtml::label(Yii::t('auth_role', $task->description), $task->name);?></h3>
				            </div><!-- /.box-header -->
				            <div class="box-body">
				                <ul>
				                	<?php 
				                	foreach ($operations as $operation) {
					                	echo '<li>';
					                	echo CHtml::checkBox($task->name.'[]', (in_array($task->name, $selectItems) || in_array($operation->name, $selectItems)), array('id'=>$operation->name, 'class'=>'operation_on', 'value'=>$operation->name, 'data-type'=>'operation'));
					                	echo CHtml::label(Yii::t('auth_role', $operation->description), $operation->name);
						                echo '</li>';
									}
									?>
				                </ul>
				            </div><!-- /.box-body -->
				        </div><!-- /.box -->
				    </div><!-- ./col -->
            		<?php 
            		echo (($key+1)%$col == 0)?'</div>':'';
            	}
            }
            ?>
            
            <div class="row">
	            <div class="form-group">
					<label class="col-md-2 text-right form-label"></label>
					<div class="col-md-10">
						<div class="col-md-7">
						<?php echo CHtml::submitButton('给'.$model->name.'授权', array('class'=>'btn btn-primary')); ?>
						</div>
					</div>
				</div>
			</div>
			
            <?php echo CHtml::endForm(); ?>
			</div>
		</div>
	</div>
</div>