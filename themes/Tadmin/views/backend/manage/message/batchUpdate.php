<?php
/* @var $this UserController */
/* @var $model User */
$this->pageTitle = Yii::t('manage_message', 'Translation Batch Update');

$this->breadcrumbs=array(
	Yii::t('manage_message', 'Translation Manage')=>array('admin'),
	//$model->id=>array('view','id'=>$model->id),
	Yii::t('common', 'Batch Update'),
);

$id = $this->getAction()->id;
$this->menu = array();
$this->menu[] = array('label'=>'List', 'url'=>($id == 'admin')?'javascript:;':array('admin'));
$this->menu[] = array('label'=>'Batch Update', 'url'=>($id == 'batchUpdate')?'javascript:;':array('update'));
//$this->menu[] = array('label'=>'Create', 'url'=>($id == 'create')?'javascript:;':array('create'));
?>

<?php 
//echo $form->errorSummary($model); 
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
                	<?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'user-form',
						'action'=>Yii::app()->createUrl($this->route),
						// Please note: When you enable ajax validation, make sure the corresponding
						// controller action is handling ajax validation correctly.
						// There is a call to performAjaxValidation() commented in generated controller code.
						// See class documentation of CActiveForm for details on this.
						'enableAjaxValidation'=>false,
					)); ?>
					    <div class='box-body'>
					    <?php foreach ($models as $key=>$model) {?>
					        <div class='row' style="margin: 10px 0 10px;">
					            <div class='col-sm-4 col-md-4'>
					                <div class='text-center'>
					                    <?php echo $model->source->message; ?>
					                </div>
					            </div>
					            <!-- /.col -->
					            <div class='col-sm-6 col-md-6'>
					                <div>
					                    <?php echo $form->textArea($model,'translation', array('rows'=>2, 'style'=>'width:100%')); ?>
										<?php echo $form->error($model,'translation'); ?>
					                </div>
					            </div>
					            <!-- /.col -->
					            <div class='col-sm-2 col-md-2'></div>
					            <!-- /.col -->
					        </div>
					        <?php }?>
					        <!-- /.row -->
					        
							<div class='text-center'>
								<?php echo CHtml::htmlButton('<i class="fa fa-save"></i> '.Yii::t('common', 'Save'), array('class'=>'btn btn-primary','type'=>'submit'));?>
							</div>
					                
					    </div>
					    <!-- /.box-body -->
					<!-- /.box -->
					<?php $this->endWidget(); ?>
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


