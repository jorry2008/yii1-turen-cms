<?php
/*
1.模板文件规则！！！

控制器action调用模板的方式如下：
$this->render('index');
$this->render('/index');
$this->render('//index');
$this->render('ext.themes.post.index');

分别嵌套的路径形式如下：
$viewName
$viewPath（空，严格按照，模块1/模块2/模块n/控制器1/控制器2/控制器n/）
$basePath（//，去除模块和控制器名）
$moduleViewPath（/，去除了控制器名）

分别对应：$this->resolveViewFile();
index
C:\xampp\htdocs\test\turen\app\blog\themes\classic\views/frontend/site/post
C:\xampp\htdocs\test\turen\app\blog\themes\classic\views
C:\xampp\htdocs\test\turen\app\blog\themes\classic\views/frontend/site

处理后的结果：
C:\xampp\htdocs\test\turen\app\blog\themes\classic\views/frontend/site/post/index.php(空)
C:\xampp\htdocs\test\turen\app\blog\themes\classic\views/frontend/site/index.php(/)
C:\xampp\htdocs\test\turen\app\blog\themes\classic\views/index.php(//)



处理以上过程，最后就处理语言本地化模板了，
return Yii::app()->findLocalizedFile($viewFile.'.php');//不多说，你懂得

//通过以上过程，系统可以指定正确的模板文件路径，
//但在正确的路径下，开发者并没有提供对应的模板文件，怎么办？以下就是最终解决方案

再次调用解析方法：$this->resolveViewFile();
index
C:\xampp\htdocs\test\turen\app\blog\protected\modules\frontend\modules\site\views\post
C:\xampp\htdocs\test\turen\app\blog\protected\views
C:\xampp\htdocs\test\turen\app\blog\protected\modules\frontend\modules\site\views
显然，这个过程与Theme对象类似。


以上是yii提供的原生的规则，那么我们如何进行修改它们呢？
很可惜，以上规则够用，框架没有提供修改的可能，只是可以指定基本路径，如下，
C:\xampp\htdocs\test\turen\app\blog\themes
其它的路径关系无法修改。



2.布局文件规则！！！

$layoutFile=$this->getLayoutFile($this->layout);
其中$this->layout，可以是当前控制器中的layout属性，也可以是其父类指定。
如果直接设置
$this->layout = false;
$this->layout = null;
$this->layout = '';
或者一个不存在的布局文件，这样是允许的，那么返回的结果都将是没有布局的layoutFile...
其中，$this->layout = false;效率最高。

首先，$this->layout是由控制器对象提供：
$this->layout = 'column2';
$this->layout = '/column2';
$this->layout = '//column2';

$this->layout = false;
$this->layout = '';
$this->layout = null;
$this->layout = 'abcd';//不存在的情况

假如在当前控制器或其父类都没有找到，则取用module中的布局。
注意：module是嵌套执行的，即ModuleId = 'frontend/site';的类型。
因此，所有的布局和默认控制器，都可以在模块、控制器、配置文件中指定，
优先级：控制器>模块>配置文件，其中模块是多层嵌套递归的，直到获取那个有layout属性的模块为止！！！
注意：在任何一步，只要layout = false;则立即返回，布局不再渲染
* 优先级如下：
* 1.取当前控制器layout属性
* 2.取当前控制器父layout属性
* 3.取当前模块layout属性
* 4.取当前模块外层模块layout属性，直到尽头
* 5.取配置文件main的layout值
最终的原则是：谁定义了layout，那么布局文件的路径就跟谁

结果如下：
public $layout = 'column2';
//C:\xampp\htdocs\test\turen\app\blog\themes\classic\views/frontend/layouts\column2(空)
//C:\xampp\htdocs\test\turen\app\blog\themes\classic\views/frontend/column2(/)
//C:\xampp\htdocs\test\turen\app\blog\themes\classic\views//column2(//)


3.main文件渲染规则与局部视图渲染完全一样。是借助widgit进行的
所以3和1是模式是一样的。

写法如：
<?php $this->beginContent('//frontend/layouts/main'); ?>








 */