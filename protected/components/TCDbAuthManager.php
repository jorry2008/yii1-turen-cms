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
	//系统中所有的role对象
	private $roles = array();
	
	/**
	 * 按列的方式取出Task及下面的operation
	 * 
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
	 * 获取指定类型的操作item
	 * 
	 * @param int $col
	 * @return array
	 */
	public function getAuthItemsForSelects($type = CAuthItem::TYPE_OPERATION)
	{
		if(!$this->roles) {
			$this->roles = $this->getAuthItems($type);
		}
		$temp = array();
		foreach ($this->roles as $name=>$authItem)
			$temp[$authItem->name] = $authItem->description;
		
		return $temp;
	}
	
	/**
	 * 批量删除指定task或者role的所有子item，通过
	 * 
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
	
	/**
	 * 删除task和operation及它们之间的关联
	 * //注意，一定要保留role
	 * 
	 * @return void
	 */
	public function clearTaskAndOperation()
	{
		//获取所有task
		$tasks = $this->getAuthItems(CAuthItem::TYPE_TASK);
		foreach ($tasks as $taskKey=>$task) {
			$operations = $this->getItemChildren($task->name);
			foreach ($operations as $opKey=>$operation) {
				//删除关联关系
				//$this->removeItemChild($task->name, $operation->name);//不需要特意去删除，因为有外键约束
				//删除operation
				$this->removeAuthItem($operation->name);
			}
			//删除task
			$this->removeAuthItem($task->name);
		}
	}
}





