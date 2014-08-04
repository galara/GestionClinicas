<?php

/**
 * This is the model class for table "ciudades".
 *
 * The followings are the available columns in table 'ciudades':
 * @property integer $id
 * @property string $ciudad
 * @property integer $id_comuna
 *
 * The followings are the available model relations:
 * @property Comunas $idComuna
 * @property Pacientes[] $pacientes
 * @property Profesionales[] $profesionales
 * @property Usuarios[] $usuarioses
 */
class Ciudades extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ciudades';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ciudad, id_comuna', 'required'),
			array('id_comuna', 'numerical', 'integerOnly'=>true),
			array('ciudad', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, ciudad, id_comuna', 'safe', 'on'=>'search'),
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
			'idComuna' => array(self::BELONGS_TO, 'Comunas', 'id_comuna'),
			'pacientes' => array(self::HAS_MANY, 'Pacientes', 'id_ciudad'),
			'profesionales' => array(self::HAS_MANY, 'Profesionales', 'id_ciudad'),
			'usuarioses' => array(self::HAS_MANY, 'Usuarios', 'id_ciudad'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'ciudad' => 'Ciudad',
			'id_comuna' => 'Id Comuna',
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
		$criteria->compare('ciudad',$this->ciudad,true);
		$criteria->compare('id_comuna',$this->id_comuna);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ciudades the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
