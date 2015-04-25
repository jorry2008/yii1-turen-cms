<?php
/**
 * 
 * @author xia.q
 *
 */
class TWebUser extends CWebUser
{
	const DANGER = 'danger';
	const WARNING = 'warning';
	const INFO = 'info';
	const SUCCESS = 'success';
	const FOREVER = 'forever';//永久警告
	
	//登出后跳转到登录页面
	public function afterLogout()
	{
		//echo Yii::app()->user->loginUrl;exit;
		Yii::app()->request->redirect(Yii::app()->user->loginUrl);
	}
}