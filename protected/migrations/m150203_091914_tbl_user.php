<?php
/*
 * 使用了数据库版本控制，我们可以不需要在数据库端进行操作，
 * 所有的操作都以版本迁移的方式处理，
 * 此工具会产生非常详细的迁移日志，有效的保证了团队开发出错的机率
 */
class m150203_091914_tbl_user extends CDbMigration
{
	//版本升级
	public function up()
	{
		
		echo '执行了up091914....';
// 		$this->addColumn($table, $column, $type);
// 		$this->insert($table, $columns);
	}

	//版本还原
	public function down()
	{
		echo "m150203_091914_tbl_user does not support migration down.\n";
		return false;
// 		$this->delete($table);
// 		$this->dropColumn($table, $column);
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		
	}

	public function safeDown()
	{
		
	}
	*/
}