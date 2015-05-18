<?php
/**
 * 
 * @author xia.q
 *
 */
class UserController extends TBackendController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	
	//public $layout='//layouts/column2';
	
	public function init()
	{
		parent::init();
		//Yii::app()->user->setFlash(TWebUser::FOREVER, '永久警告测试');
	}

	/**
	 * 每一个子controller都是一个操作的开始，这里创建一个操作权限
	 * @return multitype:string
	 */
	public static function getRbacConf()
	{
		return array(
				'admin'=>'Admin User Operation',
				'create'=>'Create User Operation',
				'update'=>'Update User Operation',
				'delete'=>'Delete User Operation',
				'batchDelete'=>'BatchDelete User Operation',
				'batchStatus'=>'BatchStatus User Operation',
			);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new User;
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
		
		if(isset($_POST['User'])) {
			$model->attributes = $_POST['User'];
			if($model->save()) {
				Yii::app()->user->setFlash(TWebUser::SUCCESS, Yii::t('user_user', 'Create User Success'));
				$this->redirect(array('admin'));
			} else {
				$errors = $model->getErrors();
				foreach ($errors as $error) {
					Yii::app()->user->setFlash(TWebUser::DANGER, Yii::t('user_user', 'Create User Failure ').$error[0]);//取第一个
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
		$model = new User('update');
		$model = $model->findByPk($id);
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
		
		if(isset($_POST['User'])) {
			$model->attributes = $_POST['User'];
			if(empty($_POST['User']['password'])) {
				$model->password = '';
			}
			if($model->save()) {
				Yii::app()->user->setFlash(TWebUser::SUCCESS, Yii::t('user_user', 'Update User Success'));
				$this->redirect(array('admin'));
			} else {
				$errors = $model->getErrors();
				foreach ($errors as $error) {
					Yii::app()->user->setFlash(TWebUser::DANGER, Yii::t('user_user', 'Update User Failure ').$error[0]);//取第一个
					break;
				}
			}
		}
		
		$model->password = '';
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
		//以上功能是，删除之后并以php的方式跳转到一个ajax指定的路径
	}
	
	/**
	 * 批量删除
	 * @param array $ids
	 * @return boolean
	 */
	public function actionBatchDelete()
	{
		if(isset($_POST[$this->id.'-grid_c0'])) {
			$ids = $_POST[$this->id.'-grid_c0'];
			$criteria = new CDbCriteria;
			$criteria->addInCondition('id', $ids);
			if(User::model()->deleteAll($criteria) > 0)
				return true;
			else
				return false;
		}
		
// 		if(!isset($_GET['ajax']))
// 			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	
	/**
	 * 批量修改状态
	 * @param array $ids
	 * @return boolean
	 */
	public function actionBatchStatus()
	{
		if(isset($_POST[$this->id.'-grid_c0'])) {
			$ids = $_POST[$this->id.'-grid_c0'];
			$status = 0;
			$criteria = new CDbCriteria;
			$criteria->addInCondition('id', $ids);
			if(User::model()->updateAll(array('status'=>$status), $criteria) > 0)
				return true;
			else
				return false;
		}
	
		// 		if(!isset($_GET['ajax']))
			// 			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new User('search');
		$model->unsetAttributes();  // clear any default values
// 		$model->with('user_group')->findAll();
		
		if(isset($_GET['User'])) {
			$model->attributes = $_GET['User'];
			$user = Yii::app()->request->getQuery('User', array());//get
			$model->keyword = empty($user['keyword'])?'':trim($user['keyword']);
			//Yii::app()->request->getParam('keyword', '');//get or post
		}

		//这里要判断ajax
		if(!isset($_GET['ajax'])) //grid默认是get提交数据
			$this->render('admin',array('model'=>$model));
		else  
			$this->renderPartial('admin',array('model'=>$model));
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
