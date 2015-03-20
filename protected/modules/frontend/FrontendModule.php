<?php

class FrontendModule extends CWebModule
{
	public $layout = 'column2';
	//frontend/site
	
	//C:\xampp\htdocs\test\turen\app\blog\themes\classic\views/frontend/layouts\column2(空)
	//C:\xampp\htdocs\test\turen\app\blog\themes\classic\views/frontend/column2(/)
	//C:\xampp\htdocs\test\turen\app\blog\themes\classic\views//column2(//)
	
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'frontend.models.*',
			'frontend.components.*',
		));
		
		//设置后台模板
		Yii::app()->theme = 'Tclassic';
		
		
		
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
