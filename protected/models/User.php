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
 * @property integer $question
 * @property string $answer
 * @property string $user_group_id
 * @property string $login_ip
 * @property string $date_added
 * @property integer $status
 */
class User extends CActiveRecord
{
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
			array('user_name, password, email, nick_name, user_group_id, status', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('user_name', 'length', 'max'=>30),
			array('password, email', 'length', 'max'=>128),
			array('nick_name', 'length', 'max'=>32),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_name, password, email, nick_name, user_group_id, login_ip, date_added, status', 'safe', 'on'=>'search'),
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
			'id' => 'id',
			'user_name' => '用户名',
			'password' => '密码',
			'email' => '邮箱',
			'nick_name' => '昵称',
			'user_group_id' => '用户组',
			'login_ip' => '登录IP',
			'date_added' => '登录时间',
			'status' => '启用',
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

		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('nick_name',$this->nick_name,true);
		$criteria->compare('user_group_id',$this->user_group_id,true);
		$criteria->compare('login_ip',$this->login_ip,true);
		$criteria->compare('date_added',$this->date_added,true);
		$criteria->compare('status',$this->status);
		
		$criteria->order = 'user_group_id';

		$ActiveDataProvider = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'class'=>'CSort',//指定排序类
				'multiSort'=>true,//连续排序
			),
		));
		
		return $ActiveDataProvider;
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
