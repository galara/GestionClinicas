<?php

class ProfesionalesController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $selectedItem = 'mantenedores';
    public $mensaje;

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
                'actions' => array('index', 'detalles', 'crear', 'eliminar', 'editar', 'find'),
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
        $this->render('crear', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCrear() {
        $model = new Profesionales;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Profesionales'])) {
            $model->attributes = $_POST['Profesionales'];
            if ($model->save()) {
                $this->mensaje = 'El Médico ' . $model->rut . ' ha sido registrado con éxito';
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

        if (isset($_POST['Profesionales'])) {
            $model->attributes = $_POST['Profesionales'];
            if ($model->save()) {
                $this->mensaje = 'Los datos del profesional ' . $model->rut . ' han sido modificados exitosamente';
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
        $affected = Profesionales::model()->deleteByPk($id);

        if ($affected > 0) {
            $this->mensaje = 'El profesional médico ha sido eliminado exitosamente';
            $this->forward('index');
        }
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

        $profesionales = Profesionales::model()->findAll($criteria);

        $this->render('index', array('profesionales' => $profesionales,
            'pages' => $pages,
        ));
    }

    /**
     * @return json retorna el resutaldo de una busqueda ajax
     */
    public function actionFind() {

        if (isset($_GET['clave'])) {
            
            $q = $_GET['clave'];
            $criterio = new CDbCriteria();
            $criterio->compare('nombre_1', $q, true, 'OR');
            $criterio->compare('apellido_paterno', $q, true, 'OR');
            $criterio->compare('rut', $q, true, 'OR');
            
            $resultado = Profesionales::model()->findAll($criterio);
            
            if ($resultado) {
                echo CJSON::encode(array(
                    'result' => 'success',
                    'datos' => $resultado,
                ));
            } else {
                echo CJSON::encode(array('result' => 'notfound', 'datos' => 'El profesional no existe'));
            }
        }
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Profesionales('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Profesionales'])) {
            $model->attributes = $_GET['Profesionales'];
        }
        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Profesionales the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Profesionales::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Profesionales $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'profesionales-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
