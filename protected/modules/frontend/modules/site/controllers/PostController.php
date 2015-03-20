<?php

class PostController extends Controller
{
	//权限交给了module
	//public $layout='column2';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;
	
	public $testtest = '';

	/**
	 * @return array action filters
	 */
	
	/*
	public function filters()
	{
		return array();
		
		return array(
			//这是一个专门的一个访问控制过滤器CAccessControlFilter，它是对当前过滤器功能的一个具体实现
			'accessControl',//对所有action有效
		);

		//这个数组和actions()返回的形式是一样的，用于创建对应的过滤器链对象
		//并统一交由过滤管理器对象管理
		return array(
				//普通的过滤器，就是指定当前控制器中的一个过滤器方法，
				//并指定此方法对多少action有效，不需要参于过滤器链
				'productList01 + index',
				'productList02 + index',
				
				'filterPostOnly + index',//利用系统的内置过滤器方法
				
				//普通过滤器类
				array(
					'application.filters.MyFilter + index',
				),
			);
	}
	*/
	
	//普通过滤器方法
	public function filterProductList01($filterChain)
	{
		//fb('过滤器测试');
		//不断的调用run()就形成了一个完整的递归调用 filter，直到消耗完过滤管理器链的过滤器
		//当然，在这里也可以调用过滤管理器更上层的方法
		$filterChain->run();
	}
	//普通过滤器方法
	public function filterProductList02($filterChain)
	{
		$filterChain->run();
	}
	
	//在总控制器中这样写
	//一共只有两种状态：允许allow，deny禁止
	//配置CAccessControlFilter初始参数
	public function accessRules()
	{
		//权限是建立在用户登录的基础上
		return array(
			array('deny',//allow，必须是首位
				'actions'=>array('index'),//action方法
				'controllers'=>array('post'),//控制器包括带moudle的形式'admin/user'
				//'users'=>array('?'),//用户名，仅通过用户名和登录状态判断访问权限
				//'roles'=>array('admin', 'editor'),//普通角色，角色是由CWebUser::checkAccess()提供
				//**'roles'=>array('updateTopic'=>array('topic'=>$topic))//针对RBAC bizRules参数
				//'ips'=>array('127.0.0.1'),//ip列表，支付127.*.1.1
				//'verbs'=>array('GET', 'POST'),//提交类型
				//'expression'=>'!$user->isGuest && $user->level==2',//php表达式，返回true或false，同样也支付function
				'message'=>'Jorry say "Access Denied".',//自定义deny权限提示信息
				//message和deniedCallback参数的执行是二选一的，，，，
				//回调方法，当验证失败即返回-1，则调用此全局方法，此方法是单独执行，与yii本身没有关系，即后面的action不会执行
				//'deniedCallback'=>'redirectToDeniedMethod',
			),
			array('deny',
				'actions'=>array('delete'),
				'roles'=>array('?'),
			),
// 			array('deny',
// 				'actions'=>array('delete'),
// 				'users'=>array('*'),
// 			),
		);
	}
	
	public function actions()
	{
		return array(
			'test'=>array(
				'class'=>'application.controllers.post.UpdateAction',
				'property'=>'',
				//'property1'=>$this->testtest,
			),
		);
		
		
	}

	/**
	 * Displays a particular model.
	 * 在yii中控制器和视图只是一个简单的分离，
	 * 数据在它们之间传递，只是个形式而已
	 */
	public function actionView()
	{
		$post=$this->loadModel();
		$comment=$this->newComment($post);

		//$this->render('view'支持多种路径模式，可以取任意指定的外部模板
		$this->render('view',array(
			'model'=>$post,
			'comment'=>$comment,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Post;
		if(isset($_POST['Post']))
		{
			$model->attributes=$_POST['Post'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();
		if(isset($_POST['Post']))
		{
			$model->attributes=$_POST['Post'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel()->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$criteria=new CDbCriteria(array(
			'condition'=>'status='.Post::STATUS_PUBLISHED,
			'order'=>'update_time DESC',
			'with'=>'commentCount',
		));
		
		if(isset($_GET['tag']))
			$criteria->addSearchCondition('tags',$_GET['tag']);

		$db = Yii::app()->db;
		
		$dataProvider=new CActiveDataProvider('Post', array(
			'pagination'=>array(
				'pageSize'=>Yii::app()->params['postsPerPage'],
			),
			'criteria'=>$criteria,
		));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Post('search');
		if(isset($_GET['Post']))
			$model->attributes=$_GET['Post'];
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Suggests tags based on the current user input.
	 * This is called via AJAX when the user is entering the tags input.
	 */
	public function actionSuggestTags()
	{
		if(isset($_GET['q']) && ($keyword=trim($_GET['q']))!=='')
		{
			$tags=Tag::model()->suggestTags($keyword);
			if($tags!==array())
				echo implode("\n",$tags);
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
			{
				if(Yii::app()->user->isGuest)
					$condition='status='.Post::STATUS_PUBLISHED.' OR status='.Post::STATUS_ARCHIVED;
				else
					$condition='';
				$this->_model=Post::model()->findByPk($_GET['id'], $condition);
			}
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	/**
	 * Creates a new comment.
	 * This method attempts to create a new comment based on the user input.
	 * If the comment is successfully created, the browser will be redirected
	 * to show the created comment.
	 * @param Post the post that the new comment belongs to
	 * @return Comment the comment instance
	 */
	protected function newComment($post)
	{
		$comment=new Comment;
		if(isset($_POST['ajax']) && $_POST['ajax']==='comment-form')
		{
			echo CActiveForm::validate($comment);
			Yii::app()->end();
		}
		if(isset($_POST['Comment']))
		{
			$comment->attributes=$_POST['Comment'];
			if($post->addComment($comment))
			{
				if($comment->status==Comment::STATUS_PENDING)
					Yii::app()->user->setFlash('commentSubmitted','Thank you for your comment. Your comment will be posted once it is approved.');
				$this->refresh();
			}
		}
		return $comment;
	}
}
