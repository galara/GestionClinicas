<?php

/**
 * This is the model class for table "profesionales".
 *
 * The followings are the available columns in table 'profesionales':
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
 * @property string $fecha_nacimiento
 * @property string $pass
 * @property integer $id_especialidad_medica
 * @property string $registro
 *
 * The followings are the available model relations:
 * @property Atenciones[] $atenciones
 * @property Citas[] $citases
 * @property ProcedimientosMedicos[] $procedimientosMedicoses
 * @property ProcedimientosPacientes[] $procedimientosPacientes
 * @property Ciudades $idCiudad
 * @property EspecialidadesMedicas $idEspecialidadMedica
 * @property Prevision $idSexo
 */
class Profesionales extends CActiveRecord {

    public $pass_repeat;
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'profesionales';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('rut, nombre_1, apellido_paterno, apellido_materno, celular, id_sexo, id_ciudad, direccion, id_especialidad_medica, pass', 'required',
                'message' => 'El campo {attribute} es obligatorio.'),
            array('id_sexo, id_ciudad, id_especialidad_medica', 'numerical', 'integerOnly' => true),
            array('rut, celular', 'length', 'max' => 12),
            array('pass', 'length', 'min' => 6, 'message' => 'La contraseña es muy corta (mínimo 6 caracteres).'),
            array('nombre_1, nombre_2, apellido_paterno, apellido_materno, email, pass', 'length', 'max' => 45),
            array('celular, telefono', 'numerical', 'integerOnly' => true, 'message' => 'El campo {attribute} debe ser numérico.'),
            array('telefono', 'length', 'max' => 10),
            array('direccion', 'length', 'max' => 150),
            array('pass_repeat', 'required', 'on' => 'insert', 'message' => 'Debe confirmar su contraseña'),
            array('pass', 'compare', 'compareAttribute' => 'pass_repeat', 'message' => 'Debe confirmar la contraseña antes de guardar.'),
            array('rut', 'validateRut'),
            array('fecha_nacimiento, registro, foto', 'safe'),
            array('email', 'email', 'message' => 'El {attribute} ingresado no es válido.'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('rut, nombre_1, nombre_2, apellido_paterno, apellido_materno, celular, telefono, id_sexo, id_ciudad, direccion, email, fecha_nacimiento, pass, id_especialidad_medica, registro', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'atenciones' => array(self::HAS_MANY, 'Atenciones', 'rut_profesional'),
            'citases' => array(self::HAS_MANY, 'Citas', 'rut_profesional'),
            'procedimientosMedicoses' => array(self::HAS_MANY, 'ProcedimientosMedicos', 'rut_profesional'),
            'procedimientosPacientes' => array(self::HAS_MANY, 'ProcedimientosPacientes', 'rut_profesional'),
            'fkCiudad' => array(self::BELONGS_TO, 'Ciudades', 'id_ciudad'),
            'fkEspecialidadMedica' => array(self::BELONGS_TO, 'EspecialidadesMedicas', 'id_especialidad_medica'),
            'fkSexo' => array(self::BELONGS_TO, 'Prevision', 'id_sexo'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'rut' => 'Rut',
            'nombre_1' => 'Primer Nombre',
            'nombre_2' => 'Segundo Nombre',
            'apellido_paterno' => 'Apellido Paterno',
            'apellido_materno' => 'Apellido Materno',
            'celular' => 'Celular',
            'telefono' => 'Telefono',
            'id_sexo' => 'Sexo',
            'id_ciudad' => 'Ciudad',
            'direccion' => 'Dirección',
            'email' => 'Correo electrónico',
            'fecha_nacimiento' => 'Fecha de Nacimiento',
            'pass' => 'Pass',
            'id_especialidad_medica' => 'Especialidad Medica',
            'registro' => 'Registro',
            'pass_repeat' => 'Confirmar Contraseña'
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('rut', $this->rut, true);
        $criteria->compare('nombre_1', $this->nombre_1, true);
        $criteria->compare('nombre_2', $this->nombre_2, true);
        $criteria->compare('apellido_paterno', $this->apellido_paterno, true);
        $criteria->compare('apellido_materno', $this->apellido_materno, true);
        $criteria->compare('celular', $this->celular, true);
        $criteria->compare('telefono', $this->telefono, true);
        $criteria->compare('id_sexo', $this->id_sexo);
        $criteria->compare('id_ciudad', $this->id_ciudad);
        $criteria->compare('direccion', $this->direccion, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('fecha_nacimiento', $this->fecha_nacimiento, true);
        $criteria->compare('pass', $this->pass, true);
        $criteria->compare('id_especialidad_medica', $this->id_especialidad_medica);
        $criteria->compare('registro', $this->registro, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Profesionales the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    //funcion para validar el rut
    public function validateRut($attribute, $params) {
        $data = explode('-', $this->rut);
        $evaluate = strrev($data[0]);
        $multiply = 2;
        $store = 0;
        for ($i = 0; $i < strlen($evaluate); $i++) {
            $store += $evaluate[$i] * $multiply;
            $multiply++;
            if ($multiply > 7)
                $multiply = 2;
        }
        isset($data[1]) ? $verifyCode = strtolower($data[1]) : $verifyCode = '';
        $result = 11 - ($store % 11);
        if ($result == 10) {
            $result = 'k';
        }
        if ($result == 11) {
            $result = 0;
        }
        if ($verifyCode != $result) {
            $this->addError('rut', 'El rut ingresado no es válido.');
        }

        $rut = Profesionales::model()->findByPk($this->rut);

        if (!is_null($rut) && $this->isNewRecord) {
            $this->addError($attribute, 'El rut ingresado ya se encuentra registrado.');
        }
        
    }
    
    

}
