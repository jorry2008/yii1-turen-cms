<?php
/*
 * 其实yii多语言是比较复杂的，但是它的规律又是非常强的，掌握了就随心所欲了。
*
在整个系统中，语言分为三种类型

1.view视图消息
你可以直接指定系统所有错误都使用一个视图，如：
'errorHandler'=>array(
		// use 'site/error' action to display errors
		'errorAction'=>'site/error'
),
那么系统的所有错误都会以指定的这个action对应的视图显示。
然而系统默认的视图非常细，包括error系列、log系列、profile系列都有单独的一个视图文件描述，
在系统framework中体现在framework/views/文件夹下，每个语言对应一个，还有一份公共的一组文件。
其中，每个在这里的语言文件夹，都与系统的当选语言为指定，那么这里的语言是如何指定的？？？
这个语言由两个因素：
一、优先级最高的是，将对应语言包的视图文件复制一份到themes/主题/views/system/目录下即可，
那么整个系统的视图消息语言就是这个包了语言了。不会因为系统语言的改变而变化。
二、如何没有像一那么做，那么这个视图文件语言就由sourceLanguage语言决定（此语言是源语言，在系统中是固定的，系统默认en_us），
然而当系统设置了language语言（此语言是动态语言，用来实现多语言切换），则视图文件语言就由此语言决定。

2.系统多语言
在系统中总有些语言不是开发都决定的，但又不可缺少。如：
系统中各种widget涉及到的语言，像分页、ajax提示消息等等。这类多语言与开发都开发时创建的多语言是一样的，
只是它们都分配到了两个固定的组中：yii,zii。即Yii::t('yii', 'Message');
那么这个语言原理又是怎样的呢？？？
我们先说说源语言我语言这两个概念：
sourceLanguage源语言
language语言
多语言的切换就是一个翻译的过程，是由一种语言翻译成另外一种语言，表面上好像仅仅是切换一个语言包
但实质上不然，本质上就是一个翻译的过程，由源语言转译为指定语言
因此sourceLanguage表示源语言，language表示指定语言。
Yii::t('common', 'Message');表示翻译静态方法。
'Message' => '消息',表示一个中语言包。
先看一段源码：CMessagesSource.php
if('源语言和指定语言是否相同')
	return $this->translateMessage($category,$message,$language);
else
	return $message;
于是我们就明白了
Yii::t('common', 'Message');中的Message就是我们认为的源语言
'Message' => '消息',//'消息'就是指定的那个语言的一种。
在这种模式下，当系统的指定语言（即用户切换的语言）与源语言不同，则会尝试翻译为指定语言。
反之，系统直接输出'Message'(这是消息体，意义上这就是源语言)，但源语言并不需要审核消息体用的到底是什么语言！！！
于是多语言的设计的方法就变得灵活了。


多语言有哪些设计方法？？？
一、以一个语言作为整个系统的核心语言，执行的时候使一种语言翻译为另一种语言，如上述例子，以en_us为核心语言。
优点就是方便直观，缺点就是系统永远依赖这个核心语言，不太适合某些极端场景。另外界面上不论显示的是什么语言，语言本身都是
有意义的，开发者会因此偷懒而不去完善相应的语言包。
具体设计如下：
配置文件中，sourceLanguage=>'en_us'，language=>'zh_cn';
使用中Yii::t('common', 'Message');//消息体为en_us
中文语言包中'Message' => '消息',//翻译的值的语言为zh_cn

二、不以任何存在的语言为核心语言，使系统本身就没有对哪个语言作为优先，转化的中间码是人为写的标识符。
具体设计如下：
配置文件中，sourceLanguage=>'abcd'，language=>'zh_cn';//实际sourceLanguage=>'abcd'这个应该配置在'class'=>'CPhpMessageSource',的language属性中
使用中Yii::t('common', 'mes_sage');//消息体为一个不存在的“语言”
中文语言包中'mes_sage' => '消息',//翻译的值的语言为zh_cn
英文语言包中'mes_sage' => 'Message',//翻译的值的语言为en_us
此时切换到任何一种语言时，都要进行翻译这个过程。
3.开发都多语言
同2是一样的。
唯一不同的是
'coreMessages'=>'CPhpMessageSource'//对应是yii框架的多语言
'messages'=>'CPhpMessageSource',//对应app的多语言
一个抽象问题：
通常我们在CApplication和CWebApplication中看到一些可以设置的属性，这些属性与组件有什么关系？？？
在学习多语言组件时遇到这个问题：
直接在main配置中设置了系统的源语言：sourceLanguage='en_us';
而在配置多语言组件时CPhpMessageSource继承CMessageSource
其中
'messages'=>array(
		'class'=>'CPhpMessageSource',
		'language'=>'en_us',
);
由源码可知：sourceLanguage最终就是为了为CPhpMessageSource::language提供默认值的，
即应用Application中的sourceLanguage属性提供给CPhpMessageSource::language默认值。


为什么要这样做？？？
我们可以认为CApplication和CWebApplication的属性都是原始配置，即系统优先级最低的配置，这个配置是组成Yii框架本身所需要的一套配置。
比如yii框架本身的多语言环境就是由这套配置来决定的，但因这套配置是处理多语言的，所以它也将其属性提供给了开发者，为开发者指定了一套
与yii框架同步的配置。
这种模式的好处是，整个系统分为两个层级，即框架的设计者层和开发者层！
为保证整个系统的运行，框架的设计都层为开发者层提供了一整套与设计者层同步的配置，但其优先级最低。
而开发都则可以通过对组件的单独配置实现自定义。
因此在使用过程中会出现以下“奇怪”的现象：
系统的访客在使用网站时，明明当前语言是中文，后台系统出现了一个500错误
错误确是英文显示，即用户开发的app多语言与yii框架的多语言没有同步造成了，这不是错误，只是个插曲。
这个现象可以推测配置文件可能是这样的
sourceLanguage=>'en_us',
language=>'zh_cn',
'coreMessages'=>array(
		'class'=>'CPhpMessageSource',
		'language'=>'zh_cn',
);
总结一下这两个基础类有以下属性，我们称为基础属性（能影响其它组件的属性，且在main中的一维元素中可直接配置）。
CApplication
public $name='My Application';//提供给系统所有部分使用
public $charset='UTF-8';//提供给请求响应对象使用
public $sourceLanguage='en_us';//提供给消息类使用
CWebApplication
public $defaultController='site';//提供给控制器使用
public $layout='main';//提供给主题管理对象使用
public $controllerMap=array();//提供给控制器使用
public $catchAllRequest;//提供给维护模式用的属性
public $controllerNamespace;//提供给控制器使用

*/