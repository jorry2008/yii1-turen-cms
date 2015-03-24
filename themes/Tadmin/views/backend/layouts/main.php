<!DOCTYPE html>
<html lang="<?php echo Yii::app()->language;?>">
<head>
	<title><?php echo CHtml::encode($this->pageTitle).' - '.Yii::app()->name; ?></title>
	<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<?php echo $content; ?>

</html>









