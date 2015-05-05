<?php
/* @var $this AuthItemController */
/* @var $model AuthItem */

$this->pageTitle = Yii::t('user_user', 'Auth Item Manage');

$this->breadcrumbs=array(
	'Mange Items'=>array('admin'),
	'Update',
);

// $this->menu=array(
// 	array('label'=>'List AuthItem', 'url'=>array('index')),
// 	array('label'=>'Create AuthItem', 'url'=>array('create')),
// 	array('label'=>'View AuthItem', 'url'=>array('view', 'id'=>$model->name)),
// 	array('label'=>'Manage AuthItem', 'url'=>array('admin')),
// );
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
            <div class="tab-content clearfix">
                <div class="tab-pane active">
                <?php $this->renderPartial('_form', array('model'=>$model)); ?>
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
