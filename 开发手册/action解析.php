<?php 
/*
位置：CController.createActionFromMap
当前$this对象为MVC中的C

当一个请求中有一个方法在当前指定的控制器对象中未找到则会通过当前控制器对象的actions方法搜索出actionMap。
如果当前请求action存在，则运行 CInlineAction extend CAction {}进而调用当前控制器的方法执行。
请求参数的形式有如下：
1.r=site/action1
直接获取当前actionMap数组，通过数组加载一个继承CAction子对象，并执行其run方法，附加参数即该子对象的属性。
function actions()
{
	return array(
		'action1'=>array(
				'class'=>'application.controllers.post.UpdateAction',
				'property1'=>'value1',
			 ),
			
	);
}
经典的例子就是框架下一个blog的demo中验证码实现

2.r=site/pro2.action1
假如一个控制器对象已经通过actionMap的形式访问了对应的方法，那么我们也要使用这个方法，且不能直接使用
那么这种方式就非常有效了，
pro2.对应一个控制器对象，
action1对应这个控制器对象对应的方法action1
最终引入了两个对象，
function actions()
{
	return array(
		'pro2.'=>array(
			'class'=>'application.controllers.SiteController', 
			'action1'=>array(//这里也可以是字符串，表示引入的类
				'property1'=>'value120'
			)
		)
	);
}
显然这种方式是建立在第一种方式的基础之上的，为什么有这种需求，在filter参于的情况下，有必要。

3.r=site/pro3.pro2.action1或proN.proN-1.....pro3.pro2.action1
这种情况表面看复杂，但其实现的机制就是个递归，它处理的时候问题将参数拆分两部分
[proN.][proN-1.....pro3.pro2.action1]
function actions
{
return array(
		'pro3.'=>array(
			'class'=>'application.controllers.PostController',
			'pro2.action1'=>'Classfile',//如果是字符串，则是一个要加载的附加类
			//'pro2.action1'=>array('property1'=>'value100000'),//如果是参数，则这个参数是最终执行action的参数对
		),
	);
}
重点在于[proN-1.....pro3.pro2.action1]这部分的值，
这部分的值可以是string或者params
如果是string框架会强制认为它是一个类的路径，最终会优先替代CAction子对象类，
如果是params框架会认为它是最终CAction子对象的属性，这个过程就是本教程1和2的反复~

不论怎样，yii的这个机制就是为了实现action的最大限度的复用。
这个过程有没有曾经见过，对了
module和controller基本也是这种思路。


下面说说action
在application.web.actions目录下
CAction(base类)
CInlineAction
CViewAction
三个类，
直接返回一个ction对象
CAction
以对象的方式返回当前控制器对象的一个方法
return new CInlineAction($this,$actionID);

*/








