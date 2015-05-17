<?php
/**
 * TCAccessControlFilter class file.
 * @author jorry
 * 
 * 取task和operation两种类型的“角色”，与当前用户进行rbac对比
 *
 */

Yii::import('system.web.auth.CAccessControlFilter');

class TCAccessControlFilter extends CAccessControlFilter
{
	protected function preFilter($filterChain)
	{
// 		$controllerID = $filterChain->controller->id;
// 		$actionID = $filterChain->controller->getAction()->id;
// 		fb($filterChain->controller->getRoute());//backend/user/user/admin
// 		fb($filterChain->controller->getUniqueId());//backend/user/user

		$app=Yii::app();
		$request=$app->getRequest();
		$user=$app->getUser();
		$verb=$request->getRequestType();
		$ip=$request->getUserHostAddress();

		//超级管理员(表达式解析目前还不能正常执行，暂时就这样处理)
		if($user->getState('isAdmin')) return true;
		
		foreach($this->getRules() as $rule)
		{
			if($rule->roles)//初始化一定得有一个默认值
				$rule->roles = array($filterChain->controller->getUniqueId(), $filterChain->controller->getRoute());
			
			if(($allow=$rule->isUserAllowed($user,$filterChain->controller,$filterChain->action,$ip,$verb))>0) // allowed
				break;
			elseif($allow<0) {// denied
				if(isset($rule->deniedCallback))
					call_user_func($rule->deniedCallback, $rule);
				else
					$this->accessDenied($user,$this->resolveErrorMessage($rule));
				return false;
			}
		}

		return true;
	}
}

