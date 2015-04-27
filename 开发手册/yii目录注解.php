<?php 
/*
Yii框架目录结构功能注释

|-framework     框架核心库
|--base         底层类库文件夹，包含：CApplication(应用类，负责全局的用户请求处理，它管理应用组件集，将提供特定功能给整个应用程序),
	CComponent(组件类，该文件包含了基于组件和事件驱动编程的基础类，从版本1.1.0开始，
	一个行为的属性（或者它的公共成员变量或它通过getter和/或setter方法定义的属性）可以通过组件的访问来调用),
	CBehavior(行为类，主要负责声明事件和相应事件处理程序的方法、将对象的行为附加到组件等等),
	CModel(模型类，为所有的数据模型提供的基类),
	CModule(是模块和应用程序的基类，主要负责应用组件和子模块)等等
|--caching      所有缓存方法，其中包含了Memcache缓存，APC缓存，数据缓存，CDummyCache虚拟缓存，CEAcceleratorCache缓存等等各种缓存方法
|--cli          Yii项目生成脚本，yii的命令行方式
|--collections  容器，用php语言构造传统OO语言的数据存储单元。如：队列，栈，哈希表等等
|--console      Yii控制台
|--db           数据库操作类
|--gii          Yii 代码生成器(脚手架)，能生成包括模型，模块，控制器，视图等代码
|--i18n         Yii 多语言，提供了各种语言的本地化数据，信息、文件的翻译服务、本地化日期和时间格式，数字等
|--logging   	日志组件，Yii提供了灵活和可扩展的日志记录功能。消息记录可分为根据日志级别和信息类别。
	应用层次和类别过滤器，可进一步选择的消息路由到不同的目的地，例如文件，电子邮件，浏览器窗口，等等
|--messages     提示信息的多语言包
|--test         Yii提供的测试，包括单元测试和功能测试
|--utils        提供了常用的格式化方法，是一个工具集
|--validators   提供了各种验证方法
|--vendors      第三方由Yii框架使用的资料库，第三方包
|--views        提供了Yii错误、日志、配置文件的多语言视图，包括模板和对应的语言包
|--web          Yii所有开发应用的方法
|---actions      控制器操作类
|---auth         权限认识类，包括身份认证，访问控制过滤，基本角色的访问控制等
|---filters      过滤器，可被配置在控制器动作执行之前或之后执行。
	例如，访问控制过滤器将被执行以确保在执行请求的动作之前用户已通过身份验证；性能过滤器可用于测量控制器执行所用的时间
|---form         表单生成方法
|---helpers      视图助手，视图中常用的工具集，包含GOOGLE AJAX API，创建HTML，JSON，JAVASCRIPT相关功能
|---js           JS库
|---renderers    视图渲染组件
|---services     封装SoapServer并提供了一个基于WSDL的Web服务
|---widgets      部件
|---CArrayDataProvider.php       可以配置的排序和分页属性自定义排序和分页的行为
|---CActiveDataProvider.php      ActiveRecord方法类
|---CController.php              控制器方法，主要负责协调模型和视图之间的交互
|---CPagination.php              分页类
|---CUploadedFile.php            上传文件类
|---CUrlManager.php              URL管理
|---CWebModule.php               应用模块管理，应用程序模块可被视为一个独立的子应用
|--yii.php      引导文件
|--YiiBase.php  YiiBase类最主要的功能是注册了自动加载类方法，加载框架要用到所有接口
|--yiic         Yii LINUX 命令行脚本
|--yiic.bat     YII WINDOW 命令行脚本
|--yiic.php     Yii命令行脚本文件。这个脚本是运行在命令行执行一个预先定义的控制台命令
|--yiilite.php  它是一些常用到的Yii类文件的合并文件。在文件中，注释和跟踪语句都被去除。
	因此，使用yiilite.php将减少被引用的文件数量并避免执行跟踪语句
|--yiit.php     Yii测试脚本文件。这个脚本是为了被包括在开始的单元测试和功能测试引导文件



*/



