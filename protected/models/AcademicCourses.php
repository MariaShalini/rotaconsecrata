<?php

/**
 * This is the model class for table "academic_courses".
 *
 * The followings are the available columns in table 'academic_courses':
 * @property integer $id
 * @property string $name
 * @property string $institution
 * @property string $board
 * @property string $class
 * @property string $certificate_dt
 * @property string $subjects
 * @property string $medium
 * @property string $remarks
 * @property integer $member_id
 *
 * The followings are the available model relations:
 * @property Members $member
 */
class AcademicCourses extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'academic_courses';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('member_id, course_id', 'required'),
			array('member_id, course_id', 'numerical', 'integerOnly'=>true),
			array('name, subjects, medium', 'length', 'max'=>100),
			array('institution, remarks', 'length', 'max'=>150),
			array('board', 'length', 'max'=>60),
			array('class', 'length', 'max'=>10),
			array('certificate_dt', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, institution, board, class, certificate_dt, subjects, medium, remarks, member_id', 'safe', 'on'=>'search'),
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
			'course' => array(self::BELONGS_TO, 'AcademicCourseNames', 'course_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'institution' => 'Institution',
			'board' => 'Board',
			'class' => 'Class',
			'certificate_dt' => 'Certificate Date',
			'subjects' => 'Subjects',
			'medium' => 'Medium',
			'remarks' => 'Remarks',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('institution',$this->institution,true);
		$criteria->compare('board',$this->board,true);
		$criteria->compare('class',$this->class,true);
		$criteria->compare('certificate_dt',$this->certificate_dt,true);
		$criteria->compare('subjects',$this->subjects,true);
		$criteria->compare('medium',$this->medium,true);
		$criteria->compare('remarks',$this->remarks,true);
		$criteria->compare('member_id',$this->member_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AcademicCourses the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

        protected function beforeSave()
        {
            if(parent::beforeSave())
            {
                // Format dates based on the locale
                foreach($this->metadata->tableSchema->columns as $columnName => $column)
                {
                    if ($column->dbType == 'date' and isset($this->$columnName) and $this->$columnName)
                    {
			    $this->$columnName = FormatHelper::dateConvDB(
			    	$this->$columnName, Yii::app()->locale->getDateFormat('short'));
		    }
		}
		return true;
	    } else return false;
	}

        protected function afterFind()
        {
            // Format dates based on the locale
            foreach($this->metadata->tableSchema->columns as $columnName => $column)
            { 
                if (!strlen($this->$columnName)) continue;

                if ($column->dbType == 'date')
                { 
                        $this->$columnName = FormatHelper::dateConvView(
                                $this->$columnName,
                                Yii::app()->locale->getDateFormat('short')
                        );
                }
            }
            return parent::afterFind();
        }
	public static function getDegrees() {
		$deg_list = array();
		$education = AcademicCourses::model()->findAll();
		$degs = array();
		foreach($education as $edu) {
			$deg = $edu->name;
			if (!isset($degs[$deg])) {
				$degs[$deg] = 1;
				array_push($deg_list, $deg);
			}
		}
		return $deg_list;
	}
}
