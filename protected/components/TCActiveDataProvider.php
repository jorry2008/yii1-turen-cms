<?php
/**
 * 拓展一下fetchData方法，实现多层分类
 * @author xia.q
 *
 */
class TCActiveDataProvider extends CActiveDataProvider
{
	public $isMuliSort = false;//是否为无限级分类模式
	public $parent_id = 0;//起始的父id
	
	/**
	 * Fetches the data from the persistent data storage.
	 * @return array list of data items
	 */
	protected function fetchData()
	{
		$criteria=clone $this->getCriteria();
	
		if(($pagination=$this->getPagination())!==false)
		{
			$pagination->setItemCount($this->getTotalItemCount());
			$pagination->applyLimit($criteria);
		}
	
		$baseCriteria=$this->model->getDbCriteria(false);
	
		if(($sort=$this->getSort())!==false)
		{
			// set model criteria so that CSort can use its table alias setting
			if($baseCriteria!==null)
			{
				$c=clone $baseCriteria;
				$c->mergeWith($criteria);
				$this->model->setDbCriteria($c);
			}
			else
				$this->model->setDbCriteria($criteria);
			$sort->applyOrder($criteria);
		}
	
		$this->model->setDbCriteria($baseCriteria!==null ? clone $baseCriteria : null);
		$data=$this->model->findAll($criteria);
		
		if($this->isMuliSort)
			$data = $this->muliSort($data, $this->parent_id);
		
		$this->model->setDbCriteria($baseCriteria);  // restore original criteria
		return $data;
	}
	
	/**
	 * 实现无限级分类
	 *
	 * @param UserGroup $models
	 * @param int $pid
	 * @param int $level
	 * @param string $html
	 */
	protected function muliSort(&$models, $pid=0, $level=0, $tip='└' ,$line='——')
	{
		static $tree = array();
		foreach($models as $model) {
			if($model->parent_id == $pid) {
				if($level != 0)
					$model->name = $tip.str_repeat($line, $level).$model->name;
		
				$tree[] = $model;
				$this->muliSort($models, $model->id, $level+1);
			}
		}
		return $tree;
	}
}