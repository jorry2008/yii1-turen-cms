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

**重点讲解GridView对象的排序原理**
可以看到gridview是通过链接，以url的方式将参数注入到系统
如：http://localhost/turen.pw/index.php?r=backend/user/user/admin&
User_sort=email.desc&ajax=user-grid
前面已经可以了解到getActionParams直接获取所有参数，并复用反射的原理
$method->invokeArgs($object,$ps);将参数$ps == $_GET，$object为action方法对象

然而，对于action而言，其它所有的get参数都用到了，唯一的User_sort=email.desc排序参数却没有使用到
原因是什么呢？
在以上过程中，系统只完成了MVC的C过程，V将来来到，但是M的数据还没有取出。
因此，User_sort=email.desc这个参数的参数名User_sort直接绑定了模型User
到此我们可以断定，这个排序参数是直接与数据模型绑定的！

而在实际开发过程中，我们会经常使用到数据源对象CDataProvider它是IDataProvider接口的实现。
最终实现数据源的有两个源：
CActiveDataProvider.php模型数据接口
CArrayDataProvider.php数组操作接口
两个源都来自抽象CDataProvider对象。
CDataProvider对象完成的就是对源接口的实现和对数据的整合，同时也整合了一些数据操作方法
从而使得源对象能够对数据再加工的特性！

废话说了那么多，那么排序的工作到底在哪里完成的：
CDataProvider

咱们从使用这些对象的过程开始讲起吧：
gridview对象需要一个数据源：'dataProvider'=>$model->search(),
即：
$criteria = new CDbCriteria;
return $ActiveDataProvider = new CActiveDataProvider($this, array(
	'criteria'=>$criteria,
// 	'sort'=>array(
// 		'class'=>'CSort',//指定排序类
// 		'multiSort'=>true,//连续排序
// 	),
));
























2.POST





 */