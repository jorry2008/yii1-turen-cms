<?php
/**
 * 
 * @author xia.q
 * 规定子模块的开发规则，以便被主模块统一管理，
 * 实现数据库与模块之间的绑定，进而后台可控
 * 
 * 此抽象类，规定了所有module的开发规范
 *
 */
abstract class TModule extends CWebModule
{
	public $defaultController='default';
	
// 	public function init()
// 	{
// 		parent::init();
// 	}

	
}
