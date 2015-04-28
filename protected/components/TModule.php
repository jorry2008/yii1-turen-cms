<?php
/**
 * 
 * @author xia.q
 * 规定子模块的开发规则，以便被主模块统一管理，
 * 实现数据库与模块之间的绑定，进而后台可控
 *
 */
abstract class TModule extends CWebModule
{
	public $defaultController='default';
	
// 	public function init()
// 	{
// 		parent::init();
// 	}

	//为rbac准备基础数据
	abstract public static function getRbacConf();
	
}
