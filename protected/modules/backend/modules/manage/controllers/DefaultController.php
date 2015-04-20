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
				'index'=>Yii::t('manage_default', 'Index Default Operation'),
				);
	}
	
	public function actionIndex()
	{
		$this->pageTitle = '仪表盘';
		
		
		
		
		$this->render('index',array());
	}
}