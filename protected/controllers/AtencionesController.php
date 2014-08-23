<?php

class AtencionesController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $mensaje;
    public $selectedItem = 'atenciones';
    public $rutPaciente;
    public $rutProfesional;
    public $idCita;

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
                'actions' => array(''),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index', 'view', 'nueva', 'cargardiagnosticos', 'editar', 'ver', 'find'),
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
        //echo $id;
        $this->render('detalles', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionNueva($id) {
        $model = new Atenciones;

        $this->rutPaciente = $id;
        $this->idCita = $_GET['cita'];

        $this->performAjaxValidation($model);

        if (isset($_POST['Atenciones'])) {

            $model->attributes = $_POST['Atenciones'];

            if (isset($_POST['rutPaciente'])) {
                $model->rut_profesional = $_POST['rutPaciente'];
            }

            $model->rut_profesional = Yii::app()->user->rut;
            $model->rut_paciente = $this->rutPaciente;
            $model->fecha = date('y-m-d');

            if ($model->save()) {
                $cita = Citas::model()->findByPk($this->idCita);
                $cita->id_estado_cita = 2;
                $cita->save(false);
                $this->mensaje = 'Se ha registrado una nueva atención en el sistema.';
                $this->forward('index');
            }
        }

        if (Yii::app()->user->perfil == 'profesional') {
            $this->render('nueva', array(
                'model' => $model,
            ));
        }else{
            throw new CHttpException(401, 'No posee los priviligios para realizar la operación.');
        }
    }

    public function actionCargarDiagnosticos() {

        $data = Diagnosticos::model()->findAll('id_categoria=:idCategoria', array(':idCategoria' => (int) $_POST['idCategoria']));

        $data = CHtml::listData($data, 'id', 'diagnostico');

        foreach ($data as $value => $name) {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionEditar($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['Atenciones'])) {

            $model->attributes = $_POST['Atenciones'];

            if ($model->save()) {
                $this->mensaje = 'Se ha registrado una nueva atención en el sistema.';
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
        if (!isset($_GET['ajax'])) {
            
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {

        $criteria = new CDbCriteria();

        if (isset($_POST['fDesde'])) {
            $fDesde = $_POST['fDesde'];
        } else {
            $fDesde = '';
        }

        if (isset($_POST['fHasta']) && !empty($_POST['fHasta'])) {
            $fHasta = $_POST['fHasta'];
        } else {
            $fHasta = date('Y-m-d');
        }

        if (isset($_POST['rutPaciente'])) {
            $q = $_POST['rutPaciente'];
            $criteria->compare('rut_paciente', $q, false, 'OR');
        }

        if (isset($_POST['rutMedico'])) {
            $q = $_POST['rutMedico'];
            $criteria->compare('rut_paciente', $q, false, 'OR');
        }

        if (isset($_POST['idDiagnostico'])) {
            $criteria->compare('id_diagnostico', $_POST['idDiagnostico'], false, 'OR');
        }

        $criteria->addBetweenCondition('fecha', $fDesde, $fHasta);
        $criteria->order = 'fecha DESC';
//        
//        echo $_;
//        Yii::app()->end();

        $count = Atenciones::model()->count($criteria);
        $pages = new CPagination($count);
        // results per page
        $pages->pageSize = 10;
        $pages->applyLimit($criteria);

        $model = Atenciones::model()->findAll($criteria);

        $this->render('index', array('atenciones' => $model,
            'pages' => $pages,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Atenciones the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Atenciones::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'La página solicitada no existe.');
        }
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Atenciones $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'atenciones-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
