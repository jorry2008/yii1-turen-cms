<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//backend/layouts/main'); ?>

<body class="skin-blue <?php echo $route = str_replace('/', '-', $this->module->id);echo ' '.$route.'-'.$this->id; ?>">
	<div class="wrapper">
	    <!-- Main Header -->
	    <header class="main-header">
	    
	        <!-- Logo固定在这里，不容易修改 -->
	        <?php echo CHtml::link('土人系统', Yii::app()->homeUrl, array('class'=>'logo'));?>
	        
	        <!-- Header Navbar -->
	        <nav class="navbar navbar-static-top" role="navigation">
	        
	            <!-- Sidebar toggle button-->
	            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
	                <span class="sr-only">Toggle navigation</span>
	            </a>
	            
	            <!-- Navbar Right Menu -->
	            <div class="navbar-custom-menu">
	                <ul class="nav navbar-nav">
	                    <!-- Messages: style can be found in dropdown.less-->
	                    <li class="dropdown messages-menu">
	                        <!-- Menu toggle button -->
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	                            <i class="fa fa-envelope-o"></i>
	                            <span class="label label-success">4</span>
	                        </a>
	                        <ul class="dropdown-menu">
	                            <li class="header">You have 4 messages</li>
	                            <li>
	                                <!-- inner menu: contains the messages -->
	                                <ul class="menu">
	                                    <li>
	                                        <!-- start message -->
	                                        <a href="#">
	                                            <div class="pull-left">
	                                                <!-- User Image -->
	                                                <img src="<?php echo Yii::app()->adminlte->getAssetsUrl();?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
	                                            </div>
	                                            <!-- Message title and timestamp -->
	                                            <h4>
	                                                Support Team
	                                                <small>
	                                                    <i class="fa fa-clock-o">
	                                                    </i>
	                                                    5 mins
	                                                </small>
	                                            </h4>
	                                            <!-- The message -->
	                                            <p>
	                                                Why not buy a new awesome theme?
	                                            </p>
	                                        </a>
	                                    </li>
	                                    <!-- end message -->
	                                </ul>
	                                <!-- /.menu -->
	                            </li>
	                            <li class="footer">
	                                <a href="#">
	                                    See All Messages
	                                </a>
	                            </li>
	                        </ul>
	                    </li>
	                    <!-- /.messages-menu -->
	                    
	                    <!-- Notifications Menu -->
	                    <li class="dropdown notifications-menu">
	                        <!-- Menu toggle button -->
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	                            <i class="fa fa-bell-o"></i>
	                            <span class="label label-warning">10</span>
	                        </a>
	                        <ul class="dropdown-menu">
	                            <li class="header">
	                                You have 10 notifications
	                            </li>
	                            <li>
	                                <!-- Inner Menu: contains the notifications -->
	                                <ul class="menu">
	                                    <li>
	                                        <!-- start notification -->
	                                        <a href="#">
	                                            <i class="fa fa-users text-aqua"></i>
	                                            5 new members joined today
	                                        </a>
	                                    </li>
	                                    <!-- end notification -->
	                                </ul>
	                            </li>
	                            <li class="footer">
	                                <a href="#"><?php echo Yii::t('common', 'View All');?></a>
	                            </li>
	                        </ul>
	                    </li>
	                    <!-- Tasks Menu -->
	                    <li class="dropdown tasks-menu">
	                        <!-- Menu Toggle Button -->
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	                            <i class="fa fa-flag-o"></i>
	                            <span class="label label-danger">9</span>
	                        </a>
	                        <ul class="dropdown-menu">
	                            <li class="header"><?php echo Yii::t('common', 'Message');?></li>
	                            <li>
	                                <!-- Inner menu: contains the tasks -->
	                                <ul class="menu">
	                                    <li>
	                                        <!-- Task item -->
	                                        <a href="#">
	                                            <!-- Task title and progress text -->
	                                            <h3>
	                                                Design some buttons
	                                                <small class="pull-right">20%</small>
	                                            </h3>
	                                            <!-- The progress bar -->
	                                            <div class="progress xs">
	                                                <!-- Change the css width attribute to simulate progress -->
	                                                <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
	                                                aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
	                                                    <span class="sr-only">
	                                                        20% Complete
	                                                    </span>
	                                                </div>
	                                            </div>
	                                        </a>
	                                    </li>
	                                    <!-- end task item -->
	                                </ul>
	                            </li>
	                            <li class="footer">
	                                <a href="#"><?php echo Yii::t('common', 'View All');?></a>
	                            </li>
	                        </ul>
	                    </li>
	                    <!-- User Account Menu -->
	                    <li class="dropdown user user-menu">
	                        <!-- Menu Toggle Button -->
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	                        
	                            <!-- The user image in the navbar-->
	                            <img src="<?php echo Yii::app()->adminlte->getAssetsUrl();?>/dist/img/user2-160x160.jpg" class="user-image" alt="User Image" />
	                            
	                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
	                            <span class="hidden-xs"><?php echo Yii::app()->user->name;?></span>
	                        </a>
	                        <ul class="dropdown-menu">
	                            <!-- The user image in the menu -->
	                            <li class="user-header">
	                                <img src="<?php echo Yii::app()->adminlte->getAssetsUrl();?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
	                                <p>
	                                    Jorry - Web Developer
	                                    <small>Member since Nov. 2014</small>
	                                </p>
	                            </li>
	                            
	                            <!-- Menu Body -->
	                            <li class="user-body">
	                                <div class="col-xs-4 text-center">
	                                    <a href="#">
	                                        Followers
	                                    </a>
	                                </div>
	                                <div class="col-xs-4 text-center">
	                                    <a href="#">
	                                        Sales
	                                    </a>
	                                </div>
	                                <div class="col-xs-4 text-center">
	                                    <a href="#">
	                                        Friends
	                                    </a>
	                                </div>
	                            </li>
	                            <!-- Menu Footer-->
	                            <li class="user-footer">
	                                <div class="pull-left">
	                                    <a href="#" class="btn btn-default btn-flat">
	                                        Profile
	                                    </a>
	                                </div>
	                                <div class="pull-right">
	                                	<?php echo CHtml::link(Yii::t('common', 'Sign out'), array('common/logout'), array('class'=>'btn btn-default btn-flat'));?>
	                                </div>
	                            </li>
	                        </ul>
	                    </li>
	                </ul>
	            </div>
	        </nav>
	    </header>
	    
	    <!-- Left side column. contains the logo and sidebar -->
	    <aside class="main-sidebar">
	        <!-- sidebar: style can be found in sidebar.less -->
	        <section class="sidebar">
	            <!-- Sidebar Menu -->
	            <ul class="sidebar-menu">
	                <li class="header"></li>
	                <!-- Optionally, you can add icons to the links -->
	                <li class="active">
	                	<?php echo CHtml::link('<i class="fa fa-dashboard"></i><span>仪表盘</span>',Yii::app()->homeUrl);?>
					</li>
					<li>
						<a href="#">
							<i class="fa fa-list-ul"></i>
							<span>栏目管理</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
					</li>
					<li>
						<a href="#">
							<span>界面管理</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
					</li>
					<li class="treeview">
						<a href="#">
							<span>管理员管理</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li><?php echo CHtml::link('管理员管理',array('/backend/user/user/admin'));?></li>
							<li>
								<a href="#">管理员群组</a>
							</li>
						</ul>
					</li>
					<li class="treeview">
						<a href="#">
							<span>系统管理</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li><?php echo CHtml::link('站点配置',array('/backend/manage/config/admin'));?></li>
							<li>
								<a href="#">模块管理</a>
							</li>
							<li><?php echo CHtml::link('多语言',array('/backend/manage/message/admin'));?></li>
							<li>
								<a href="#">多货币</a>
							</li>
						</ul>
					</li>
					<li class="treeview">
						<a href="#">
							<span>角色与权限</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<!-- 
							<li><?php echo CHtml::link('自动配置操作',array('/backend/auth/auto/deal'));?></li>
							 -->
							<li><?php echo CHtml::link('角色管理',array('/backend/auth/role/admin'));?></li>
							<li><?php echo CHtml::link('权限元管理',array('/backend/auth/authItem/admin'));?></li>
						</ul>
					</li>
	            </ul>
	            <!-- /.sidebar-menu -->
	        </section>
	        <!-- /.sidebar -->
	    </aside>
	    
	    <!-- Content Wrapper. Contains page content -->
	    <div class="content-wrapper">
	    	<div class="box-body">
	    		<?php 
	    		/*
	    		if(Yii::app()->user->hasFlash(TWebUser::FOREVER)) {
	    			$error = Yii::app()->user->getFlash(TWebUser::FOREVER,null,false);
	    			echo '<div class="alert alert-warning alert-dismissable">'."\r\n";
	    			echo $error;
	    			echo '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'."\r\n";
	    			echo '</div>'."\r\n";
	    		}
	    		*/
	    		
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
			</div>
			
	        <!-- Content Header (Page header) -->
	        <section class="content-header">
	            <h1>
	                <?php echo $this->pageTitle;?>
	                <i><small>hi turen!</small></i>
	            </h1>
<!-- 	            <ol class="breadcrumb"> -->
<!-- 	                <li> -->
<!-- 	                    <a href="#"><i class="fa fa-dashboard"></i>Level</a> -->
<!-- 	                </li> -->
<!-- 	                <li class="active">Here</li> -->
<!-- 	            </ol> -->
	            
				<?php 
// 					$this->widget('zii.widgets.CMenu',array(
//  					'encodeLabel'=>false,//关闭自动转码
// 						'htmlOptions'=>array('id'=>'child_links'),//作用于子ul上
// 						'items'=>$this->menu,
// 					));?>
				
				<!-- breadcrumbs -->
				<?php 
				//改变home链接
				$homeLink = CHtml::link('<i class="fa fa-dashboard"></i> Home', Yii::app()->homeUrl);
				$this->widget('zii.widgets.CBreadcrumbs', 
					array('links'=>$this->breadcrumbs,'homeLink'=>$homeLink, 'tagName'=>'ol', 'htmlOptions'=>array('class'=>'breadcrumb'))
				); 
				?>
	            
	        </section>
	        <!-- Main content -->
	        <section class="content">
	        
	        	<!-- 
	        	<div class="alert alert-danger alert-dismissable">
				    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				    <i class="icon fa fa-ban"></i>这是一个错误
				</div>
				<div class="alert alert-info alert-dismissable">
				    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<i class="icon fa fa-info"></i>这是一个提示信息
				</div>
				<div class="alert alert-warning alert-dismissable">
				    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				    <i class="icon fa fa-warning"></i>这是一个警告
				</div>
				<div class="alert alert-success alert-dismissable">
				    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				    <i class="icon fa fa-check"></i>这是一个成功
				</div>
				 -->
				 
	            <?php echo $content; ?>
	        </section>
	        <!-- /.content -->
	    </div>
	    <!-- /.content-wrapper -->
	    
	    <!-- Main Footer -->
	    <footer class="main-footer">
	        <!-- To the right -->
	        <div class="pull-right hidden-xs">
	            Anything you want
	        </div>
	        <!-- Default to the left -->
	        <strong>
	            Copyright &copy; 2015
	            <a target="_blank" href="http://www.turen.pw">土人系统</a>.
	        </strong>
	        All rights reserved.
	    </footer>
	</div>
	<!-- ./wrapper -->
</body>

<?php $this->endContent(); ?>
