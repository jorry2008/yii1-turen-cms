<?php
/**
 * 
 * @author xia.q
 * 这个事件的事件类是 CMissingTranslationEvent
 *
 */
class TMissingTranslation extends CComponent
{
	const DEFUALT = 'T';
	
	static function handleMissingTranslation($event)
	{
		//数据库连接对象
		$connection = $event->sender->getDbConnection();
		
		$newId = 0;
		//查询source message表，没有就创建
		$result = $connection->createCommand()
				->select('id')
				->from('{{source_message}}')
				->where('category=:category', array(':category'=>$event->category))
				->andWhere('message=:message', array(':message'=>$event->message))
				->queryRow();
		
		//创建此记录
		if($result === false) {
			//获取最大id
			$result = $connection->createCommand()
					->select('id')
					->from('{{source_message}}')
					->where('1=1')
					->order('id DESC')
					->queryRow();
			
			$line = $connection->createCommand()->insert('{{source_message}}', array(
				'id'=>($result['id']+1),
				'category'=>$event->category,
				'message'=>$event->message,
			));
			
			$newId = $result['id']+1;
		} else {
			$newId = $result['id'];
		}
		
		//插入一个空的
		$line = $connection->createCommand()->insert('{{message}}', array(
				'id'=>$newId,
				'language'=>$event->language,
				'translation'=>self::DEFUALT.$event->message,
		));
		
		// 发送邮件
// 		mail('admin@example.com', 'Missing translation', $text);
	}
}

