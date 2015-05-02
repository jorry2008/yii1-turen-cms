<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<div class="row">
    <div class="col-md-12">
        <!-- TABLE: LATEST ORDERS -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-plus"></i> 创建</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                <?php $this->renderPartial('_form', array('model'=>$model, 'group_list'=>$group_list)); ?>
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

