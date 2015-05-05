<?php
/* @var $this UserController */
/* @var $model User */

$this->pageTitle = Yii::t('user_user', 'Role Create');

$this->breadcrumbs=array(
	'Create',
);
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

