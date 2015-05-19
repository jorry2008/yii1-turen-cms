<?php
/**
 * 
 * @author xia.q
 * 
 */
class BackendModule extends CWebModule
{
	public $defaultController = 'manage';//独立模块中的默认控制器
	
	public function init()
	{
		//导入后台模块相关组件和模型
		$this->setImport(array(
			'application.models.backend.*',//导入后台表单模型
		));
		
		//设置后台模板
		Yii::app()->theme = 'Tadmin';//目前后台只准备一套模板
		Yii::app()->homeUrl = Yii::app()->createUrl('backend/manage/default/index');//后台首页，仪表盘页面
		
		//独立配置后台模块初始信息
		$this->layout = 'column-12';//独立模块的布局文件
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CWebModule::beforeControllerAction()
	 */
	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action)) {
			$assetManager = Yii::app()->assetManager;//资源管理对象
			$clientScript = Yii::app()->clientScript;//客户端脚本对象
			$adminlte = Yii::app()->adminlte;//adminlte框架对象，已经依赖了yii的jquery库
			$adminlte->register('core');//注册核心组件
			
			$adminlte->register('layer');//提示层与核心一样的等级被整合到系统中
			//$adminlte->register('laydate');
			
			//$clientScript->registerMetaTag($content,$name=null,$httpEquiv=null,$options=array(),$id=null)
			//$clientScript->registerLinkTag($relation=null,$type=null,$href=null,$media=null,$options=array())
			//$clientScript->registerMetaTag('IE=edge',null,'X-UA-Compatible');
			
			//加载自定义web.js、web.css
			$assetsThemeUrl = $assetManager->publish(Yii::app()->theme->basePath.DIRECTORY_SEPARATOR.'assets', true, -1, true);//强制复制
			$clientScript->registerCssFile($assetsThemeUrl.'/css/'.'web.css');
			//加载到底部
			$clientScript->registerScriptFile($assetsThemeUrl.'/js/'.'web.js', CClientScript::POS_END);
			
			//初始化后台Meta
			$clientScript->registerMetaTag(Yii::app()->language,'language');
			$clientScript->registerMetaTag('text/html',null,'Content-Type',array('charset'=>Yii::app()->charset));
			$clientScript->registerMetaTag('webkit','renderer');//处理双核浏览器
			$clientScript->registerMetaTag('980522557@qq.com www.turen.pw','author');
			
			return true;
		} else
			return false;
	}
}
