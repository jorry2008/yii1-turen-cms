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
	
	//一个默认的角色，授权为空，但无法删除
	const ROLE_DEFAULT = 'role_default';
	
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
				'admin'=>'Admin Role Operation',
				'create'=>'Create Role Operation',
				'update'=>'Update Role Operation',
				'delete'=>'Delete Role Operation',
				'config'=>'Permission Config Operation',
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new AuthItem();

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['AuthItem'])) {
			$model->attributes=$_POST['AuthItem'];
			if($model->save()) {
				Yii::app()->user->setFlash(TWebUser::SUCCESS, Yii::t('auth_role', 'Cteate Role Success'));
				$this->redirect(array('admin'));
			} else {
				$errors = $model->getErrors();
				foreach ($errors as $error) {
					Yii::app()->user->setFlash(TWebUser::DANGER, Yii::t('auth_role', 'Create Role Failure').' '.$error[0]);//取第一个
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
	 * @param string $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
// 		$auth = Yii::app()->authManager;
// 		$authItem = $auth->getAuthItem($id);
		$model=$this->loadModel($id);
		//异常验证，这个一样得有，否则在验证的时候已经做了更新
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
		
		$oldName = $id;
		
		if((isset($_POST['AuthItem']['name']) && $model->name != $_POST['AuthItem']['name']) && $id == self::ROLE_DEFAULT) {
			Yii::app()->user->setFlash(TWebUser::WARNING, Yii::t('auth_role', 'Is not allowed to update').' '.$id);
		} else {
			if(isset($_POST['AuthItem'])) {
				$model->attributes = $_POST['AuthItem'];
				if($model->save()) {
					//同时更新组里面的角色名
					if($model->name != $oldName) {
						UserGroup::model()->updateAll(array('role'=>$model->name), 'role=:role', array(':role'=>$oldName));
					}
					
					Yii::app()->user->setFlash(TWebUser::SUCCESS, Yii::t('auth_role', 'Update Role Success'));
					$this->redirect(array('admin'));
				} else {
					$errors = $model->getErrors();
					foreach ($errors as $error) {
						Yii::app()->user->setFlash(TWebUser::DANGER, Yii::t('auth_role', 'Update Role Failure').' '.$error[0]);//取第一个
						break;
					}
				}
			}
		}
		
		$this->render('update',array(
			'model'=>$model,
			'action'=>'update',
			'id'=>$id,
		));
	}
	
	/**
	 * 添加权限到角色
	 */
	public function actionConfig($id)
	{
		//$role = Yii::app()->request->getQuery('role');
		$post = $_POST;
		$role = $id;
		$model = $this->loadModel($id);
		$auth = Yii::app()->authManager;
		if(!empty($post) && count($post)>1) {
			//清空当角色的所有权限
			$auth->removeAllItems($role);
			
			foreach ($post as $key=>$value) {
				if(!empty($value) && is_array($value)) {
					if(in_array($key, $value)) {//只存task
						if(!$auth->hasItemChild($role, $key)) {
							$auth->addItemChild($role, $key);
						}
					} else {//只存operation
						foreach ($value as $item) {
							if(!$auth->hasItemChild($role, $item)) {
								$auth->addItemChild($role, $item);
							}
						}
					}
				}
			}
			//提示更新成功
			Yii::app()->user->setFlash(TWebUser::SUCCESS, Yii::t('common', 'Update Role Success'));
			$this->redirect(array('config', 'id'=>$id));
		}
		
		$tasksAndOperations = $auth->getTasksAndOperations();
		$selectItems = $auth->getItemChildren($id);
		$selectItems = array_keys($selectItems);
		
		$this->render('config',array(
				'tasksAndOperations'=>$tasksAndOperations,
				'selectItems'=>$selectItems,
				'model'=>$model,
				'id'=>$id,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$oldName = $id;
		//不允许删除默认角色
		if($id == self::ROLE_DEFAULT) {
			//throw new Exception('不允许删除默认角色');
			$result = array(
					'status'=>'0',
					'message'=>Yii::t('auth_role', 'Is not allowed to delete').' '.$id,
			);
			echo CJSON::encode($result);
			Yii::app()->end();
		} else {
			$this->loadModel($id)->delete();
			//整理，如果当前删除的这个角色已经被相关的用户组使用了，那么就当处理组转移到默认组别
			UserGroup::model()->updateAll(array('role'=>self::ROLE_DEFAULT), 'role=:role', array(':role'=>$oldName));
		}
		
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
		
		$model->type = CAuthItem::TYPE_ROLE;

		$this->render('admin',array(
			'model'=>$model,
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
			throw new CHttpException(404,Yii::t('common', 'The requested page does not exist.'));
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param AuthItem $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='role-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
