<?php
/**
 * 自动化扫描操作与任务，并创建和更新
 * @author xia.q
 *
 */
class AutoController extends TBackendController
{
	/**
	 * 每一个子controller都是一个操作的开始，这里创建一个操作权限
	 * @return multitype:string
	 */
	public static function getRbacConf()
	{
		return array(
				'deal'=>Yii::t('auth_auto', 'Deal Auth Operation'),
				);
	}
	
	/**
	 * 开始处理
	 */
	public function actionDeal()
	{
		//C:\xampp\htdocs\turen.pw\protected\modules\backend\modules
		$path = Yii::getPathOfAlias('application.modules.backend.modules');
		$moudleNames = Yii::app()->modules['backend']['modules'];
		$controllers = $this->getAllControllers($path, $moudleNames);
		$this->createRbac($controllers);
	}
	
	/**
	 * 
	 * @param string $path
	 * @param array $moudleNames
	 */
	protected function getAllControllers($path, $moudleNames = array())
	{
		//array('module'=>'', 'controllers'=>array());
		$controllers = array();
		foreach ($moudleNames as $moudle) {
			$temp = array();
			$temp['module'] = $path.DIRECTORY_SEPARATOR.$moudle.DIRECTORY_SEPARATOR.ucfirst($moudle).'Module.php';
			$controllerPath = $path.DIRECTORY_SEPARATOR.$moudle.DIRECTORY_SEPARATOR.'controllers';
			
			$folder=@opendir($controllerPath);
			while(($file=@readdir($folder))!==false) {
				if(strpos($file, '.php') !== false && $file!=='.' && $file!=='..' && $file!=='.svn' && $file!=='.gitignore') {
					if(!empty($file))
						$temp['controllers'][]=$controllerPath.DIRECTORY_SEPARATOR.$file;
				}
			}
			closedir($folder);
			$controllers[] = $temp;
		}
		
		return $controllers;
	}
	
	/**
	 * 
	 * @param array $controllers
	 */
	protected function createRbac($controllers = array())
	{
		//实例化//CDbAuthManager.php
		$auth = Yii::app()->auth;
		
		//清空所有权限和权限层级关系表
		$auth->clearAll();
		
		$tempRoute = '';
		foreach ($controllers as $controller) {
			if(isset($controller['module'])) {
				//加载module并实例化，返回路由
				$modulePath = $controller['module'];
				require_once $modulePath;
				$className = substr(($f = basename($modulePath)), 0, strpos($f, '.'));
				
				if(is_subclass_of($className, 'TModule')) {
					$itemConf = $className::getRbacConf();//返回任务
					// C:\xampp\htdocs\turen.pw\protected\modules\backend\modules\manage\ManageModule.php
					$routeCell = explode(DIRECTORY_SEPARATOR, $modulePath);
					$route = $routeCell[count($routeCell)-4].'/'.$routeCell[count($routeCell)-2];
					
					//入库任务
					if(($item = $auth->getAuthItem($route)) === null) {
						$item = $auth->createAuthItem($route, CAuthItem::TYPE_TASK, $itemConf[$routeCell[count($routeCell)-2]]);
						if ($auth instanceof CDbAuthManager) {
							$auth->save();
						}
					}
					
					$tempRoute = $route;
				} else {
					//抛出异常，停止执行
				}
				
				if(isset($controller['controllers'])) {
					foreach ($controller['controllers'] as $c) {
						//加载controller并实例化，返回路由
						$controllerPath = $c;
						require_once $controllerPath;
						// C:\xampp\htdocs\turen.pw\protected\modules\backend\modules\auth\controllers\AuthItemController.php
						$className = substr(($f = basename($controllerPath)), 0, strpos($f, '.'));
						
						if(is_subclass_of($className, 'TBackendController')) {
							$itemsConf = $className::getRbacConf();//返回多个操作
							//入库操作
							$routeCell = explode(DIRECTORY_SEPARATOR, $controllerPath);
							$len = count($routeCell);
							$route = $routeCell[$len-5].'/'.$routeCell[$len-3].'/'.lcfirst(substr($routeCell[$len-1], 0, strpos($routeCell[$len-1], 'Controller')));
							
							foreach ($itemsConf as $action=>$opName) {
								//验证类的方法是否存在
								
								$newRoute = $route.'/'.$action;
								if(($item = $auth->getAuthItem($newRoute)) === null) {
									$item = $auth->createAuthItem($newRoute, CAuthItem::TYPE_OPERATION, $opName);
								}
								
								//处理层级关系
								if($tempRoute) {
									if(!$auth->hasItemChild($tempRoute, $newRoute)) {
										$auth->addItemChild($tempRoute, $newRoute);
									}
								} else {
									//抛出模块错误异常，停止执行
								}
							}
						} else {
							//抛出异常，停止执行
						}
					}
				}
			}
		}
	}
}




