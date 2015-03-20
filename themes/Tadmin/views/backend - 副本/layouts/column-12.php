<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//backend/layouts/main'); ?>	
	<div id="tsidebarback"></div>
	<div id="tsidebar">
		<?php 
			$this->widget('zii.widgets.CMenu',array(
	        	'encodeLabel'=>false,//关闭自动转码
        		'htmlOptions'=>array('class'=>'tadminmenu'),//ul
        		'submenuHtmlOptions'=>array('class'=>'hide submenu'),//sub ul
        		'itemCssClass'=>'',//all li
		        'items'=>array(
					array(
						'label'=>'<span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span>仪表盘',
						'url'=>'#',
						'linkOptions'=>array('class'=>''),//a
						'itemOptions'=>array('class'=>''),//only li
						'items'=>array(
							array('label'=>'Home', 'url'=>array('site/index')),
							array('label'=>'Home', 'url'=>array('site/index')),
							array('label'=>'Home', 'url'=>array('site/index')),
						),
					),
	        		array(
        				'label'=>'<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>文章',
        				'url'=>'#',
        				'linkOptions'=>array('class'=>'active'),//a
        				'itemOptions'=>array('class'=>''),//only li
        				//'submenuOptions'=>array('class'=>'show submenu'),
        				'items'=>array(
        					array('label'=>'Home', 'url'=>array('site/index')),
        					array('label'=>'Home', 'url'=>array('site/index')),
        					array('label'=>'Home', 'url'=>array('site/index')),
        				),
	        		),
	        		array(
	        			'label'=>'<span class="glyphicon glyphicon-film" aria-hidden="true"></span>多媒体',
	        			'url'=>'#',
	        			'linkOptions'=>array('class'=>''),//a
	        			'itemOptions'=>array('class'=>''),//only li
	        			'items'=>array(
        					array('label'=>'Home', 'url'=>array('site/index')),
       						array('label'=>'Home', 'url'=>array('site/index')),
       						array('label'=>'Home', 'url'=>array('site/index')),
	       				),
	        		),
	        		array(
        				'label'=>'<span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span>页面',
        				'url'=>'#',
        				'linkOptions'=>array('class'=>''),//a
        				'itemOptions'=>array('class'=>''),//only li
        				'items'=>array(
        					array('label'=>'Home', 'url'=>array('site/index')),
        					array('label'=>'Home', 'url'=>array('site/index')),
        					array('label'=>'Home', 'url'=>array('site/index')),
        				),
	        		),
	        		array(
        				'label'=>'<span class="glyphicon glyphicon-comment" aria-hidden="true"></span>评论',
        				'url'=>'#',
        				'linkOptions'=>array('class'=>''),//a
        				'itemOptions'=>array('class'=>''),//only li
        				'items'=>array(
        					array('label'=>'Home', 'url'=>array('site/index')),
        					array('label'=>'Home', 'url'=>array('site/index')),
        					array('label'=>'Home', 'url'=>array('site/index')),
        				),
	        		),
	        		array(
        				'label'=>'<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>外观',
        				'url'=>'#',
        				'linkOptions'=>array('class'=>''),//a
        				'itemOptions'=>array('class'=>''),//only li
        				'items'=>array(
        					array('label'=>'Home', 'url'=>array('site/index')),
        					array('label'=>'Home', 'url'=>array('site/index')),
       						array('label'=>'Home', 'url'=>array('site/index')),
        				),
	        		),
		        		array(
	        				'label'=>'<span class="glyphicon glyphicon-user" aria-hidden="true"></span>用户',
	        				'url'=>'#',
	        				'linkOptions'=>array('class'=>''),//a
	        				'itemOptions'=>array('class'=>''),//only li
	        				'items'=>array(
        						array('label'=>'Home', 'url'=>array('site/index')),
        						array('label'=>'Home', 'url'=>array('site/index')),
        						array('label'=>'Home', 'url'=>array('site/index')),
	        				),
		        		),
		        		array(
	        				'label'=>'<span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>工具',
	        				'url'=>'#',
	        				'linkOptions'=>array('class'=>''),//a
	        				'itemOptions'=>array('class'=>''),//only li
	        				'items'=>array(
        						array('label'=>'Home', 'url'=>array('site/index')),
        						array('label'=>'Home', 'url'=>array('site/index')),
        						array('label'=>'Home', 'url'=>array('site/index')),
	        				),
		        		),
		        		array(
	        				'label'=>'<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>系统设置',
	        				'url'=>'#',
	        				'linkOptions'=>array('class'=>''),//a
	        				'itemOptions'=>array('class'=>''),//only li
		        			'submenuOptions'=>array('class'=>'show submenu'),
	        				'items'=>array(
        						array('label'=>'系统配置', 'url'=>array('config/general')),
        						array('label'=>'语言管理', 'url'=>array('config/index')),
        						array('label'=>'货币管理', 'url'=>array('config/index')),
        						array('label'=>'模块管理', 'url'=>array('config/index')),	
	        				),
		        		),
		        ),
	        ));
		?>
	</div>
    
	<div id="tcontent">
		<div class="container-fluid">
			<div class="row">
				<?php 
				/*
				if(isset($this->breadcrumbs))
				{
					$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
						'links'=>$this->breadcrumbs,
					));
				}
				*/
				?>
				<?php //帮助系统?>
				<div id="screen-meta">
				    <div id="contextual-help-wrap">
				    	<div id="contextual-help-back"></div>
				        <div id="contextual-help-columns">
				            <div class="contextual-help-tabs">
				                <ul role="tablist" id="tophelp">
									<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">帮助</a></li>
									<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">测试</a></li>
									<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">结论</a></li>
								</ul>
				            </div>
				            <div class="contextual-help-sidebar">
				                <p><strong>更多信息：</strong></p>
				                <p>官方链接1</p>
				                <p>官方链接2</p>
				                <p>官方链接3</p>
				            </div>
				            <div class="contextual-help-tabs-wrap">
				            	<div class="help-tab-content">
					                <div class="tab-content">
										<div role="tabpanel" class="tab-pane active" id="home">
											<p>您可以使用分类目录来给站点分区、按照主题组织相关的文章。默认的目录是“未分类”，您可在撰写选项中修改它。</p>
											<p>分类目录和标签的区别是什么呢？通常，标签是临时安排的一些关键词，用来标记文章中的关键信息（名字，题目等），也许其它文章也会拥有这个标签。而分类则是事先决定了的。若将您的站点比做一本书，那么分类目录就是书的目录，标签则是书前所列出的术语。</p>
										</div>
										<div role="tabpanel" class="tab-pane" id="profile"><p>def</p></div>
										<div role="tabpanel" class="tab-pane" id="messages"><p>opq</p></div>
									</div>
								</div>
				            </div>
				            
				            <div class="clear"></div>
				        </div>
				    </div>
				</div>
				
				<div id="screen-meta-links">
					<div id="contextual-help-link-wrap">
						<a id="contextual-help-link" class="show-settings" href="###">帮助<span class="glyphicon glyphicon-triangle-bottom"></span></a>
					</div>
				</div>
				
				<div class="update-nag hide"><a href="http://codex.wordpress.org/zh-cn:4.1.1_%E7%89%88%E6%9C%AC">WordPress 4.1.1</a>现已发布！<a href="http://localhost/test/admin/wordpress/wp-admin/update-core.php">现在就更新</a>。</div>
				
				<?php echo $content; ?>
			</div>
		</div>
	</div>
	
	<div id="tfooter">
		<div class="container-fluid">
			<div class="row">
				<p id="footer-left" class="alignleft">
					<span id="footer-thankyou">感谢使用<a href="http://turen.org/">Turen</a>进行创作。</span>
				</p>
				<p id="footer-upgrade" class="alignright"> 1.1版本 </p>
			</div>
		</div>
	</div>
    
<?php $this->endContent(); ?>

