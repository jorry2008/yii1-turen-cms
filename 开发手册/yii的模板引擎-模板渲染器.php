<?php
/*
Yii框架允许开发者使用自己喜好的模板语法 (例如 Prado， Smarty)来编写控制器或者挂件的视图。
这可以通过编写和安装一个viewRenderer应用组件来实现。
这个视图渲染器拦截CBaseController::renderFile的调用，通过自定义的模板语法编译视图文件，然后渲染最终编译结果。
注意：只有当编写的视图很少复用时才推荐使用自定义模板语法。否则的话，在应用中复用视图将会强制使用同样的模板语法。
接下来，我们会介绍如何使用 CPradoViewRenderer，一个和Prado框架类似，允许开发者使用自定义模板语法的视图渲染器。
例如：使用index.php模板进行了解析，但其中可以引入.tpl不需要渲染引擎处理的内容。
如果你想要开发自己的视图渲染器， CPradoViewRenderer是一个很好的指南。

CBaseController::renderFile
public function renderFile($viewFile,$data=null,$return=false)
{
	$widgetCount=count($this->_widgetStack);
	//判断渲染器配置的后缀和文件本身的后缀是否一致
	if(($renderer=Yii::app()->getViewRenderer())!==null && $renderer->fileExtension==='.'.CFileHelper::getExtension($viewFile))
	{
		//模板渲染器，执行renderFile进行最终的渲染
		$content=$renderer->renderFile($this,$viewFile,$data,$return);
	}
.
.
.
此组件为非必须组件，在CApplication和CWebApplication类中都没有进行核心组件注入。
它提供了$renderer=Yii::app()->getViewRenderer()，是因为框架本身需要用到这个组件进行拦截。

分析一下下面这句代码
($renderer=Yii::app()->getViewRenderer())!==null
它是判断Yii::app()对象中的此方法能不能返回一个对象，
说明：
1.框架提供了获取viewRenderer组件的getViewRenderer方法，并在框架其它地方用到。
2.它一定是一个非必须组件，所以要判断返回是否为null，在框架中用到了但不一定生效。
3.使用这个组件，必须要在main配置文件中配置才会生效。

我们如何使用它？
它的作用很明显，就是将用户自己的内容风格（如asp、java、短标签等）解析为正常的PHP模板文件。
并将模板文件存储在runtime的一个临时views目录下。
下次再来运行app时，取模板之前优先取最终生成的php模板文件，只是在第一次才会解析而已。
一旦源文件修改，系统会对比修改时间在第一时间更新临时php模板文件。
所以上线的项目不会因此而损耗更多的性能而且能维护开发者原有的代码风格。
使用它应先配置它：
//配置视图模板引擎（模板渲染器），它会将源模板文件解析为临时的php模板
'viewRenderer'=>array(
	'class'=>'CPradoViewRenderer',//默认
	'useRuntimePath'=>true,//使用runtime存储，临时存放解析后的php模板文件
	'filePermission'=>0755,//解析后的php模板文件的操作权限
	'fileExtension'=>'.php',//配置模板的后缀
),

模板视图文件中的风格如下：
// PHP tags:
<%= expression %>
//<?php echo expression ?>
<% statement %>
//<?php statement ?></li>

// component tags:
<com:WigetClass name1="value1" name2='value2' name3={value3} >
//<?php $this->beginWidget('WigetClass', array('name1'=>"value1", 'name2'=>'value2', 'name3'=>value3)); ?>
</com:WigetClass >
//<?php $this->endWidget('WigetClass'); ?>
<com:WigetClass name1="value1" name2='value2' name3={value3} />
//<?php $this->widget('WigetClass', array('name1'=>"value1", 'name2'=>'value2', 'name3'=>value3)); ?>

// cache tags:
<cache:fragmentID name1="value1" name2='value2' name3={value3} >
//<?php if($this->beginCache('fragmentID', array('name1'=>"value1", 'name2'=>'value2', 'name3'=>value3))): ?>
</cache:fragmentID >
//<?php $this->endCache('fragmentID'); endif; ?>

// clip tags:
<clip:clipID >
//<?php $this->beginClip('clipID'); ?>
</clip:clipID >
//<?php $this->endClip('clipID'); ?>

// comment tags:
<!--- comments --->
// the whole tag will be stripped off


复用的技巧，如何让模板部分渲染？
系统默认的模板引擎文件是.php类型
当模板解析器viewRenderer指定'fileExtension'=>'.tpl',//配置模板的后缀
解析器只解析.tpl类型模板文件，且与此文件是否引入其它模板文件无关。
那么我们在模板系统中开发时，需要解析的使用.tpl后缀，不需要解析的使用.tpl后缀
需求实现了，问题来了：这种需求有什么意义?
之所有使用这个引擎就是为了兼容各种代码风格的开发者而已，把解析的任务交给框架组件来做
如果是同一个人开发且需要兼容处理时开启引擎即可，使用.php即可
如果是不同人开发有需要兼容也有不需要兼容，直接开启使用.php即可
总之：需要兼容就开启，不需要兼容则关闭，就这么简单
两者混合起来使用，没有意义。





 */