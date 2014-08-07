<?php

/**
 * This is the model class for table "antecedentes_medicos".
 *
 * The followings are the available columns in table 'antecedentes_medicos':
 * @property integer $id
 * @property string $rut_paciente
 * @property double $estatura
 * @property double $peso
 * @property string $alergias
 * @property string $antecedentes_personales
 * @property string $antecedentes_familiares
 * @property string $habitos_toxicos
 * @property string $examen_fisico
 * @property string $acotaciones
 *
 * The followings are the available model relations:
 * @property Pacientes $rutPaciente
 */
class AntecedentesMedicos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'antecedentes_medicos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rut_paciente, estatura, peso', 'required'),
			array('estatura, peso', 'numerical'),
			array('rut_paciente', 'length', 'max'=>12),
			array('alergias, habitos_toxicos', 'length', 'max'=>500),
			array('antecedentes_personales, antecedentes_familiares, examen_fisico', 'length', 'max'=>500),
			array('acotaciones', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, rut_paciente, estatura, peso, alergias, antecedentes_personales, antecedentes_familiares, habitos_toxicos, examen_fisico, acotaciones', 'safe', 'on'=>'search'),
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
			'rutPaciente' => array(self::BELONGS_TO, 'Pacientes', 'rut_paciente'),
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
			'estatura' => 'Estatura',
			'peso' => 'Peso',
			'alergias' => 'Alergias',
			'antecedentes_personales' => 'Antecedentes Personales',
			'antecedentes_familiares' => 'Antecedentes Familiares',
			'habitos_toxicos' => 'Habitos Toxicos',
			'examen_fisico' => 'Examen Fisico',
			'acotaciones' => 'Acotaciones',
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
		$criteria->compare('estatura',$this->estatura);
		$criteria->compare('peso',$this->peso);
		$criteria->compare('alergias',$this->alergias,true);
		$criteria->compare('antecedentes_personales',$this->antecedentes_personales,true);
		$criteria->compare('antecedentes_familiares',$this->antecedentes_familiares,true);
		$criteria->compare('habitos_toxicos',$this->habitos_toxicos,true);
		$criteria->compare('examen_fisico',$this->examen_fisico,true);
		$criteria->compare('acotaciones',$this->acotaciones,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AntecedentesMedicos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
