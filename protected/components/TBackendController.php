<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 * 
 * 此抽象类，规定了所有controller的开发规范
 */
abstract class TBackendController extends Controller
{
	public $defaultAction='index';
	
	//在实例化acion前处理默认菜单项
	public function beforeAction($action)
	{
		//fb($action);
		$id = $action->id;
		
		$this->menu[] = array('label'=>Yii::t('common', 'List'), 'url'=>($id == 'admin')?'javascript:;':array('admin'));
		if($id == 'update')
			$this->menu[] = array('label'=>Yii::t('common', 'Update'), 'url'=>($id == 'update')?'javascript:;':array('update'));
		$this->menu[] = array('label'=>Yii::t('common', 'Create'), 'url'=>($id == 'create')?'javascript:;':array('create'));
		
		return true;
	}
	
	public function afterAction($action)
	{
		
	}
	
	//为rbac准备基础数据
	abstract public static function getRbacConf();
}


