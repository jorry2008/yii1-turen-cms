<?php
/**
 * 
 * @author xia.q
 * 过滤器的位置：
 * TBackendController
 *
 */
class LanguageFilter extends CFilter
{
	private $id = 'languagefilter';
	
	/**
	 * (non-PHPdoc)
	 * @see CFilter::init()
	 * 最优先处理
	 */
	public function init()
	{
		parent::init();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CFilter::preFilter()
	 * 控制器执行之前就处理了
	 */
	protected function preFilter ($filterChain)
	{
		fb('多语言过滤器');
		//处理多语言切换
		//fb(Yii::app()->config->get('config_back_language'));
		Yii::app()->language = Yii::app()->config->get('config_back_language');
		
		return true; // false if the action should not be executed
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CFilter::postFilter()
	 * 控制器执行之后，才处理
	 */
	protected function postFilter ($filterChain)
	{
		//fb("过滤后");
	}
}

