<?php
/*
 * 这个知识点是yii的核心架构之一，请仔细分析
 * 
1.模块执行的流程
CApplication::run();//Yii::app()->run();
CWebApplication::processRequest();
CWebApplication::runController($route);
CWebApplication::createController($route);//从这里开始处理模块与控制器-->
CController::run($actionID);
从createController开始就有了MVC的影子~

-->
 * 这是一个就对当前环境创建一个正确的控制器对象并返回方法id
 * 它解决了如下文件和url的组织模式：
 * 1.r=模块
 * 2.r=模块/控制器
 * 3.r=模块/控制器/方法
 * 4.r=模块1/模块2/控制器1/控制器2
 * 5.r=模块1/模块2/控制器1/控制器2/方法



2.分析module的设计模式
这是一个工厂设计模式和一个依赖接口的设计原则
CWebApplication继承CApplication继承CModule
而
XyzModule继承CWebModule继承CModule

最后整个应用由CWebApplication控制执行流程，那么
CWebApplication直接对接webapp，间接就对接了moduleapp，其对应的“接口”就是CModule

所以框架的一个完整的流程下来，一次只能有一个并列的module被激活，
对于CWebApplication而言，每次操作对接的module也只有一个，这个时候就是工厂的特征了。

这样做有什么意义呢？
首先我们看到整合整个框架的app()对象并没有改变。而且在有module的情况下，一次只能激活一个，如果是多个的话，
那一次是嵌套激活产生的。重点是：
module都有自己的容器，包括组件配置数组、命名空间、布局、模板等等，
因此：webapp和若干moduleapp的工作模式是平等且相互独立的，只是在配置文件中感觉是个多维数组，但它们的确是一样的，这很灵活。



3.webapp与moduleapp的关系
其实在第2个描述中已经明确了两者的关系，现在说说它们在实践中的区别：
private $_components;
private $_componentConfig;
两个属性，是为app()配置整个框架的组件的容器。在模块中这两个属性是没有被实现的。
我们发现，app()对象继承CModulet和moduleapp对象都继承CModule
其中，app()实现了几乎所有的属性和方法，而moduleapp只实现了一部分，即只实现了接口的那一部分。

所以结论是，一维的main配置属于app()，而二维的module参数配置只能参考app()的一部分，至于是哪些，
下面将有实例说明。



4.模块的命名空间问空
每个模块的创建和引用，都将创建一个全新的命名空间
如gii：
'modules'=>array(
	'gii'=>array(
		'class'=>'system.gii.GiiModule',//声明一个名为gii的模块，它的类是GiiModule。
		'password'=>'asdasd',//为这个模块设置了密码，访问Gii时会有一个输入框要求填写这个密码。
		'ipFilters'=>array('*'),// 默认情况下只允许本机访问Gii
	),
),
这样，gii的整个mvc流程都迁移到了一个全新的模块下，与外界没有任何关联，这个是基于yii的命名空间

又如以下：
// adding "mynamespace" namespace
Yii::setPathOfAlias('mynamespace', '/var/www/common/mynamespace/');
 
'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
'name'=>'My Web Application',
'controllerMap' => array(
	'test' => '\mynamespace\controllers\TestController',
),
这样做，同样也可以不论module包在何处，都可以拓展一个全新的空间，这个也是基于yii的命名空间


还如以下：
// define namespace:
namespace mynamespace\controllers;

// since class is now under namespace, global namespace
// should be referenced explicitly using "\":
class TestController extends \CController
{
    public function actionIndex()
    {
        echo 'This is TestController from \mynamespace\controllers';
    }
}
同上述一样，这里完全使用了php5.3的特性。

注意，使用命名空间优先级，仅次于controllerMap，同样它也是排除了module



5.如何配置模块









6.模块与设计
分别在小型应用场景和大型应用场景的思路























 * Creates a controller instance based on a route.
 * The route should contain the controller ID and the action ID.
 * It may also contain additional GET variables. All these must be concatenated together with slashes.
 *
 * This method will attempt to create a controller in the following order:
 * <ol>
 * <li>If the first segment is found in {@link controllerMap}, the corresponding controller configuration will be used to create the controller;</li>
 * <li>If the first segment is found to be a module ID, the corresponding module will be used to create the controller;</li>
 * <li>Otherwise, it will search under the {@link controllerPath} to create the corresponding controller. 
 * For example, if the route is "admin/user/create", then the controller will be created using the class file "protected/controllers/admin/UserController.php".</li>
 * </ol>
 * @param string $route the route of the request.
 * @param CWebModule $owner the module that the new controller will belong to. Defaults to null, meaning the application instance is the owner.
 * @return array the controller instance and the action ID. Null if the controller class does not exist or the route is invalid.
基于路由，创建一个控制器对象
这个路由至少包含controller和actionID，有默认的也行，但一定得包含
也可能包含其它参数变量，$this->parseActionParams($route)，actionID需要的参数

这个方法按照下面的顺序，尝试创建一个控制器：
1.如果第一截路由在app()的controllerMap中发现，则对应的控制器配置将被用于创建控制器对象，优先级最高
2.如果第一截路由发现是一个module ID，那么此方法将递归，要么继续寻找module的controllerMap，要么就找到module自身的controller即，
假如有多个层级module，那么递归将进行到底，中间也不会发生什么。
3.另外，



 */