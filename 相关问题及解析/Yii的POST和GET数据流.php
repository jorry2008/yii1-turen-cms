<?php
/*
在学习yii的过程中，很难发现get数据和post数据是如何走入到系统并最终使得到数据库等业务逻辑中的，
下面就来讲解一下这两类数据的整个流程。


公共部分：
在请求对象中
CHttpRequest：
if(isset($_GET))
	$_GET=$this->stripSlashes($_GET);
if(isset($_POST))
	$_POST=$this->stripSlashes($_POST);
if(isset($_REQUEST))
	$_REQUEST=$this->stripSlashes($_REQUEST);
if(isset($_COOKIE))
	$_COOKIE=$this->stripSlashes($_COOKIE);
对客户端所有数据进行转义，并且触发了一个安全事件。


CUrlManager：
$_GET[$this->routeVar]
$_POST[$this->routeVar]
$this->routeVar = 'r';//自定义
即系统的路由参数，即可以由get提交，也可以来自post


1.GET
CControler：
public function getActionParams()
{
	return $_GET;
}
直接获取所有get参数，并直接将参数推入到action方法中。
这样做的直接结果就是：
public function actionView($id, $r, $User_sort)
{fb($r);//这个是路由的参数
fb($User_sort);//排序参数
	$this->render('view',array(
		'model'=>$this->loadModel($id),
	));
}
可以在被调用的acion方法参数中，任意的取get参数







2.POST





 */