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
		$actions = array();//对所有用户开放访问的动作列表
		$controllers = array();//被禁止的控制器列表//'post', 'admin/user'
		$users = array();//被禁止的用户名列表
		$ips = array();//被禁止的ip列表
		$verbs = array();//array('GET', 'POST');//被禁止的控请求类型
		
// 		fb($this->getRoute());
// 		fb($this->getUniqueId());
// 		fb($this->getId());
		//fb($this->getModule()->);
		
		//$action->getId();
		//$operation = 
		$roles = array();//允许的角色列表
		
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
			//第一步是匹配，如果为空时，则表示 当前已经匹配。然后是allow或deny，当为空时是未匹配。
			//以下每个访问控制都是并列的，且依次进行，从上到下-->上面的过了系统即可执行，上面的没过则依次执行下面的过滤规则。
			//满足以下四条规则：
			//allow将匹配到的允许，deny将匹配到的禁止
			//如果为空array()，则是全匹配（要么全禁，要么全开）
			//未匹配的给下一个权限过滤继续匹配
			//最终未匹配的默认允许
			array(
				'system.web.auth.CAccessControlFilter',
				'rules'=>array(
					array('allow', //允许所有用户在任何时候，都能通过'login', 'error', 'captcha', 'logout'
						'actions'=>array_merge(array('login', 'error', 'captcha', 'logout'), $actions), 
						//'users'=>array('*'),//为空的时候也表示不参于匹配
						'message'=>Yii::t('common','Action Access Denied.'), 
						'deniedCallback'=>$redirectMethod,
					),
					/*
					array('allow', 
						'controllers'=>$controllers, 
						'message'=>Yii::t('common','Controller Access Denied.'), 
						'deniedCallback'=>$redirectMethod,
					),
					*/
					array('deny',
						'ips'=>array_merge(array('1'), $ips),
						'message'=>Yii::t('common','IP Access Denied.'),
						'deniedCallback'=>$redirectMethod,
					),
					array('deny', 
						'users'=>array_merge(array('1'), $users), 
						'message'=>Yii::t('common','User Access Denied.'), 
						'deniedCallback'=>$redirectMethod,
					),
					//array('allow', 'verbs'=>$verbs, 'message'=>Yii::t('common','Verb Access Denied.'), 'deniedCallback'=>$redirectMethod'),//请求类型过滤
					//'expression'=>'!$user->isGuest && $user->level==2',//表达式验证
// 					array('allow',
// 						'roles'=>array('Administrator'),
// 						'message'=>Yii::t('common','Role Access Denied.'),
// 						'deniedCallback'=>$redirectMethod,
// 					),
					//array('allow', 'roles'=>array('updateTopic'=>array('topic'=>$topic)))),
					
					//由匹配机制可知，所有未捕获的权限都将在最后禁止访问，从而实现严格的权限认证
// 					array('deny',
// 						'users'=>array('*'),
// 						'message'=>Yii::t('common','Uncaught Permissions Matching.'),
// 						'deniedCallback'=>$redirectMethod,
// 					),
				),
			),
		);
	}
	
	//回调函数
	//如果没有回调函数，则直接跳转至登录页面
	public static function redirectToDeniedMethod($rule)
	{
		$user = Yii::app()->user;
		$message = $rule->message;//fb($message);exit;
		
		//未登录
		if($user->getIsGuest()) {
			//发出提示并跳转到一个权限提示页面
			$user->setFlash(TWebUser::DANGER, Yii::t('common', 'You have not login, please login first.'));
			$user->loginRequired();
			
		//无权限
		} else
			throw new CHttpException(403,$message);
	}
}

