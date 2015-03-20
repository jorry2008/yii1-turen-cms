<?php
class MyFilter extends CFilter
{
	private $_id = 'myfilter';
	
	public function init()
	{
		fb('此对象首次执行的方法...');
	}
	
	protected function preFilter ($filterChain)
	{
		// logic being applied before the action is executed
		fb("过滤前");
		return true; // false if the action should not be executed
	}
	protected function postFilter ($filterChain)
	{
		fb("过滤后");
	}
}

