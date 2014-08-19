<?php

/**
 * This is the model class for table "provincias".
 *
 * The followings are the available columns in table 'provincias':
 * @property integer $id
 * @property string $Provincia
 * @property integer $id_region
 *
 * The followings are the available model relations:
 * @property Comunas[] $comunases
 * @property Regiones $idRegion
 */
class Provincias extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'provincias';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id, Provincia, id_region', 'required', 'message' => 'El campo {attribute} es obligatorio.'),
            array('id, id_region', 'numerical', 'integerOnly' => true),
            array('Provincia', 'length', 'max' => 45),
            array('Provincia', 'nombreExiste'),
            array('id', 'length', 'max' => 3),
            array('id', 'idExiste'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, Provincia, id_region', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'comunases' => array(self::HAS_MANY, 'Comunas', 'id_provincia'),
            'fkRegion' => array(self::BELONGS_TO, 'Regiones', 'id_region'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'Provincia' => 'Provincia',
            'id_region' => 'Región',
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
        $criteria->compare('Provincia', $this->Provincia, true);
        $criteria->compare('id_region', $this->id_region);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Provincias the static model class
     */
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function idExiste($attribute, $params) {

        $id = Provincias::model()->findByPk($this->id);

        if (!is_null($id) && $this->isNewRecord) {
            $this->addError($attribute, 'El id ingresado ya se encuentra registrado.');
        }
    }

    public function nombreExiste($attribute, $params) {

        $provincia = Provincias::model()->findByAttributes(array('Provincia' => $this->Provincia, 'id_region' => $this->id_region));

        if (!is_null($provincia)) {
            $this->addError($attribute, 'La provincia que intenta crear ya se encuentra registrada');
        }
    }

}
