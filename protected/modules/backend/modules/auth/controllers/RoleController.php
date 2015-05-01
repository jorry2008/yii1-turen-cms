<?php
/**
 * 
 * @author xia.q
 *
 */
class RoleController extends TBackendController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';
	
	public $active;
	
	public function init()
	{
		parent::init();
		$this->active = Yii::app()->request->getParam('active', 'admin');//控制tabs活动状态
	}
	
	/**
	 * 每一个子controller都是一个操作的开始，这里创建一个操作权限
	 * @return multitype:string
	 */
	public static function getRbacConf()
	{
		return array(
				'view'=>'View Role',
				'create'=>'Create Role',
				'update'=>'Update Role',
				'delete'=>'Delete Role',
				'index'=>'Index Role',
				'admin'=>'Admin Role',
		);
	}
	
	/**
	 * 
	 * @param string $i
	 * @return mixed or string
	 */
	public static function getTypeName($i='')
	{
		$typeList = array(
// 				CAuthItem::TYPE_OPERATION=>Yii::t('auth_authItem', 'Operation'),
// 				CAuthItem::TYPE_TASK=>Yii::t('auth_authItem', 'Task'),
				CAuthItem::TYPE_ROLE=>Yii::t('auth_authItem', 'Role'),
		);
		
		if($i === '')
			return $typeList;
		else
			return isset($typeList[$i])?$typeList[$i]:'';
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new AuthItem;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['AuthItem']))
		{
			$model->attributes=$_POST['AuthItem'];
			if($model->save())
				Yii::app()->user->setFlash(TWebUser::SUCCESS, Yii::t('auth_role', 'Cteate Role Success'));
			else {
				Yii::app()->user->setFlash(TWebUser::DANGER, Yii::t('auth_role', 'Create Role Failure'));
				$this->redirect(array('admin','active'=>'create'));
			}
		}
			
		$this->redirect(array('admin','active'=>'admin'));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AuthItem']))
		{
			$model->attributes=$_POST['AuthItem'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->name));
		}

		$this->render('update',array(
			'model'=>$model,
			'action'=>'update',
		));
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
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new AuthItem('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AuthItem']))
			$model->attributes=$_GET['AuthItem'];

		$this->render('admin',array(
			'model'=>$model,
			'action'=>'create',//在admin中有create表单
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return AuthItem the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=AuthItem::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param AuthItem $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='role-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionSetUser()
	{
		$authManager = Yii::app()->authManager;
		$userId = Yii::app()->user->id;
		//fb($userId);
		
		
		fb('所有的操作');
		fb($authManager->getAuthItems(CAuthItem::TYPE_OPERATION));
		
		fb('所有的任务');
		fb($authManager->getAuthItems(CAuthItem::TYPE_TASK));
		
		fb('所有角色');
		fb($authManager->getAuthItems(CAuthItem::TYPE_ROLE));
		
		
		
		
		//$authManager->assign($itemName,$userId);
		//fb($authManager);
		//fb($this->id);
		
	}
}
