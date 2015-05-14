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
				'error'=>'Error Default Operation',
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
	
	
	//错误信息显示
	public function actionError()
	{
		$error = Yii::app()->errorHandler->error;
		$error['admin'] = Yii::app()->errorHandler->adminInfo;
		$error['version'] = '1.1';
		$error['time'] = time();//Yii::app()->locale->getDateFormatter()->formatDateTime(time(),'short');
		
		if($error) {
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('//system/error'.$error['code'], array('data'=>$error));
		}
	}
}