<?php
/* @var $this SettingController */
/* @var $model Setting */

$this->breadcrumbs=array(
	'Settings'=>array('index'),
	Yii::t('common', 'Manage'),
);

$this->menu=array(
	array('label'=>'List Setting', 'url'=>array('index')),
	array('label'=>'Create Setting', 'url'=>array('create')),
);
?>

<div class="row">
    <div class="col-md-12">
    	<?php echo CHtml::form(array('update'), 'post', array('id'=>'form', 'enctype'=>'multipart/form-data'));?>
	        <!-- Custom Tabs -->
	        <div class="nav-tabs-custom">
	            <ul class="nav nav-tabs">
	                <li class="active">
	                    <a href="#tab_1" data-toggle="tab">常规选项</a>
	                </li>
	                <li>
	                    <a href="#tab_2" data-toggle="tab">网站信息</a>
	                </li>
	                <li>
	                    <a href="#tab_3" data-toggle="tab">本地化选项</a>
	                </li>
	                <li>
	                    <a href="#tab_4" data-toggle="tab">设定图片参数</a>
	                </li>
	                <li>
	                    <a href="#tab_5" data-toggle="tab">邮件协议</a>
	                </li>
	                <li>
	                    <a href="#tab_6" data-toggle="tab">服务器</a>
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
	            
	            <div class="tab-content clearfix">
	                <div class="tab-pane active" id="tab_1">
	                	<?php $this->renderPartial('_config/_base', array('configs'=>$configs));?>
	                </div>
	                <div class="tab-pane" id="tab_2">
	                	<?php $this->renderPartial('_config/_site', array('configs'=>$configs));?>
	                </div>
	                <div class="tab-pane" id="tab_3">
	                	<?php $this->renderPartial('_config/_local', array('configs'=>$configs, 'language'=>$language));?>
	                </div>
	                <div class="tab-pane" id="tab_4">
	                    <?php $this->renderPartial('_config/_pic', array('configs'=>$configs));?>
	                </div>
	                <div class="tab-pane" id="tab_5">
	                <?php $this->renderPartial('_config/_mail', array('configs'=>$configs));?>
	                </div>
	                <div class="tab-pane" id="tab_6">
	                    <?php $this->renderPartial('_config/_server', array('configs'=>$configs));?>
	                </div>
	                <!-- /.tab-pane -->
	                
	                <div class="form-group">
			            <label class="col-md-2 text-right form-label"></label>
			            <div class="col-md-10">
				            <div class="col-md-7">
			            		<button class="btn btn-primary" type="submit">提交</button>
			        		</div>
			        	</div>
			        </div>
	                
	            </div>
	            <!-- /.tab-content -->
			</div>
		<?php echo CHtml::endForm();?>
        <!-- nav-tabs-custom -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->





