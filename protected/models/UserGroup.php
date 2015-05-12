<?php
/**
 * This is the model class for table "{{user_group}}".
 *
 * The followings are the available columns in table '{{user_group}}':
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property string $role
 * @property integer $status
 */
class UserGroup extends CActiveRecord
{
	public $keyword;
	
	const MAX_PAGE_NUM = 100;//最大分页数量，因为涉及到无限级分层一次展示
	const USER_GROUP_YES = 1;
	const USER_GROUP_NO = 0;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user_group}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parent_id, name, role, sort', 'required'),
			array('parent_id, status, sort', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>64),
			array('role', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, parent_id, name, role, status, is_default, sort', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('userGroup', 'ID'),
			'parent_id' => Yii::t('userGroup', 'Belong Category'),
			'name' => Yii::t('userGroup', 'Name'),
			'role' => Yii::t('userGroup', 'Role'),
			'status' => Yii::t('userGroup', 'Status'),
		);
	}
	
	/**
	 * 普通的过滤条件，传Criteria参数条件
	 * 
	 * (non-PHPdoc)
	 * @see CActiveRecord::scopes()
	 */
	public function scopes()
	{
		return array(
			'published'=>array(
				'condition'=>'parent_id=0',
			),
// 			'recently'=>array(
// 				'order'=>'create_time DESC',
// 				'limit'=>5,
// 			),
		);
	}
	
	/**
	 * 参数化过滤条件，传Criteria对象
	 * 
	 * @param int $limit
	 */
	public function recently($limit=5)
	{
		//这个技巧很灵活
		$this->getDbCriteria()->mergeWith(array(
			'order'=>'id DESC',
			'limit'=>$limit,
		));
		return $this;
	}
	
	/**
	 * 实现无限级分类
	 *
	 * @param UserGroup $models
	 * @param int $pid
	 * @param int $level
	 * @param string $html
	 */
	protected function muliSort(&$models, $pid=0, $level=0, $tip='└' ,$line='——')
	{
		static $tree = array();
		foreach($models as $model) {
			if($model->parent_id == $pid) {
				if($level != 0)
					$model->name = $tip.str_repeat($line, $level).$model->name;
	
				$tree[] = $model;
				$this->muliSort($models, $model->id, $level+1);
			}
		}
		return $tree;
	}
	
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		$criteria=new CDbCriteria;
		
		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('is_default',$this->is_default);
	
		return new TCActiveDataProvider($this, array(
				'isMuliSort'=>true,//开启无限级分类
				'parent_id'=>0,//开始父id为0
				
				//条件
				'criteria'=>$criteria,
				//排序
				'sort'=>array(
					'class'=>'CSort',//指定排序类
					//'multiSort'=>true,//连续排序
					'defaultOrder'=>array(//指定默认排序的属性
						'sort'=>CSort::SORT_ASC,//降序排列
					)
				),
				//条件
		// 			'criteria'=>array(
				// 				'condition'=>'status=1',
				// 				'order'=>'create_time DESC',
				// 				'with'=>array('author'),
				// 			),
				//汇总
		// 			'countCriteria'=>array(
				// 				'condition'=>'status=1',
				// 				// 'order' and 'with' clauses have no meaning for the count query
				// 			),
				//分页
				'pagination'=>array(
						'pageSize'=>self::MAX_PAGE_NUM,
				),
		));
	}
	
	/**
	 * 返回现一个经过分类排序的user group列表
	 * self::MAX_PAGE_NUM
	 * 
	 * @return array
	 */
	public function getUserGroupSelect($haveTop = true)
	{
		$models = $this->findAll(array(
				'order'=>'sort ASC',
				'limit'=>self::MAX_PAGE_NUM,
				));
		$models = $this->muliSort($models);
		$selects = $haveTop?array(0=>Yii::t('user_userGroup', 'Top Category')):array();
		foreach ($models as $model) {
			$selects[$model->id] = $model->name;
		}
		return $selects;
	}
	
	/**
	 * 创建、更新和删除操作时，检测is_default这个值
	 * 
	 * @param int $id
	 * @return boolean
	 */
	protected function dealDefault($id)
	{
		
		return true;
	}
	
	/**
	 * 当有role更新时，同样也会影响到组对应的role名称，当前组也要同时更新
	 * 
	 * @param string $role
	 * @return boolean
	 */
	public function dealRoleUpdate($role)
	{
		
	}
	
	/**
	 * 当有role删除时，当前组就当恢复到role的一个默认值TCDbAuthManager::ROLE_DEFAULT
	 * 
	 * @param string $role
	 * @return boolean
	 */
	public function dealRoleDelete($role)
	{
		
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserGroup the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
