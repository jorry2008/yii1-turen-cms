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
	    
    	<?php 
    	$flashes = Yii::app()->user->getFlashes();
    	if($flashes) {
    		foreach ($flashes as $key=>$flash) {
    			echo '<div class="alert alert-'.$key.' alert-dismissable">'."\r\n";
    			echo $flash;
    			echo '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'."\r\n";
    			echo '</div>'."\r\n";
    		}
    	}
    	?>
	    
	    <?php echo $content; ?>
	</div>
	<!-- /.login-box -->
</body>

<?php $this->endContent(); ?>
