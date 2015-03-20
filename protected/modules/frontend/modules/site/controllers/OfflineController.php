<?php
/*
 * 配置了维护模式，系统的所有请求将跳转到offline/notice
 */
class OfflineController extends Controller
{
	public $param1;
	public $param2;
	
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
