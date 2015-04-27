<?php
/*
在模板最后的渲染中，clientscript的作用才显示的出来。

最后一步：
Yii::app()->getClientScript()->render($output);

即
public function render(&$output)
{
	if(!$this->hasScripts)
		return;

	$this->renderCoreScripts();//渲染核心脚本

	if(!empty($this->scriptMap))
		$this->remapScripts();//处理map script

	$this->unifyScripts();//整合script

	$this->renderHead($output);//处理文档head
	
	if($this->enableJavaScript)
	{
		//整合脚本到ouput
		$this->renderBodyBegin($output);
		$this->renderBodyEnd($output);
	}
}





































 */