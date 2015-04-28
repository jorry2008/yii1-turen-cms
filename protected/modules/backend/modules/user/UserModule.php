<?php
/**
 * 
 * @author xia.q
 *
 */
class UserModule extends TModule
{
	public $defaultController='common';
	
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'user.models.*',
			'user.components.*',
		));
	}
	
	/**
	 * 每一个子module都是一个任务的开始，这里创建一个任务权限
	 * @return multitype:string
	 */
	public static function getRbacConf()
	{
		return array(
			'user'=>'User Assignment',
		);
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
