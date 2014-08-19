<?php

class DiagnosticosController extends Controller {

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
                'actions' => array('index', 'ver', 'editar', 'nuevo', 'eliminar'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
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
    public function actionNuevo() {
        $model = new Diagnosticos;

        $this->performAjaxValidation($model);

        if (isset($_POST['Diagnosticos'])) {
            $model->attributes = $_POST['Diagnosticos'];
            if ($model->save()) {
                $this->mensaje = 'El diagnóstico ' .$model->diagnostico . ' ha sido agregado exitosamente.';
                $this->forward('index');
            }
        }

        $this->render('nuevo', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionEditar($id) {
        $model = $this->loadModel($id);

        $this->performAjaxValidation($model);

        if (isset($_POST['Diagnosticos'])) {
            $model->attributes = $_POST['Diagnosticos'];
            if ($model->save()) {
                $this->mensaje = 'El diagnóstico ' .$model->diagnostico . ' Ha sido editado exitosamente.';
                $this->forward('index');
            }
        }

        $this->render('editar', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionEliminar($id) {
        $affected = Diagnosticos::model()->deleteByPk($id);

        if ($affected > 0) {
            $this->mensaje = 'El diagnóstico ha sido eliminado exitosamente';
            $this->forward('index');
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        
        $criteria = new CDbCriteria();
        
        if (isset($_POST['idCategoria'])){
            $q = $_POST['idCategoria'];
            $criteria->compare('id_categoria', $q, true, 'OR');
        }
        
        if (isset($_POST['palabraClave'])) {
            $q = $_POST['palabraClave'];
            $criteria->compare('id', $q, true, 'OR');
            $criteria->compare('diagnostico', $q, true, 'OR');
        }
        
        $count = Diagnosticos::model()->count($criteria);
        $pages = new CPagination($count);
        
        $pages->pageSize = 5;
        $pages->applyLimit($criteria);

        $model = Diagnosticos::model()->findAll($criteria);

        $this->render('index', array('model' => $model,
            'pages' => $pages,
        ));
        
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Diagnosticos('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Diagnosticos'])){
            $model->attributes = $_GET['Diagnosticos'];
        }
        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Diagnosticos the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Diagnosticos::model()->findByPk($id);
        if ($model === null){
            throw new CHttpException(404, 'La página solicitada no existe.');
        }
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Diagnosticos $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'diagnosticos-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
