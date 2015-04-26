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
	//不考虑ajax退出方式，if(!$request->getIsAjaxRequest())
	public function afterLogout()
	{
		$app=Yii::app();
		if(($url=Yii::app()->user->loginUrl)!==null) {
			if(is_array($url)) {
				$route=isset($url[0]) ? $url[0] : $app->defaultController;
				$url=$app->createUrl($route,array_splice($url,1));
			}
			Yii::app()->request->redirect($url);
		} else {
			//throw new Exception('');//user配置错误
		}
	}
}