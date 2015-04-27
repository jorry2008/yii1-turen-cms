<?php
/**
 * 慢慢发现，学习yii需要一个正确的心态，这得先从认同yii框架的理念说起：
 * 从官网上我们也了解到它的一些特性，但那只是字面的意思，真正深入源码了才发现意思十分深刻
 * 以下就是相关的理念和心态：
 * 1.Ruby on Rails：Yii 继承它的配置的思想，这个是官方定义的特性。
 * 即整个yii框架的执行流程和运行方式是完全可以仅通过配置来重新定义的，而对于零配置的yii框架使用的就是自身的默认机制
 * 下面以CWebApplication应用类的一个属性controllerMap来分析一下配置思想。
 * controllerMap是控制器地图，文档的解释是：
 * Note, when processing an incoming request, the controller map will first be
 * checked to see if the request can be handled by one of the controllers in the map.
 * If not, a controller will be searched for under the {@link getControllerPath default controller path}.
 * 如果配置中使用了这个配置地图controllerMap，当第一个请求进来时，这个属性马上就会被检测并装载执行一个指定的控制器对象
 * 如果没有配置，则会通过请求对象搜索框架预定好的方式，getControllerPath来获取默认目录结构中的控制器。
 * 
 * 像以上这种以配置为优先的思想整个框架都是，所以说掌握了yii的配置，就完成了整个项目的80%，你觉得呢？
 * 有没有觉得很熟悉，在css编写过程中reset.css文件的功能？哈哈，果然是web思想啊
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
 * 总结：
 * 深入学习这个框架应该有以下心态
 * 1.配置可以更改任何流程
 * 2.
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 */