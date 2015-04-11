<?php

/**
 * This is the model class for table "{{message}}".
 *
 * The followings are the available columns in table '{{message}}':
 * @property integer $id
 * @property string $language
 * @property string $translation
 *
 * The followings are the available model relations:
 * @property SourceMessage $id0
 */
class Message extends CActiveRecord
{
	public $keyword;
	public $languageCode;
	
	public function init()
	{
		parent::init();
		$this->languageCode = Yii::app()->language;
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{message}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'numerical', 'integerOnly'=>true),
			array('language', 'length', 'max'=>16),
			array('translation', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, language, translation', 'safe', 'on'=>'search'),
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
			'source' => array(self::BELONGS_TO, 'SourceMessage', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'language' => '语言iso码',
			'translation' => '翻译',
			'keyword' => '关键词',
			'languageCode' => '语言代码',
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

		$criteria=new CDbCriteria;
		$criteria->addCondition('language=\''.$this->languageCode.'\'');
		if(!empty($this->keyword)) {
			$criteria->compare('language',$this->keyword,true,'OR');
			$criteria->compare('translation',$this->keyword,true,'OR');
			$criteria->compare('category',$this->keyword,true,'OR');
			$criteria->compare('message','='.$this->keyword,true,'OR');
		}

		return new CActiveDataProvider($this->with('source'), array(
			'criteria'=>$criteria,
			'sort'=>array(
				'class'=>'CSort',//指定排序类
					'attributes'=>array(
						'source.category',
						'source.message',
						'language',
						'translation',
					),
					//'multiSort'=>true,//连续排序
// 					'defaultOrder'=>array(//指定默认排序的属性
// 						'date_added'=>CSort::SORT_DESC,//降序排列
// 					)
			),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Message the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
