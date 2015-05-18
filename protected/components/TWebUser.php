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
	
	private $_access;
	
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
	
	/**
	 * Performs access check for this user.
	 * @param string $operation the name of the operation that need access check.
	 * @param array $params name-value pairs that would be passed to business rules associated
	 * with the tasks and roles assigned to the user.
	 * Since version 1.1.11 a param with name 'userId' is added to this array, which holds the value of
	 * {@link getId()} when {@link CDbAuthManager} or {@link CPhpAuthManager} is used.
	 * @param boolean $allowCaching whether to allow caching the result of access check.
	 * When this parameter
	 * is true (default), if the access check of an operation was performed before,
	 * its result will be directly returned when calling this method to check the same operation.
	 * If this parameter is false, this method will always call {@link CAuthManager::checkAccess}
	 * to obtain the up-to-date access result. Note that this caching is effective
	 * only within the same request and only works when <code>$params=array()</code>.
	 * @return boolean whether the operations can be performed by this user.
	 * 将用户的id转化为组id，对组直接进行角色验证
	 */
	public function checkAccess($operation,$params=array(),$allowCaching=true)
	{
		if($allowCaching && $params===array() && isset($this->_access[$operation]))
			return $this->_access[$operation];
	
		$user = User::model()->findByPk($this->getId());
		$access=Yii::app()->getAuthManager()->checkAccess($operation,$user->user_group_id,$params);//$this->getId()
		if($allowCaching && $params===array())
			$this->_access[$operation]=$access;
	
		return $access;
	}
}