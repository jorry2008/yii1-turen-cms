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
		$sourceMessageTable = Yii::app()->messages->sourceMessageTable;
		$translatedMessageTable = Yii::app()->messages->translatedMessageTable;
		
		//查询source message表，没有就创建
		$result = $connection->createCommand()
				->select('id')
				->from($sourceMessageTable)
				->where('category=:category', array(':category'=>$event->category))
				->andWhere('message=:message', array(':message'=>$event->message))
				->queryRow();
		
		//创建一对记录
		if($result === false) {
			$connection->createCommand()->insert($sourceMessageTable, array(
				'category'=>$event->category,
				'message'=>$event->message,
			));
			
			$id = $connection->getLastInsertID();
		} else {//没有翻译
			$id = $result['id'];
		}
		
		//因为复合主键和外键因素，//这里翻译错误处理的事件会有所误报，以防万一（有空处理此bug）
		$translatedResult = $connection->createCommand()
			->select('id')
			->from($translatedMessageTable)
			->where('id=:id', array(':id'=>$id))
			->andWhere('language=:language', array(':language'=>$event->language))
			->queryRow();
		
		if($translatedResult === false) {
			$connection->createCommand()->insert($translatedMessageTable, array(
					'id'=>$id,
					'language'=>$event->language,
					'translation'=>self::DEFUALT.$event->message,
			));
		}
		
		// 发送邮件
// 		mail('admin@example.com', 'Missing translation', $text);
		return $event;
	}
}

