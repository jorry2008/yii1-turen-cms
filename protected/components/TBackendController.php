<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
abstract class TBackendController extends Controller
{
	public $defaultAction='index';
	
	//为rbac准备基础数据
	abstract public static function getRbacConf();
}


