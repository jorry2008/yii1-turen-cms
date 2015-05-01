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
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo $model->isNewRecord?'<i class="fa fa-plus"></i> 创建':'<i class="fa fa-arrow-circle-up"></i> 更新'; ?></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
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
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
				<div class="row">
				    <div class="col-md-4">
				        <div class="box box-solid">
				            <div class="box-header with-border">
				                <i class="fa fa-text-width"></i>
				                <h3 class="box-title">Unordered List</h3>
				            </div>
				            <!-- /.box-header -->
				            <div class="box-body">
				                <ul>
				                    <li>
				                        Lorem ipsum dolor sit amet
				                    </li>
				                </ul>
				            </div>
				            <!-- /.box-body -->
				        </div>
				        <!-- /.box -->
				    </div>
				    <!-- ./col -->
				    <div class="col-md-4">
				        <div class="box box-solid">
				            <div class="box-header with-border">
				                <i class="fa fa-text-width"></i>
				                <h3 class="box-title">Ordered Lists</h3>
				            </div>
				            <!-- /.box-header -->
				            <div class="box-body">
				                <ol>
				                    <li>
				                        Lorem ipsum dolor sit amet
				                    </li>
				                </ol>
				            </div>
				            <!-- /.box-body -->
				        </div>
				        <!-- /.box -->
				    </div>
				    <!-- ./col -->
				    <div class="col-md-4">
				        <div class="box box-solid">
				            <div class="box-header with-border">
				                <i class="fa fa-text-width"></i>
				                <h3 class="box-title">Unstyled List</h3>
				            </div>
				            <!-- /.box-header -->
				            <div class="box-body">
				                <ul class="list-unstyled">
				                    <li>
				                        Lorem ipsum dolor sit amet
				                    </li>
				                </ul>
				            </div>
				            <!-- /.box-body -->
				        </div>
				        <!-- /.box -->
				    </div>
				    <!-- ./col -->
				</div>
				<!-- /.row -->


			</div>
		</div>
	</div>
</div>