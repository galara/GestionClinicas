<?php

/**
 * This is the model class for table "comunas".
 *
 * The followings are the available columns in table 'comunas':
 * @property integer $id
 * @property string $comuna
 * @property integer $id_provincia
 *
 * The followings are the available model relations:
 * @property Ciudades[] $ciudades
 * @property Provincias $idProvincia
 */
class Comunas extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'comunas';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('comuna, id_provincia', 'required', 'message' => 'El campo {attribute} es obligatorio.'),
            array('id_provincia', 'numerical', 'integerOnly' => true),
            array('comuna', 'nombreExiste'),
            array('comuna', 'length', 'max' => 45),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, comuna, id_provincia', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'ciudades' => array(self::HAS_MANY, 'Ciudades', 'id_comuna'),
            'fkProvincia' => array(self::BELONGS_TO, 'Provincias', 'id_provincia'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'comuna' => 'Comuna',
            'id_provincia' => 'Provincia',
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
        $criteria->compare('comuna', $this->comuna, true);
        $criteria->compare('id_provincia', $this->id_provincia);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Comunas the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function nombreExiste($attribute, $params) {

        $model = Comunas::model()->findByAttributes(array('comuna' => $this->comuna, 'id_provincia' => $this->id_provincia));

        if (!is_null($model)) {
            $this->addError($attribute, 'La comuna que intenta crear ya se encuentra registrada');
        }
    }

}
