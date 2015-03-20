<?php
/**
 * 
 * @author xia.q
 *
 */
class ConfigController extends TBackendController
{
	//权限交给了module
	//public $layout='column1';
	
	//普通配置
	public function actionGeneral()
	{
		
		$this->render('general',array());
	}
}
