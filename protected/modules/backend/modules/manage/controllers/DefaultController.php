<?php
/**
 * 
 * @author xia.q
 *
 */
class DefaultController extends TBackendController
{
	/**
	 * 每一个子controller都是一个操作的开始，这里创建一个操作权限
	 * @return multitype:string
	 */
	public static function getRbacConf()
	{
		return array(
				'index'=>'Index Default Operation',
				);
	}
	
	public function actionIndex()
	{
		$this->pageTitle = '仪表盘';
		
		$user = Yii::app()->user;
		fb($user->id);
		fb($user->name);
		
		fb($user->getState('userName'));
		fb($user->getState('nickName'));
		fb($user->getState('GroupId'));
		fb($user->getState('isAdmin'));
		fb($user->getState('loginTime'));
		
		$this->render('index',array());
	}
}