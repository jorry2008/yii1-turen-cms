<?php
/**
 * 
 * @author xia.q
 * 
 */
class BackendModule extends CWebModule
{
	public function init()
	{
		//导入后台模块相关组件和模型
		$this->setImport(array(
			'application.models.backend.*',//导入后台表单模型
		));
		
		Yii::app()->language = Yii::app()->config->get('config_back_language');
		
		//设置后台模板
		Yii::app()->theme = 'Tadmin';//目前后台只准备一套模板
		Yii::app()->homeUrl = Yii::app()->createUrl('backend/manage/default/index');//后台首页，仪表盘页面
		
		//独立配置后台模块初始信息
		$this->layout = 'column-12';//独立模块的布局文件
		$this->defaultController = 'default';//独立模块中的默认控制器
	}
	
	
	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action)) {
			$assetManager = Yii::app()->assetManager;
			$clientScript = Yii::app()->clientScript;
			
			//$clientScript->registerMetaTag($content,$name=null,$httpEquiv=null,$options=array(),$id=null)
			//$clientScript->registerLinkTag($relation=null,$type=null,$href=null,$media=null,$options=array())
			//$clientScript->registerMetaTag('IE=edge',null,'X-UA-Compatible');
			
			//初始化加载adminlte框架，已经依赖了yii的jquery库，首先加载了bootstrap基础文件
			$bootstrap = Yii::app()->adminlte;
			
			//加载自定义web.js、web.css
			$assetsThemeUrl = $assetManager->publish(Yii::app()->theme->basePath.DIRECTORY_SEPARATOR.'assets', true, -1, true);//强制复制
			$clientScript->registerCssFile($assetsThemeUrl.'/css/'.'web.css');
			$clientScript->registerScriptFile($assetsThemeUrl.'/js/'.'web.js');
			//设置Meta
			$clientScript->registerMetaTag(Yii::app()->language,'language');
			$clientScript->registerMetaTag('text/html',null,'Content-Type',array('charset'=>Yii::app()->charset));
			$clientScript->registerMetaTag('webkit','renderer');//处理双核浏览器
			$clientScript->registerMetaTag('jorry 980522557@qq.com www.turen.pw','author');
			
			//导入全局bootstrap插件
			//$bootstrap->registerAssetCss();
			
			//其余的js插件，在使用时动态在各个模块中导入即可
			/*
			$clientScript->registerCoreScript('jquery')
				->registerCoreScript('jquery.ui')
				->registerScriptFile($bsAssetsUrl.'/js/bootstrap.min.js',CClientScript::POS_END)
				->registerScript('tooltip',
						"$('[data-toggle=\"tooltip\"]').tooltip();
						$('[data-toggle=\"popover\"]').tooltip()"
						,CClientScript::POS_READY);
			
			*/
			
			return true;
		} else
			return false;
	}
}
