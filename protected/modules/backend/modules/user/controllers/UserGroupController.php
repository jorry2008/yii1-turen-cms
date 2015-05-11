<?php
/**
 * 
 * @author xia.q
 *
 */
class UserGroupController extends TBackendController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';

	
	/**
	 * 每一个子controller都是一个操作的开始，这里创建一个操作权限
	 * @return multitype:string
	 */
	public static function getRbacConf()
	{
		return array(
			'admin'=>'Admin UserGroup Operation',
			'delete'=>'Delete UserGroup Operation',
			'update'=>'Update UserGroup Operation',
			'create'=>'Cteate UserGroup Operation',
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($parent_id = '')
	{
		/**
		 * 
		 * $roleName = $model->getRoleNameByUserId();
		$model->role = $roleName;
		 * $roleName = $_POST['User']['role'];
				$model->assign($roleName);
		 * $roleName = $_POST['User']['role'];
				$model->assign($roleName);
				
		 * 
		 */
		$model=new UserGroup;
		
		if(!empty($parent_id)) {
			$model->parent_id = $parent_id;
		}

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['UserGroup'])) {
			$model->attributes=$_POST['UserGroup'];
			if($model->save()) {
				Yii::app()->user->setFlash(TWebUser::SUCCESS, Yii::t('user_userGroup', 'Create UserGroup Success'));
				$this->redirect(array('admin'));
			} else {
				$errors = $model->getErrors();
				foreach ($errors as $error) {
					Yii::app()->user->setFlash(TWebUser::DANGER, Yii::t('user_userGroup', 'Create UserGroup Failure ').$error[0]);//取第一个
					break;
				}
			}
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
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['UserGroup']))
		{
			$model->attributes=$_POST['UserGroup'];
			if($model->save()) {
				Yii::app()->user->setFlash(TWebUser::SUCCESS, Yii::t('user_userGroup', 'Update UserGroup Success'));
				$this->redirect(array('admin'));
			} else {
				$errors = $model->getErrors();
				foreach ($errors as $error) {
					Yii::app()->user->setFlash(TWebUser::DANGER, Yii::t('user_userGroup', 'Create UserGroup Failure ').$error[0]);//取第一个
					break;
				}
			}
		}

		$this->render('update',array(
			'model'=>$model,
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
		$model = new UserGroup('search');
		
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['UserGroup']))
			$model->attributes=$_GET['UserGroup'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return UserGroup the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=UserGroup::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param UserGroup $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-group-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
