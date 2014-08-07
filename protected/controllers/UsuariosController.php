<?php

class UsuariosController extends Controller {

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
                'actions' => array('index', 'detalles', 'crear', 'editar'),
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
        $model = new Usuarios;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Usuarios'])) {
            $model->attributes = $_POST['Usuarios'];
            if ($model->save()){
                $this->mensaje = 'El usuario ' . $model->rut . ' ha sido registrado en el sistema.';
                $this->forward('index');
            }
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

        if (isset($_POST['Usuarios'])) {
            $model->attributes = $_POST['Usuarios'];
            if ($model->save()){
                $this->mensaje = 'Los datos del usuario ' . $model->rut . ' han sido editados.';
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
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $criteria = new CDbCriteria();
        $count = Profesionales::model()->count($criteria);
        $pages = new CPagination($count);

        if (isset($_GET['palabraClave'])) {
            $q = $_GET['palabraClave'];
            $criteria->compare('nombre_1', $q, true, 'OR');
            $criteria->compare('apellido_paterno', $q, true, 'OR');
            $criteria->compare('rut', $q, true, 'OR');
        }

        // results per page
        $pages->pageSize = 5;
        $pages->applyLimit($criteria);

        $usuarios = Usuarios::model()->findAll($criteria);

        $this->render('index', array('usuarios' => $usuarios,
            'pages' => $pages,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Usuarios('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Usuarios']))
            $model->attributes = $_GET['Usuarios'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Usuarios the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Usuarios::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Usuarios $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'usuarios-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
