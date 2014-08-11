<?php

/**
 * This is the model class for table "outside_services".
 *
 * The followings are the available columns in table 'outside_services':
 * @property integer $id
 * @property string $institution
 * @property integer $year_from
 * @property integer $year_to
 * @property string $designation
 * @property string $duration
 * @property integer $member_id
 *
 * The followings are the available model relations:
 * @property Members $member
 */
class OutsideServices extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'outside_services';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('member_id', 'required'),
			array('year_from, year_to, member_id', 'numerical', 'integerOnly'=>true),
			array('institution', 'length', 'max'=>100),
			array('designation', 'length', 'max'=>75),
			array('duration', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, institution, year_from, year_to, designation, duration, member_id', 'safe', 'on'=>'search'),
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
			'member' => array(self::BELONGS_TO, 'Members', 'member_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'institution' => 'Institution',
			'year_from' => 'Year From',
			'year_to' => 'Year To',
			'designation' => 'Designation',
			'duration' => 'Duration',
			'member_id' => 'Member',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('institution',$this->institution,true);
		$criteria->compare('year_from',$this->year_from);
		$criteria->compare('year_to',$this->year_to);
		$criteria->compare('designation',$this->designation,true);
		$criteria->compare('duration',$this->duration,true);
		$criteria->compare('member_id',$this->member_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OutsideServices the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
