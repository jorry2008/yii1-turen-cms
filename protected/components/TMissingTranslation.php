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
		
		//查询source message表，没有就创建
		$result = $connection->createCommand()
				->select('id')
				->from('{{source_message}}')
				->where('category=:category', array(':category'=>$event->category))
				->andWhere('message=:message', array(':message'=>$event->message))
				->queryRow();
		
		//创建一对记录
		if($result === false) {
			$connection->createCommand()->insert('{{source_message}}', array(
				'category'=>$event->category,
				'message'=>$event->message,
			));
			
			$connection->createCommand()->insert('{{message}}', array(
				'id'=>$connection->getLastInsertID(),
				'language'=>$event->language,
				'translation'=>self::DEFUALT.$event->message,
			));
		}
		
		// 发送邮件
// 		mail('admin@example.com', 'Missing translation', $text);
		return $event;
	}
}

