<?php

class CategoriasDiagnosticosController extends Controller {

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
                'actions' => array('index', 'ver', 'eliminar', 'editar', 'nuevo'),
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
        $model = new CategoriasDiagnosticos;

        $this->performAjaxValidation($model);

        if (isset($_POST['CategoriasDiagnosticos'])) {
            $model->attributes = $_POST['CategoriasDiagnosticos'];
            if ($model->save()) {
                $this->mensaje = 'La categoría ' . $model->categoria . ' se ha agregado exitosamente';
                $this->forward('index');
            }
        }

        $this->render('nueva', array(
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

        if (isset($_POST['CategoriasDiagnosticos'])) {
            $model->attributes = $_POST['CategoriasDiagnosticos'];
            if ($model->save()) {
                $this->mensaje = 'La categoría ' . $model->categoria . ' se ha editado exitosamente.';
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
        $affected = CategoriasDiagnosticos::model()->deleteByPk($id);

        if ($affected > 0) {
            $this->mensaje = 'La categoría ha sido eliminado exitosamente';
            $this->forward('index');
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $criteria = new CDbCriteria();

        if (isset($_POST['palabraClave'])) {
            $q = $_POST['palabraClave'];
            $criteria->compare('id', $q, true, 'OR');
            $criteria->compare('categoria', $q, true, 'OR');
        }

        $count = CategoriasDiagnosticos::model()->count($criteria);
        $pages = new CPagination($count);

        $pages->pageSize = 5;
        $pages->applyLimit($criteria);

        $model = CategoriasDiagnosticos::model()->findAll($criteria);

        $this->render('index', array('model' => $model,
            'pages' => $pages,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new CategoriasDiagnosticos('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['CategoriasDiagnosticos']))
            $model->attributes = $_GET['CategoriasDiagnosticos'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return CategoriasDiagnosticos the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = CategoriasDiagnosticos::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CategoriasDiagnosticos $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'categorias-diagnosticos-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
