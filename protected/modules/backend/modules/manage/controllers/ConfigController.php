<?php
/**
 * 
 * @author xia.q
 *
 */
class ConfigController extends TBackendController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';
	
	public function init()
	{
		parent::init();
		$this->pageTitle = '站点配置';
	}
	
	
	/**
	 * 每一个子controller都是一个操作的开始，这里创建一个操作权限
	 * @return multitype:string
	 */
	public static function getRbacConf()
	{
		return array(
				'update'=>'Update Config Operation',
				'admin'=>'Admin Config Operation',
				);
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate()
	{
		//$params = Yii::app()->request->getParam();
		$message = array();
		if(isset($_POST)) {
			$model = Setting::model();
			foreach ($_POST as $key=>$value) {
				if(!empty($key)) {
					$config = $model->checkConfig($key);
					if($config !== null) {//有则更新
						$config->value = $value;
						if(!$config->save()) {
							$message['error'] = $config->getError();
						}
					} else {//无则创建
						//序列化处理
						$model = new Setting();
						$model->code = 'any';
						$model->ckey = $key;
						$model->value = $value;
						$model->serialized = 0;
						
						if(!$model->save()) {
							$message['error'] = $model->getError();
						}
					}
				} else {
					//空键
				}
			}
		}
		
		//直接执行admin控制器
		//$this->forward('admin');
		
		//消息通知
		if(empty($message)) {
			$message['success'] = '配置项保存成功!';
		}
		
		//强制更新缓存，即删除缓存
		Yii::app()->cache->delete(TConfig::CACHE_KEY);
		
		//跳转到控制器
		$this->redirect(array('admin'));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Setting();
		$model->unsetAttributes();  // clear any default values
		$configs = $model->findAll();
		
		$configArrs = array();
		foreach ($configs as $config)
			$configArrs[$config->ckey] = $config->attributes;
		
		//多语言
		$language = array();
		$languageObj = Language::model()->published()->findAll();
		foreach ($languageObj as $lang)
			$language[$lang->code] = $lang->name;
		
		$this->render('admin',array(
			'configs'=>$configArrs,
			'language'=>$language,
		));
	}

	/**
	 * Performs the AJAX validation.
	 * @param Setting $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='setting-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

