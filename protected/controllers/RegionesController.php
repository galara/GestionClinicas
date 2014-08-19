<?php

class RegionesController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @var CActiveRecord the currently loaded data model instance.
     */
    private $_model;
    public $mensaje;

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
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
                'actions' => array('view', 'search', 'create', 'editar'),
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
     * Displays a particular model.
     */
    public function actionView() {
        $this->render('view', array(
            'model' => $this->loadModel(),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Regiones;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['Regiones'])) {
            $model->attributes = $_POST['Regiones'];
            if ($model->save()) {
                $this->mensaje = 'La región ' . $model->region . ' ha sido creada exitosamente';
                //$this->redirect(array('view', 'id' => $model->id), array('created' => true));
                $this->forward('index');
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     */
    public function actionEditar() {
        $model = $this->loadModel();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Regiones'])) {
            $model->attributes = $_POST['Regiones'];
            if ($model->save()){
                $this->mensaje = 'Los datos han sido modificados';
                //$this->redirect(array('view', 'id' => $model->id));
                $this->forward('index');
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     */
    public function actionEliminar($id) {

        $affected = Regiones::model()->deleteByPk($id);

        if ($affected > 0) {
            $this->mensaje = 'El elemento ha sido eliminado exitosamente';
            $this->forward('index');
        }
    }

    /**
     * Busca el listado de elementos que concuerden con los criterios
     */
    public function actionSearch() {

        $criteria = new CDbCriteria();

        if (isset($_GET['palabraClave'])) {
            $q = $_GET['palabraClave'];
            $criteria->compare('region', $q, true, 'OR');
            $criteria->compare('id', $q, true, 'OR');
        }

        $count = Regiones::model()->count($criteria);
        $pages = new CPagination($count);

        // results per page
        $pages->pageSize = 5;
        $pages->applyLimit($criteria);

        $regiones = Regiones::model()->findAll($criteria);

        $this->render('index', array('regiones' => $regiones,
            'pages' => $pages));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
     
        $criteria = new CDbCriteria();
        $count = Regiones::model()->count($criteria);
        $pages = new CPagination($count);

        // results per page
        $pages->pageSize = 5;
        $pages->applyLimit($criteria);

        $regiones = Regiones::model()->findAll($criteria);
        
        $this->render('index', array('regiones' => $regiones,
            'pages' => $pages,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     */
    public function loadModel() {
        if ($this->_model === null) {
            if (isset($_GET['id'])){
                $this->_model = Regiones::model()->findbyPk($_GET['id']);
            }
            if ($this->_model === null){
                throw new CHttpException(404, 'La página solicitada no existe.');
            }
        }
        return $this->_model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'regiones-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
