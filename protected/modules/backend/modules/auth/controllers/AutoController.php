<?php
/**
 * 自动化扫描操作与任务，并创建和更新
 * @author xia.q
 *
 */
class AutoController extends TBackendController
{
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
	protected function getAllControllers($path, $moudleNames = array()) {
		//array('module'=>'', 'controllers'=>array());
		$controllers = array();
		foreach ($moudleNames as $moudle) {
			$temp = array();
			$temp['module'] = $path.DIRECTORY_SEPARATOR.ucfirst($moudle).'Module';
			$controllerPath = $path.DIRECTORY_SEPARATOR.$moudle.DIRECTORY_SEPARATOR.'controllers';
			
			$folder=@opendir($controllerPath);
			while(($file=@readdir($folder))!==false) {
				if($file!=='.' && $file!=='..' && $file!=='.svn' && $file!=='.gitignore') {
					$file = substr($file, 0, -4);//去掉php后缀
					if(!empty($file))// && (new $file) instanceof TBackendController
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
	protected function createRbac($controllers = array()) {
		//实例化
		$auth = Yii::app()->auth;//CDbAuthManager.php
		
		//清空所有权限
		$auth->clearAll();
		
		
		
		foreach ($controllers as $controller) {
			//加载module并实例化，返回路由
			
			//入库任务
			
			//加载controller并实例化，返回路由
			
			//入库操作
			
		}
	}
	
	
	
}




