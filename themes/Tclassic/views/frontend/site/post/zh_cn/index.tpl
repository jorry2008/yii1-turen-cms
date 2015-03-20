<?php if(!empty($_GET['tag'])): ?>
<h1>Posts Tagged with <i><?php echo CHtml::encode($_GET['tag']); ?></i></h1>
<?php endif; ?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'template'=>"{items}\n{pager}",
)); ?>

<?php 
Yii::app()->clientScript->registerCoreScript("bxslider");

?>

这是一个zh_cn本地化模板
<br>
<?php $expression = '这是一个由模板引擎解析后的数据';?>
<%= $expression %>
<!--- comments --->
