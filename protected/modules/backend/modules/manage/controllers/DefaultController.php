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
		return array();
	}
	
	public function actionIndex()
	{
		$this->pageTitle = '仪表盘';
		
		
		
		
		$this->render('index',array());
	}
}