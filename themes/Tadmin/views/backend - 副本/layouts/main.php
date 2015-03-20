<!DOCTYPE html>
<html lang="<?php echo Yii::app()->language;?>">
<head>
	<!--[if lt IE 9]>
	<script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body class="<?php echo $route = str_replace('/', '-', $this->module->id);echo ' '.$route.'-'.$this->id; ?>">

	<header id="top" class="navbar navbar-default navbar-fixed-top">
	    <div class="container">
	        <div class="navbar-header">
	        	<?php echo CHtml::link(Yii::app()->name,Yii::app()->homeUrl,array('class'=>'navbar-brand')); ?>
	        </div>
	        
	        <div class="navbar-collapse collapse" id="navbar">
		        <?php 
		        //$route = Yii::app()->urlManager->parseUrl(Yii::app()->request);
		        $backendRoute = (string)substr($this->module->id,strpos($this->module->id,'/')+1).'/'.$this->id.'/'.$this->action->id;
		        $this->widget('zii.widgets.CMenu',array(
		        	'encodeLabel'=>false,//关闭自动转码
	        		'htmlOptions'=>array('class'=>'nav navbar-nav'),//ul
	        		'submenuHtmlOptions'=>array('class'=>'dropdown-menu','role'=>'menu'),//sub ul
	        		'itemCssClass'=>'',//all li
			        'items'=>array(
		        		array('label'=>'<span class="glyphicon glyphicon-home" aria-hidden="true"></span>浏览前台', 'url'=>array('/frontend/site/post/index'),'active'=>$backendRoute == 'admin/post/index'),
		        		array('label'=>'<span class="glyphicon glyphicon-comment" aria-hidden="true"></span>8', 'url'=>array('site/page', 'view'=>'about'),'active'=>$backendRoute == 'admin/site/page'),
// 		        		array('label'=>'Contact', 'url'=>array('site/contact'),'active'=>$backendRoute == 'admin/site/contact'),
// 		        		array('label'=>'Login', 'url'=>array('site/login'), 'visible'=>Yii::app()->user->isGuest,'active'=>$backendRoute == 'admin/site/login'),
// 		        		array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('site/logout'), 'visible'=>!Yii::app()->user->isGuest,'active'=>$backendRoute == 'admin/site/logout'),
						array(
							'label'=>'<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>新建',
							'url'=>'#',
							'linkOptions'=>array('class'=>'dropdown-toggle','aria-expanded'=>'false','role'=>'button','data-toggle'=>'dropdown'),
							'itemOptions'=>array('class'=>'dropdown'),//only li
							'items'=>array(
								array('label'=>'发表文章', 'url'=>array('site/index')),
								array('label'=>'', 'url'=>array('site/index'),'itemOptions'=>array('class'=>'divider')),
								array('label'=>'查看用户', 'url'=>array('site/index')),
								array('label'=>'查看订单', 'url'=>array('site/index')),
							),
						),
			        		
		        		array(
	        				'label'=>'<span class="glyphicon glyphicon-star" aria-hidden="true"></span>快捷键',
	        				'url'=>'#',
	        				'linkOptions'=>array('class'=>'dropdown-toggle','aria-expanded'=>'false','role'=>'button','data-toggle'=>'dropdown'),
	        				'itemOptions'=>array('class'=>'dropdown'),//only li
	        				'items'=>array(
        						array('label'=>'发表文章', 'url'=>array('site/index')),
        						array('label'=>'', 'url'=>array('site/index'),'itemOptions'=>array('class'=>'divider')),
        						array('label'=>'查看用户', 'url'=>array('site/index')),
        						array('label'=>'查看订单', 'url'=>array('site/index')),
	        				),
		        		),
			        ),
		        	
		        ));
		        ?>
		        <?php 
		        $this->widget('zii.widgets.CMenu',array(
		        	'encodeLabel'=>false,//关闭自动转码
	        		'htmlOptions'=>array('class'=>'nav navbar-nav navbar-right'),//ul
	        		'submenuHtmlOptions'=>array('class'=>'dropdown-menu','role'=>'menu'),//sub ul
	        		'itemCssClass'=>'',//all li
			        'items'=>array(
						array(
							'label'=>'<span class="glyphicon glyphicon-user" aria-hidden="true"></span>admin',
							'url'=>'#',
							'linkOptions'=>array('class'=>'dropdown-toggle','aria-expanded'=>'false','role'=>'button','data-toggle'=>'dropdown'),
							'itemOptions'=>array('class'=>'dropdown'),//only li
							'items'=>array(
								array('label'=>'关于', 'url'=>array('site/index')),
								array('label'=>'', 'url'=>array('site/index'),'itemOptions'=>array('class'=>'divider')),
								array('label'=>'个人资料', 'url'=>array('site/index')),
								array('label'=>'登出', 'url'=>array('site/index')),
							),
						),
			        ),
		        	
		        ));
		        ?>
	        </div>
	    </div>
	</header>
	
	<div id="tmain">
	<?php echo $content; ?>
	</div>
	
</body>
</html>
