<?php

/**
 * This is the model class for table "Regiones".
 *
 * The followings are the available columns in table 'Regiones':
 * @property integer $id
 * @property string $region
 */
class Regiones extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'Regiones';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id', 'numerical', 'integerOnly' => true),
            array('id', 'length', 'max' => 2),
            array('region', 'length', 'max' => 45),
            array('id', 'idExiste'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, region', 'safe', 'on' => 'search'),
            array('region, id', 'required',
                'message' => 'El campo {attribute} es requerido. ')
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'provinciases' => array(self::HAS_MANY, 'Provincias', 'id_region'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'region' => 'Region',
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
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);

        $criteria->compare('region', $this->region, true);

        return new CActiveDataProvider('Regiones', array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * @return Regiones the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function idExiste($attribute, $params){
        
        $id = Regiones::model()->findByPk($this->id);

        if (!is_null($id) && $this->isNewRecord) {            
            $this->addError($attribute, 'El id ingresado ya se encuentra registrado.');
        }
        
    }
    
}
