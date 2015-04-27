<?php
//获取默认文件加载路径
array_unique(explode(PATH_SEPARATOR,get_include_path()));

//以类的方式注册一个文件加载器
spl_autoload_register(array('YiiBase','autoload'));
//在过程化编程中使用的是魔术方法，系统会自动注册这个加载器
function __autoload($class){}

//register_shutdown_function注册一个函数，用来捕获错误并在程序执行完成后开始动作。
function test() {
	echo "test()";
}
register_shutdown_function(array("test"));
echo "show: ";
//输出：show: test()

//标准化请求所有前端参数
if(function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc())
{
	if(isset($_GET))
		$_GET=$this->stripSlashes($_GET);
	if(isset($_POST))
		$_POST=$this->stripSlashes($_POST);
	if(isset($_REQUEST))
		$_REQUEST=$this->stripSlashes($_REQUEST);
	if(isset($_COOKIE))
		$_COOKIE=$this->stripSlashes($_COOKIE);
}







/*
yii规律：
1.控制器都包含一个_module属性，并指向自身所属的模块对象。
因为控制器是由webapp对象创建的，并把当前运行的module对象传递给它了。

2.





*/

/**
 * 1.加载：
 * 通过以组件化的方式在yii中开发，可以直接通过配置文件的方式使新增加的类以组件的方式成为框架的属性，
 * 进而利用框架属性的延迟性实现实现化对象，任何地方都适合，特别是对象使用频率很高时适合。
 * 更上一层就是使用$filter=Yii::createComponent($filter);
 * 这个方式的好处就是继承了框架的事件和行为，最好是只使用一次的地方使用
 * 
 * 2.
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 */