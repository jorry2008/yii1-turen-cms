<?php 
/*
CDbCriteria数据库条件构造器：

1.实例：它为一个AR查询提示条件：
$criteria=new CDbCriteria();
$criteria->compare('status',Post::STATUS_ACTIVE);
$criteria->addInCondition('id',array(1,2,3,4,5,6));
$posts = Post::model()->findAll($criteria);//and Post->find(($criteria)


2.整体的理解它的：
整个类的方法专门为以下属性服务：
'select', 'condition', 'params', 'limit', 'offset', 'order', 'group', 'join', 'having', 'distinct', 'scopes', 'with', 'alias', 'index', 'together'（都是Public权限）
重点：即这个类最终要得到的就是对这些属性的整合，最后返回给AR！！！

所以可以直接为CDbCriteria提供一个参数$data
$criteria = new CDbCriteria(array(
			'condition'=>'status=1',
			'order'=>'update_time DESC',
			'with'=>'commentCount',
		));
$criteria=new CDbCriteria();


3.几个特殊属性与sql的关系：
condition和params一起使用也可以单独使用condition，可以直接赋值或者进行参数绑定。
'condition'->'status=1',
或者'condition'->'status=:status',params->array('status'=>1);
当然它可以处理所有WHERE后面的所有条件写法。


4.$criteria几个方法与其属性的关系详解


总结：
这个类的作用就是为sql的条件提供一个统一的对接标准，参数是以属性的方式提供。
调试的方法toArray();
使用前直接使用这个方式进行调试而其提供的方法则是为了更快的整合这些参数而开放的。



*/








