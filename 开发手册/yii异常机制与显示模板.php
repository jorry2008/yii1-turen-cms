<?php
/*
 * 学习以下内容，你就知道如何去处理YII异常后的善后工作了。
 * 在系统初始化时
 * CApplication::__construct()
 * 执行如下：
 * $this->initSystemHandlers();//异常是以阶梯的形式一级一级的向后传递，直接最后由系统获取并处理为止
 * 进而对PHP系统绑定异常处理函数句柄
 * set_exception_handler(array($this,'handleException'));
 * 
 * 以上过程就将系统的最终异常处理交给了当前对象的方法：handleException()，此方法直接操作$this->getErrorHandler()即CErrorHandler异常处理类专门处理
 * $handler = $this->getErrorHandler();
 * $handler->handle($event);
 * 
 * 最终处理的结果即获取一个模板显示错误内容：
 * array(
[0] =>'C:\xampp\htdocs\test\turen\app\blog\themes\classic\views\system'//当前主题下的，里面的语言由自己去framework\views中复制即可
[1] =>'C:\xampp\htdocs\test\turen\app\blog\protected\views\system'//所有主题公用，对应语言去framework\views中复制即可
[2] =>'C:\xampp\htdocs\test\turen\framework\views'//系统默认的英文模板，没有选择语言的功能
)
 * 优先级从0到2
 * 
 * 
 * 经过测试发现这样一些问题：
 * 1.模板语言问题
 * yii没有将异常显示与系统的多语言特性相整合，
 * 即异常显示由模板自身的多语言特性自己决定自己的多语言特性，使用Yii::t();即可
 * framework\views中提供的语言包对应的异常模板，只是参考而已，直接复制过不能解决当前一种语言的显示，已经非常好了
 * 
 * 
 * 2.如何能正常渲染出错误模板，view
 * 在开发的时候，当把异常在Controller总控制器中抛出时那么程序的MVC结构执行到此就结束了，不再进行MVC过程
 * 此时系统直接将对应最终的模板直接渲染并输出，显示中没有布局的过程，显示相当难看
 * 有以下方式，一、直接使用系统的异常模板
 * 二、在Controller不要写太多出现异常的代码，所有要在Controller中完成的逻辑代码可以写在Controller的过滤器中，效果是一样的
 * 而且更合理。
 * 出现这个问题的原因：
 * protected function render($view,$data)
	{
		if($view==='error' && $this->errorAction!==null)
			Yii::app()->runController($this->errorAction);//重点重点
		else
		{
			// additional information to be passed to view
			$data['version']=$this->getVersionInfo();
			$data['time']=time();
			$data['admin']=$this->adminInfo;
			include($this->getViewFile($view,$data['code']));
		}
	}
	即Yii::app()->runController($this->errorAction);用来执行一个控制器和视图来完成对异常信息的渲染
	但是，可笑的是这个异常是由Controller抛出的，也就是说errorAction路由对应的任何控制器都将是Controller
	的子类，结果是这个控制器说什么都执行不了，那么布局的过程也就没有了，直接将view显示
	以上两个解决方案都是比较好的。
 * 
 * 
 * 最后留下一个重要的问题：
 * 就是ajax的异常处理，框架本身已经处理的非常好，
 * 所以在使用ajax的异常时，与正常的php方式完全一样。而没有必将自定义错误代码一级一级的向后传。。。
 * 
 
 * 
 */