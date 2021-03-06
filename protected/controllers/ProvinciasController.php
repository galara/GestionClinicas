<?php

class ProvinciasController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $mensaje;
    public $selectedItem = 'mantenedores';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('ver', 'editar', 'nueva'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('eliminar'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * @param integer $id the ID of the model to be displayed
     */
    public function actionVer($id) {
        $this->render('ver', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionNueva() {
        $model = new Provincias;

        $this->performAjaxValidation($model);

        if (isset($_POST['Provincias'])) {
            $model->attributes = $_POST['Provincias'];
            if ($model->save()) {
                $this->mensaje = 'La provincia ' . $model->Provincia . ' Ha sido creada.';
                $this->forward('index');
            }
        }

        $this->render('nueva', array(
            'model' => $model,
        ));
    }

    /**
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionEditar($id) {
        $model = $this->loadModel($id);

        $this->performAjaxValidation($model);

        if (isset($_POST['Provincias'])) {
            $model->attributes = $_POST['Provincias'];
            if ($model->save()){
                $this->mensaje = 'La provincia ' . $model->Provincia . ' Ha sido modificada.';
                $this->forward('index');
            }
        }

        $this->render('editar', array(
            'model' => $model,
        ));
    }

    /**
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionEliminar($id) {
        
        $affected = Provincias::model()->deleteByPk($id);

        if ($affected > 0) {
            $this->mensaje = 'La provincia ha sido eliminado exitosamente';
            $this->forward('index');
        }
        
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        
        $criteria = new CDbCriteria();
        
        if (isset($_POST['idRegion'])){
            $q = $_POST['idRegion'];
            $criteria->compare('id_region', $q, true, 'OR');
        }
        
        if (isset($_POST['palabraClave'])) {
            $q = $_POST['palabraClave'];
            $criteria->compare('id', $q, true, 'OR');
            $criteria->compare('Provincia', $q, true, 'OR');
        }
        
        $count = Provincias::model()->count($criteria);
        $pages = new CPagination($count);
        
        $pages->pageSize = 5;
        $pages->applyLimit($criteria);

        $provincias = Provincias::model()->findAll($criteria);

        $this->render('index', array('provincias' => $provincias,
            'pages' => $pages,
        ));
        
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Provincias the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Provincias::model()->findByPk($id);
        
        if ($model === null){
            throw new CHttpException(404, 'La página solicitada no existe.');
        }
        
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Provincias $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'provincias-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
