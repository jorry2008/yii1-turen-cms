<?php
/**
 * CAccessControlFilter是一个完整过滤器类
 * 
 * 它要解决的问题是：实现对指定或所有控制器的访问权限控制
 * 并且直接由CController直接集成并实现，其对应的子类方法CController::accessRules()为CAccessControlFilter提供参数
 * 
 * 包括：
 * array('deny',//allow，必须是首位
		'actions'=>array('index'),//action方法
		'controllers'=>array('post'),//控制器包括带moudle的形式'admin/user'
		//'users'=>array('?'),//用户名，仅通过用户名和登录状态判断访问权限
		//'roles'=>array('admin', 'editor'),//普通角色，角色是由CWebUser::checkAccess()提供
		//**'roles'=>array('updateTopic'=>array('topic'=>$topic))//针对RBAC bizRules参数
		//'ips'=>array('127.0.0.1'),//ip列表，支付127.*.1.1
		//'verbs'=>array('GET', 'POST'),//提交类型
		//'expression'=>'!$user->isGuest && $user->level==2',//php表达式，返回true或false，同样也支付function
		'message'=>'Jorry say "Access Denied".',//自定义deny权限提示信息
		//message和deniedCallback参数的执行是二选一的，，，，
		//回调方法，当验证失败即返回-1，则调用此全局方法，此方法是单独执行，与yii本身没有关系，即后面的action不会执行
		//'deniedCallback'=>'redirectToDeniedMethod',
	),
 * 
 * 其中，角色访问控制roles又分为普通角色控制，RBAC角色控制，
 * 
 * 角色控制的最终方法的实现是CWebUser::checkAccess()方法实现，
 * 它的作用是整合过滤器和（普通角色或RBAC角色）。
 * 
 * 如果将这个过滤器整合在主控制器中，那么就很容易实现系统的角色访问控制机制了，
 * 
 * 
 * 在CAccessControlFilter过滤器中，对访问的控制是以认证的形式存在
 * 如果认证通过则返回true,
 * 如果认证不通过则执行回调方法或者access Denied拒绝访问
 * 其中access Denied拒绝访问会优先考虑当前用户是否登录，
 * 如果没有登录则跳转登录，这样做就是为了让用户进一步获取可能的认证！！
 * 否则就是边认证资格都没有直接是无权。
 */