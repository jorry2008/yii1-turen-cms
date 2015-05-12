<?php
/**
 * TCAccessControlFilter class file.
 * @author jorry
 *
 */

class TCAccessControlFilter extends CAccessControlFilter
{
	protected function preFilter($filterChain)
	{
// 		$controllerID = $filterChain->controller->id;
// 		$actionID = $filterChain->controller->getAction()->id;

		fb($filterChain->controller->getRoute());//backend/user/user/admin
		fb($filterChain->controller->getUniqueId());//backend/user/user
// 		fb($this->rules);
		
		
		$app=Yii::app();
		$request=$app->getRequest();
		$user=$app->getUser();
		$verb=$request->getRequestType();
		$ip=$request->getUserHostAddress();

		foreach($this->getRules() as $rule)
		{
			if($rule->roles)
				$rule->roles = array($filterChain->controller->getUniqueId(), $filterChain->controller->getRoute());
			
			if(($allow=$rule->isUserAllowed($user,$filterChain->controller,$filterChain->action,$ip,$verb))>0) // allowed
				break;
			elseif($allow<0) // denied
			{
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

