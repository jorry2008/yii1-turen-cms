<div class="row">
    <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#tab_1" data-toggle="tab">常规项</a>
                </li>
                <li>
                    <a href="#tab_2" data-toggle="tab">网店信息</a>
                </li>
                <li>
                    <a href="#tab_" data-toggle="tab">本地化选项</a>
                </li>
                <li>
                    <a href="#tab_" data-toggle="tab">设定图片参数</a>
                </li>
                <li>
                    <a href="#tab_" data-toggle="tab">邮件协议</a>
                </li>
                <li>
                    <a href="#tab_" data-toggle="tab">服务器</a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">其它
                        <span class="caret">
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li role="presentation">
                            <a role="menuitem" tabindex="-1" href="#">测试一</a>
                        </li>
                        <li role="presentation" class="divider">
                        </li>
                        <li role="presentation">
                            <a role="menuitem" tabindex="-1" href="#">测试二</a>
                        </li>
                    </ul>
                </li>
            </ul>
            
            <!-- 
            <span class="pull-right">
	            <a class="btn btn-social-icon btn-facebook pull-right">保存</a>
				<a class="btn btn-social-icon btn-facebook pull-right">取消</a>
			</span>
			 -->
            
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                	<?php $this->renderPartial('_cofnig/_base');?>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    The European languages are members of the same family. Their separate
                    existence is a myth. For science, music, sport, etc, Europe uses the same
                    vocabulary.
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
/* @var $this SettingController */
/* @var $model Setting */

$this->breadcrumbs=array(
	'Settings'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Setting', 'url'=>array('index')),
	array('label'=>'Create Setting', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#setting-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Settings</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'setting-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'code',
		'key',
		'value',
		'serialized',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
