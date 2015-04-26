<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to 'column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	//public $layout='column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	
	//测试数据库连接失败实例
	public function init()
	{
		parent::init();
	}
	
	public function filters()
	{
		$actions = array();//被禁止的动作列表
		
		$controllers = array();//被禁止的控制器列表//'post', 'admin/user'
		$users = array();//被禁止的用户名列表
		$roles = array();//被禁止角色列表
		$ips = array();//被禁止的ip列表
		
		$verbs = array();//array('GET', 'POST');//被禁止的控请求类型
		$redirectMethod = 'Controller::redirectToDeniedMethod';
		
		return array(
			array(
				//多语言过滤器
				'application.filters.backend.LanguageFilter',
			),
			
			//登录权限已经包含在AccessControlFilter访问控制权限里了
// 			array(
// 				//登录权限过滤器
// 				'application.filters.backend.LoginFilter',
// 			),
			
			//授权过滤器
			//'accessControl',
			array(
				'system.web.auth.CAccessControlFilter',
				'rules'=>array(
					/*
					array(
						'allow',// or 'deny'
						'actions'=>array('edit', 'delete'),
						'controllers'=>array('post', 'admin/user'),
						'users'=>array('thomas'),
						'roles'=>array('admin'),//当前用户的角色身份
						'ips'=>array('127.0.0.1'),
						//'verbs'=>array('GET', 'POST'),
						//'expression'=>'!$user->isGuest && $user->level==2',
						'message'=>'Access Denied.',
						'deniedCallback'=>'redirectToDeniedMethod',
					),
					*/
					
					//第一步是匹配，如果为空时，则表示 当前已经匹配。然后是allow或deny，当为空时是未匹配。
					//'deny'
					array('deny', 'actions'=>$actions, 'message'=>Yii::t('common','Action Access Denied.'), 'deniedCallback'=>$redirectMethod),
					array('deny', 'controllers'=>$controllers, 'message'=>Yii::t('common','Controller Access Denied.'), 'deniedCallback'=>$redirectMethod),
					array('deny', 'users'=>$users, 'message'=>Yii::t('common','User Access Denied.'), 'deniedCallback'=>$redirectMethod),
					array('deny', 'roles'=>$roles, 'message'=>Yii::t('common','Role Access Denied.'), 'deniedCallback'=>$redirectMethod),
					//array('allow', 'roles'=>array('updateTopic'=>array('topic'=>$topic)))),
					array('deny', 'ips'=>$ips, 'message'=>Yii::t('common','IP Access Denied.'), 'deniedCallback'=>$redirectMethod),//ip过滤
					//array('allow', 'verbs'=>$verbs, 'message'=>Yii::t('common','Verb Access Denied.'), 'deniedCallback'=>$redirectMethod'),//请求类型过滤
					
					//'expression'=>'!$user->isGuest && $user->level==2',//表达式验证
				),
			),
		);
	}
	
	//回调函数
	//如果没有回调函数，则直接跳转至登录页面
	public static function redirectToDeniedMethod($rule)
	{
		$user = Yii::app()->user;
		$message = $rule->message;
		if($user->getIsGuest()) {
			//发出提示并跳转到一个权限提示页面
			$user->setFlash(TWebUser::DANGER, Yii::t('common', $message));
			$user->loginRequired();
		} else
			throw new CHttpException(403,$message);
	}
}

