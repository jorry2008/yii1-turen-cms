<?php
/**
 * 
 * @author xia.q
 * 过滤器的位置：
 * TBackendController
 * 后台登录验证，如果用户未登录，则记录下当前页面，并跳转到登录页面
 *
 */
class LoginFilter extends CFilter
{
	private $id = 'loginfilter';
	
	/**
	 * (non-PHPdoc)
	 * @see CFilter::init()
	 */
	public function init()
	{
		//fb('此对象首次执行的方法...');
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CFilter::preFilter()
	 */
	protected function preFilter ($filterChain)
	{
		// logic being applied before the action is executed
		if(Yii::app()->user->isGuest) {
			//提示
			Yii::app()->user->setFlash(TWebUser::DANGER, Yii::t('loginForm', 'You have not login, please login first.'));
			//记录当前地址，并跳转到登录
			Yii::app()->user->loginRequired();
		}
		
		return true;// false if the action should not be executed
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CFilter::postFilter()
	 */
	protected function postFilter ($filterChain)
	{
		//fb("过滤后");
	}
}

