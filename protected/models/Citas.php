<?php

/**
 * This is the model class for table "citas".
 *
 * The followings are the available columns in table 'citas':
 * @property integer $id
 * @property string $hora_inicio
 * @property string $hora_termino
 * @property string $rut_profesional
 * @property string $rut_paciente
 * @property string $motivo
 * @property string $descripcion
 * @property integer $id_estado_cita
 * @property integer $id_tipo_cita
 * @property string $registro
 *
 * The followings are the available model relations:
 * @property Profesionales $rutProfesional
 * @property Pacientes $rutPaciente
 * @property EstadosCitas $idEstadoCita
 * @property TipoCita $idTipoCita
 */
class Citas extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'citas';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('hora_inicio, hora_termino, rut_profesional, rut_paciente, id_estado_cita, id_tipo_cita', 'required', 
                'message' => 'El campo {attribute} es obligatorio.'),
            array('id_estado_cita, id_tipo_cita', 'numerical', 'integerOnly' => true),
            array('rut_profesional, rut_paciente', 'length', 'max' => 10),
            array('motivo', 'length', 'max' => 150),
            array('descripcion', 'length', 'max' => 500),
            array('registro', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, hora_inicio, hora_termino, rut_profesional, rut_paciente, motivo, descripcion, id_estado_cita, id_tipo_cita, registro', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'fkProfesional' => array(self::BELONGS_TO, 'Profesionales', 'rut_profesional'),
            'fkPaciente' => array(self::BELONGS_TO, 'Pacientes', 'rut_paciente'),
            'fkEstadoCita' => array(self::BELONGS_TO, 'EstadosCitas', 'id_estado_cita'),
            'fkTipoCita' => array(self::BELONGS_TO, 'TipoCita', 'id_tipo_cita'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'hora_inicio' => 'Hora de Inicio',
            'hora_termino' => 'Hora de Término',
            'rut_profesional' => 'Rut Profesional',
            'rut_paciente' => 'Rut Paciente',
            'motivo' => 'Motivo',
            'descripcion' => 'Descripción',
            'id_estado_cita' => 'Estado Cita',
            'id_tipo_cita' => 'Tipo de Cita',
            'registro' => 'Registro',
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

        $criteria->compare('id', $this->id);
        $criteria->compare('hora_inicio', $this->hora_inicio, true);
        $criteria->compare('hora_termino', $this->hora_termino, true);
        $criteria->compare('rut_profesional', $this->rut_profesional, true);
        $criteria->compare('rut_paciente', $this->rut_paciente, true);
        $criteria->compare('motivo', $this->motivo, true);
        $criteria->compare('descripcion', $this->descripcion, true);
        $criteria->compare('id_estado_cita', $this->id_estado_cita);
        $criteria->compare('id_tipo_cita', $this->id_tipo_cita);
        $criteria->compare('registro', $this->registro, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Citas the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
