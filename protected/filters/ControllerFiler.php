<?php
class ControllerFiler extends CFilter
{
	public function init()
	{
		//fb('此对象首次执行的方法...');
	}
	
	protected function preFilter ($filterChain)
	{
		//fb("过滤前");
		
		
		/*
		fb("过滤前1");
		
		
		try {
			$post = Post::model()->find('id=3');
			fb($post);
		} catch (Exception $e) {
// 			fb($e);
			fb('不做什么');
		}
		
		fb("过滤前2");
		*/
		
		return true;
	}
	
	protected function postFilter ($filterChain)
	{
		//fb("过滤后");
		
	}
}

