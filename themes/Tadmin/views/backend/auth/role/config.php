<?php
/* @var $this RoleController */
/* @var $model AuthItem */
$this->pageTitle = Yii::t('auth_role', 'Role Config');

$this->breadcrumbs=array(
	Yii::t('auth_role', 'Role Manage')=>array('admin'),
	Yii::t('auth_role', 'Config'),
);

$this->menu = array();
$this->menu[] = array('label'=>'List', 'url'=>array('admin'));
$this->menu[] = array('label'=>'Update', 'url'=>array('update', 'id'=>$id));
$this->menu[] = array('label'=>'Create', 'url'=>array('create'));
$this->menu[] = array('label'=>'Auth', 'url'=>'javascript:;');
?>

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
            <div class="tab-content clearfix">
                <div id="role_box" class="tab-pane active">
	            <?php 
	            echo CHtml::form($this->createUrl('config', array('id'=>$id)));
	            $col = 3;//$selectItems
	            if(count($tasksAndOperations) > 0) {
	            	foreach ($tasksAndOperations as $key=>$value) {
	            		$task = $value['task'];
	            		$operations = $value['operations'];
	            		echo (($key+1)%$col == 0)?'<div class="row">':'';
	            		?>
	            		<div class="col-md-4">
					        <div class="box box-solid normal_font">
					            <div class="box-header with-border">
					                <?php echo CHtml::checkBox($task->name.'[]', in_array($task->name, $selectItems), array('id'=>$task->name, 'class'=>'task_on', 'value'=>$task->name, 'data-type'=>'task'));?>
					                <h3 class="box-title"><?php echo CHtml::label(Yii::t('common', $task->description), $task->name);?></h3>
					            </div><!-- /.box-header -->
					            <div class="box-body">
					                <ul>
					                	<?php 
					                	foreach ($operations as $operation) {
						                	echo '<li>';
						                	echo CHtml::checkBox($task->name.'[]', (in_array($task->name, $selectItems) || in_array($operation->name, $selectItems)), array('id'=>$operation->name, 'class'=>'operation_on', 'value'=>$operation->name, 'data-type'=>'operation'));
						                	echo '&nbsp;';
						                	echo CHtml::label(Yii::t('common', $operation->description), $operation->name);
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
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
		</div>
        <!-- nav-tabs-custom -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
