<?php
/*
 * 配置了维护模式，系统的所有请求将跳转到offline/notice
 */
class OfflineController extends TBackendController
{
	public $param1;
	public $param2;
	
	/**
	 * 每一个子controller都是一个操作的开始，这里创建一个操作权限
	 * @return multitype:string
	 */
	public static function getRbacConf()
	{
		return array(
				'notice'=>Yii::t('manage_offline', 'Notice Parten Operation'),
				);
	}
	
	
	public function init()
	{
		$this->param1 = $_GET['param1'];
		$this->param2 = $_GET['param2'];
	}
	
	public function actionNotice()
	{
		header("Content-type:text/html;charset=utf-8");
		echo '维护模式';
		echo $this->param1;
		echo $this->param2;
	}
}
