<?php
/**
 * 
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $id
 * @property string $user_name
 * @property string $password
 * @property string $email
 * @property string $nick_name
 * @property string $user_group_id
 * @property string $login_ip
 * @property string $date_added
 * @property integer $status
 * @property string $keyword//非数据库字段
 */
class User extends CActiveRecord
{
	const USER_NO = 0;
	const USER_YES = 1;
	
	public $keyword;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_name, password, email, nick_name, user_group_id, status, is_admin', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('user_name', 'length', 'max'=>30),
			array('password, email', 'length', 'max'=>128),
			array('nick_name', 'length', 'max'=>32),
			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_name, password, email, nick_name, user_group_id, login_ip, date_added, status, keyword, is_admin', 'safe', 'on'=>'search'),
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
			'user_group'=>array(self::BELONGS_TO, 'UserGroup', 'user_group_id'),
		);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CActiveRecord::beforeSave()
	 * //CPasswordHelper::verifyPassword($password,$this->password);
	 */
	protected function beforeSave()
	{
		$this->password = $this->hashPassword($this->password);
		$this->date_added = time();
		$this->login_ip = Yii::app()->request->getUserHostAddress();
		
		return true;
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'id',
			'user_name' => Yii::t('user', 'User Name'),
			'password' => Yii::t('user', 'PassWord'),
			'email' => Yii::t('user', 'Email'),
			'nick_name' => Yii::t('user', 'Nick Name'),
			'user_group_id' => Yii::t('user', 'Group Name'),
			'login_ip' => Yii::t('user', 'IP'),
			'date_added' => Yii::t('user', 'Login Time'),
			'status' => Yii::t('user', 'Status'),
			'is_admin' => Yii::t('user', 'Is Admin'),
		);
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
		//http://localhost/turen.pw/index.php?r=backend/user/user/admin&0=&User_sort=email.desc&ajax=user-grid&1=
		
		$criteria = new CDbCriteria;
		
		if(!empty($this->keyword)) {
			//匹配功能
			//compare($column, $value, $partialMatch=false, $operator='AND', $escape=true)
			//参数：$partialMatch是否完全匹配即有几个%，$escape是否使用%
			$criteria->compare('user_name',$this->keyword,true,'OR');
			$criteria->compare('nick_name',$this->keyword,true,'OR');
			$criteria->compare('email',$this->keyword,true,'OR');
			$criteria->compare('login_ip','='.$this->keyword,true,'OR');
		}

		//使用渴望式加载，只需查询一次，相比懒惰加载高效得多
		return $ActiveDataProvider = new CActiveDataProvider($this->with('user_group'), array(
			'criteria'=>$criteria,
			'sort'=>array(
				'class'=>'CSort',//指定排序类
				//'multiSort'=>true,//连续排序
				'defaultOrder'=>array(//指定默认排序的属性
					'date_added'=>CSort::SORT_DESC,//降序排列
				)
			),
		));
	}
	
	/**
	 * Checks if the given password is correct.
	 * @param string the password to be validated
	 * @return boolean whether the password is valid
	 */
	public function validatePassword($password)
	{
		return CPasswordHelper::verifyPassword($password,$this->password);
	}

	/**
	 * Generates the password hash.
	 * @param string password
	 * @return string hash
	 */
	public function hashPassword($password)
	{
		return CPasswordHelper::hashPassword($password);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
