<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//backend/layouts/main'); ?>

<body class="skin-blue login-page">
	<div class="login-box">
	    <div class="login-logo">
	        <a href="">
	            <b><?php echo Yii::app()->name;?></b>
	        </a>
	    </div>
	    <!-- /.login-logo -->
	    <?php echo $content; ?>
	</div>
	<!-- /.login-box -->
</body>

<?php $this->endContent(); ?>
