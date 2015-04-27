<?php
/**
yii系统分为三类组件：

1.CApplication核心组件
	$components=array(
		'coreMessages'=>'CPhpMessageSource',//'language'=>'en_us','basePath'=>YII_PATH.DIRECTORY_SEPARATOR.'messages',
		'db'=>'CDbConnection',
		'messages'=>'CPhpMessageSource',
		'errorHandler'=>'CErrorHandler',
		'securityManager'=>'CSecurityManager',
		'statePersister'=>'CStatePersister',
		'urlManager'=>'CUrlManager',
		'request'=>'CHttpRequest',
		'format'=>'CFormatter',
	);

2.CWebApplication核心组件
	$components=array(
		'session'=>'CHttpSession',
		'assetManager'=>'CAssetManager',
		'user'=>'CWebUser',
		'themeManager'=>'CThemeManager',
		'authManager'=>'CPhpAuthManager',
		'clientScript'=>'CClientScript',
		'widgetFactory'=>'CWidgetFactory',
	);
	以上两组核心组件依次注册到系统

yii在整个组件设计中大量使用了工厂化设计模式，
这样做的好处就是同一个功能组件有不同的类实现方式而且能够无逢切换。
比如：
'session'=>'CHttpSession',//普通基于文件的session方式，系统默认
也可以'session'=>'CDbHttpSession'//基于数据库的session存储方案。注意它们的配置不同，由其public属性决定。

'messages'=>'CPhpMessageSource',//基于文件的app多语言包，系统默认
也可以'messages'=>'CDbMessageSource',//基于数据库的app多语言方案。配置不同

等等，大多数的组件都工厂式的配置，
更牛B的是，许多管理性质的组件自身也实现了工厂的模式来管理子组件。
比如：
'themeManager' => array(
	'themeClass'=>'CTheme',
),
这是一个主题管理类，用来管理系统的主题，themeManager属于系统的app()->themeManager的组件，
这个组件管理的主题也是对应一个主题类，'themeClass'=>'CTheme'
我们发现，yii只为我们提供了一个主题类，但它提供了工厂，所以这个主题类我们可以拓展也可以的换成其它类，
'themeManager' => array(
	'themeClass'=>'MyTheme',//哈哈
),
也可以利用两者的工厂，使用整个yii的主题换一种逻辑
'themeManager' => array(
	'class'=>'MyThemeManager',//哈哈
	'themeClass'=>'MyTheme',//哈哈
),
为了使用方法，yii提供了一个直接切换主题的属性接口：
'theme' => 'classic',

为什么yii为在CWebApplication中提供了这样一个属性来控制主题包呢？？？
详情请看:如何区分aaplication中的两类属性.php一文


3.普通组件
除了核心组件就是普通组件了，这些组件与yii的核心没有任何关系，而且不继承CComponent的话，
就不可能影响到yii系统的任何行为。



















 */