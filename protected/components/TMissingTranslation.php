<?php
/**
 * 
 * @author xia.q
 *
 */
class TMissingTranslation extends CComponent
{
	static function handleMissingTranslation($event)
	{
		// 这个事件的事件类是 CMissingTranslationEvent
		// 因此我们能获得这个message的一些信息
		$text = implode("\n", array(
				'Language: '.$event->language,
				'Category:'.$event->category,
				'Message:'.$event->message
		));
		
		//事件的触发者
		$dbMessageSource = $event->sender;
		
		//加入数据库
		$command=$dbMessageSource->getDbConnection()->createCommand();
		fb($command);
// 		->select("t1.message AS message, t2.translation AS translation")
// 		->from(array("{$this->sourceMessageTable} t1","{$this->translatedMessageTable} t2"))
// 		->where('t1.id=t2.id AND t1.category=:category AND t2.language=:language',array(':category'=>$category,':language'=>$language))
		
		// 发送邮件
// 		mail('admin@example.com', 'Missing translation', $text);
	}
}

