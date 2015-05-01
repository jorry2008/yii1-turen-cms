<?php
/**
 * TCDbAuthManager class file.
 *
 * @author jorry <jorry.xia@gmail.com>
 * @link http://www.turen.pw/
 * @copyright 2004-2018 Yii Software LLC
 * @license http://www.turen.pw/license/
 */

/**
 * 
 * @author xia.q
 * @version 1.1
 *
 */
class TCDbAuthManager extends CDbAuthManager
{
	public function init()
	{
		parent::init();
		
		
	}
	
	/**
	 *
	 * 按列的方式取出Task及下面的operation
	 * @param int $col
	 * @return array
	 */
	public function getTasksAndOperations()
	{
		$cols = array();
		$tasks = $this->getAuthItems(CAuthItem::TYPE_TASK);
		
		foreach ($tasks as $name=>$authItem) {
			$operations = $this->getItemChildren($name);
			$cols[] = array(
					'task'=>$authItem,
					'operations'=>$operations,
					);
		}
		
		return $cols;
	}
	
	/**
	 * 批量删除指定task或者role的所有子item
	 * @param string $name
	 */
	public function removeAllItems($name)
	{
		$items = $this->getItemChildren($name);
		$itemKey = array_keys($items);
		foreach ($itemKey as $value) {
			if($this->hasItemChild($name, $value)) {
				$this->removeItemChild($name, $value);
			}
		}
	}
}





