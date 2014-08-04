<?php

/**
 * This is the model class for table "pacientes".
 *
 * The followings are the available columns in table 'pacientes':
 * @property string $rut
 * @property string $nombre_1
 * @property string $nombre_2
 * @property string $apellido_paterno
 * @property string $apellido_materno
 * @property string $celular
 * @property string $telefono
 * @property integer $id_sexo
 * @property integer $id_ciudad
 * @property string $direccion
 * @property string $email
 * @property string $celular_contacto
 * @property string $fecha_nacimiento
 * @property integer $id_estadocivil
 * @property integer $id_prevision
 * @property double $estatura
 * @property double $peso
 * @property string $registro
 * @property string $foto
 *
 * The followings are the available model relations:
 * @property AntecedentesMedicos[] $antecedentesMedicoses
 * @property Atenciones[] $atenciones
 * @property Citas[] $citases
 * @property Ciudades $idCiudad
 * @property EstadoCivil $idEstadocivil
 * @property Prevision $idPrevision
 * @property Sexo $idSexo
 * @property ProcedimientosMedicos[] $procedimientosMedicoses
 * @property ProcedimientosPacientes[] $procedimientosPacientes
 */
class Pacientes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pacientes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rut, nombre_1, apellido_paterno, apellido_materno, celular, id_sexo, id_ciudad, fecha_nacimiento, id_estadocivil, id_prevision', 'required'),
			array('id_sexo, id_ciudad, id_estadocivil, id_prevision', 'numerical', 'integerOnly'=>true),
			array('estatura, peso', 'numerical'),
			array('rut', 'length', 'max'=>12),
			array('nombre_1, nombre_2, apellido_paterno, apellido_materno, email', 'length', 'max'=>45),
			array('celular, celular_contacto', 'length', 'max'=>13),
			array('telefono', 'length', 'max'=>10),
			array('direccion', 'length', 'max'=>80),
			array('registro, foto', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('rut, nombre_1, nombre_2, apellido_paterno, apellido_materno, celular, telefono, id_sexo, id_ciudad, direccion, email, celular_contacto, fecha_nacimiento, id_estadocivil, id_prevision, estatura, peso, registro, foto', 'safe', 'on'=>'search'),
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
			'antecedentesMedicoses' => array(self::HAS_MANY, 'AntecedentesMedicos', 'rut_paciente'),
			'atenciones' => array(self::HAS_MANY, 'Atenciones', 'rut_paciente'),
			'citases' => array(self::HAS_MANY, 'Citas', 'rut_paciente'),
			'fkCiudad' => array(self::BELONGS_TO, 'Ciudades', 'id_ciudad'),
			'fkEstadoCivil' => array(self::BELONGS_TO, 'EstadoCivil', 'id_estadocivil'),
			'fkPrevision' => array(self::BELONGS_TO, 'Prevision', 'id_prevision'),
			'fkSexo' => array(self::BELONGS_TO, 'Sexo', 'id_sexo'),
			'procedimientosMedicoses' => array(self::HAS_MANY, 'ProcedimientosMedicos', 'rut_paciente'),
			'procedimientosPacientes' => array(self::HAS_MANY, 'ProcedimientosPacientes', 'rut_paciente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'rut' => 'Rut',
			'nombre_1' => 'Nombre 1',
			'nombre_2' => 'Nombre 2',
			'apellido_paterno' => 'Apellido Paterno',
			'apellido_materno' => 'Apellido Materno',
			'celular' => 'Celular',
			'telefono' => 'Telefono',
			'id_sexo' => 'Id Sexo',
			'id_ciudad' => 'Id Ciudad',
			'direccion' => 'Direccion',
			'email' => 'Email',
			'celular_contacto' => 'Celular Contacto',
			'fecha_nacimiento' => 'Fecha Nacimiento',
			'id_estadocivil' => 'Id Estadocivil',
			'id_prevision' => 'Id Prevision',
			'estatura' => 'Estatura',
			'peso' => 'Peso',
			'registro' => 'Registro',
			'foto' => 'Foto',
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

		$criteria->compare('rut',$this->rut,true);
		$criteria->compare('nombre_1',$this->nombre_1,true);
		$criteria->compare('nombre_2',$this->nombre_2,true);
		$criteria->compare('apellido_paterno',$this->apellido_paterno,true);
		$criteria->compare('apellido_materno',$this->apellido_materno,true);
		$criteria->compare('celular',$this->celular,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('id_sexo',$this->id_sexo);
		$criteria->compare('id_ciudad',$this->id_ciudad);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('celular_contacto',$this->celular_contacto,true);
		$criteria->compare('fecha_nacimiento',$this->fecha_nacimiento,true);
		$criteria->compare('id_estadocivil',$this->id_estadocivil);
		$criteria->compare('id_prevision',$this->id_prevision);
		$criteria->compare('estatura',$this->estatura);
		$criteria->compare('peso',$this->peso);
		$criteria->compare('registro',$this->registro,true);
		$criteria->compare('foto',$this->foto,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pacientes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
