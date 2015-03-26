<?php 
/**
 * 
 * @author xia.q
 *
 */
Yii::import('zii.widgets.grid.CGridView');

class TGridView extends CGridView
{
	
	
	/**
	 * 拓展一个header模板
	 */
	public function renderHeader()
	{
		echo '<div class="box-header">
                  <h3 class="box-title">管理员列表</h3>
                  <div class="box-tools">
                    <div class="input-group">
                      <input type="text" placeholder="Search" style="width: 150px;" class="form-control input-sm pull-right" name="table_search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div>';
	}
}