<?php
/* @var $this AuthItemController */
/* @var $model AuthItem */

$this->pageTitle = Yii::t('auth_authItem', 'Auth Item Create');

$this->breadcrumbs=array(
	Yii::t('auth_authItem', 'Auth Item Manage')=>array('admin'),
	Yii::t('common', 'Create'),
);

// $this->menu=array(
// 	array('label'=>'List AuthItem', 'url'=>array('index')),
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
				$tip = Yii::t('common', 'Click Into').'('.Yii::t('common', $label).')';
				echo '<li data-toggle="tooltip" data-original-title="'.$tip.'"'.$class.'>'.CHtml::link(Yii::t('common', $label), $url).'</li>';
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
