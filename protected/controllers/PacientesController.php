<?php

class PacientesController extends Controller {

    public $mensaje;

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
                //'postOnly + delete', // we only allow deletion via POST request
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
                'actions' => array('index', 'detalles', 'crear', 'editar', 'admin', 'eliminar', 'buscar'),
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
    public function actionDetalles($id) {
        $this->render('detalles', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCrear() {
        $model = new Pacientes;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['Pacientes'])) {
            $model->attributes = $_POST['Pacientes'];
            if ($model->save())
                $this->redirect(array('detalles', 'id' => $model->rut));
        }

        $this->render('crear', array(
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

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Pacientes'])) {
            $model->attributes = $_POST['Pacientes'];
            $this->mensaje = 'El paciente rut ' . $model->rut . ' ha sido editado correctamente';
            if ($model->save())
            //$this->redirect(array('index', 'id' => $model->rut));
                $this->forward('index');
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
        
        $affected = Pacientes::model()->deleteByPk($id);

        if ($affected > 0) {
            $this->mensaje = 'El paciente ha sido eliminado exitosamente';
            $this->forward('index');
        }
        
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {

        $criteria = new CDbCriteria();
        $count = Pacientes::model()->count($criteria);
        $pages = new CPagination($count);

        // results per page
        $pages->pageSize = 5;
        $pages->applyLimit($criteria);

        $pacientes = Pacientes::model()->findAll($criteria);

        $this->render('index', array('pacientes' => $pacientes,
            'pages' => $pages,
        ));
    }

    public function actionBuscar() {

        $criteria = new CDbCriteria();

        if (isset($_GET['palabraClave'])) {
            $q = $_GET['palabraClave'];
            $criteria->compare('nombre_1', $q, true, 'OR');
            $criteria->compare('apellido_paterno', $q, true, 'OR');
            $criteria->compare('rut', $q, true, 'OR');
        }

        $count = Pacientes::model()->count($criteria);
        $pages = new CPagination($count);

        // results per page
        $pages->pageSize = 5;
        $pages->applyLimit($criteria);

        $pacientes = Pacientes::model()->findAll($criteria);

        $this->render('index', array('pacientes' => $pacientes,
            'pages' => $pages,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Pacientes('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Pacientes']))
            $model->attributes = $_GET['Pacientes'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Pacientes the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Pacientes::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Pacientes $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'pacientes-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
