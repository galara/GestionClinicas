<?php

/**
 * This is the model class for table "atenciones".
 *
 * The followings are the available columns in table 'atenciones':
 * @property integer $id
 * @property string $rut_paciente
 * @property string $rut_profesional
 * @property string $sintomas
 * @property integer $id_diagnostico
 * @property string $tratamiento
 * @property string $observaciones
 * @property string $fecha
 *
 * The followings are the available model relations:
 * @property Diagnosticos $idDiagnostico
 * @property Pacientes $rutPaciente
 * @property Profesionales $rutProfesional
 */
class Atenciones extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'atenciones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rut_paciente, rut_profesional, sintomas, id_diagnostico, fecha', 'required'),
			array('id_diagnostico', 'numerical', 'integerOnly'=>true),
			array('rut_paciente, rut_profesional', 'length', 'max'=>12),
			array('sintomas', 'length', 'max'=>1000),
			array('tratamiento, observaciones', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, rut_paciente, rut_profesional, sintomas, id_diagnostico, tratamiento, observaciones, fecha', 'safe', 'on'=>'search'),
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
			'fkDiagnostico' => array(self::BELONGS_TO, 'Diagnosticos', 'id_diagnostico'),
			'fkPaciente' => array(self::BELONGS_TO, 'Pacientes', 'rut_paciente'),
			'fkProfesional' => array(self::BELONGS_TO, 'Profesionales', 'rut_profesional'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'rut_paciente' => 'Rut Paciente',
			'rut_profesional' => 'Rut Profesional',
			'sintomas' => 'Sintomas',
			'id_diagnostico' => 'Id Diagnostico',
			'tratamiento' => 'Tratamiento',
			'observaciones' => 'Observaciones',
			'fecha' => 'Fecha',
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
		$criteria->compare('rut_paciente',$this->rut_paciente,true);
		$criteria->compare('rut_profesional',$this->rut_profesional,true);
		$criteria->compare('sintomas',$this->sintomas,true);
		$criteria->compare('id_diagnostico',$this->id_diagnostico);
		$criteria->compare('tratamiento',$this->tratamiento,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('fecha',$this->fecha,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Atenciones the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
