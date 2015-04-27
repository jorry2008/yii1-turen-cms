<?php
/*
 * 可能通过日志来查看整个程序执行流程。
 * 
yii的流程中，创建对象的顺序如下：
1.Yii::createWebApplication($config);//载入配置并创建app应用对象
对象即：Yii静态对象（可认为是YiiBase静态对象），Yii::app();
Yii

2.$route=$this->getUrlManager()->parseUrl($this->getRequest());
分别创建了两个组件对象
CUrlManager
CHttpRequest

3.if(($ca=$this->createController($route))!==null)
通过当前路由初始化创建控制器对象
如：PostController

4.if(($action=$this->createAction($actionID))!==null)
根据路由提供的actionID(就是action方法名的一部分)创建action对象
CAction

5.if(($parent=$this->getModule())===null)
{
	$parent=Yii::app();
}
$parent对象可能是Module或者Yii::app()
如：AccountModule

6.CFilterChain::create($this,$action,$filters)->run();
生成过滤器链对象
CFilterChain

6.1.$this->controller->runAction($this->action);
当过滤器对象执行run()方法后
便直接执行控制器中的runAction方法
到此，控制器的方法已经开始执行，如：PostController::actionView();

7.（可选）if(($renderer=Yii::app()->getViewRenderer())!==null)
创建viewRenderer模板引擎（渲染器）对象，此对象实现了模板引擎功能，从而兼容多种代码风格的编写
CPradoViewRenderer

8.Yii::app()->getClientScript()->render($output);
当获取完整个页面后，为页面处理并获取客户端脚本
CClientScript

到这里基本的对象创建就完成了，之所有还有那么多组件对象没有创建，是因为它们还没有用上呢。

































 */