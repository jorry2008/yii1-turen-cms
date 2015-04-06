<?php
/**
 * 
 * @author xia.q
 * 过滤器的位置：
 * TBackendController
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
		//fb("过滤前");
		return true; // false if the action should not be executed
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

