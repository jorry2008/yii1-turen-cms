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

	/**
	 * @return array action filters
	 */
	// 	public function filters()
	// 	{
	// 		return array(
	// 			'accessControl', // perform access control for CRUD operations
	// 			'postOnly + delete', // we only allow deletion via POST request
	// 		);
	// 	}
	
	public function init()
	{
		$this->pageTitle = '站点配置';
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
				array('allow',  // allow all users to perform 'index' and 'view' actions
						'actions'=>array('index','view'),
						'users'=>array('*'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions'=>array('create','update'),
						'users'=>array('@'),
				),
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
						'actions'=>array('admin','delete'),
						'users'=>array('admin'),
				),
				array('deny',  // deny all users
						'users'=>array('*'),
				),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
				'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Setting;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Setting']))
		{
			$model->attributes=$_POST['Setting'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
				'model'=>$model,
		));
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
						$model->serialized = 1;
						
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
		
		
		//生成新的缓存文件
		
		
		
		//跳转到控制器
		$this->redirect(array('admin'));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Setting');
		$this->render('index',array(
				'dataProvider'=>$dataProvider,
		));
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
		
		$this->render('admin',array(
			'configs'=>$configArrs,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Setting the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Setting::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
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

