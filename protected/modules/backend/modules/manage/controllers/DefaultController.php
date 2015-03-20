<?php
/**
 * 
 * @author xia.q
 *
 */
class DefaultController extends TBackendController
{
	public function actionIndex()
	{
		$this->pageTitle = '仪表盘';
		
		
		
		
		$this->render('index',array());
	}
}