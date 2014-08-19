<?php

class AntecedentesMedicosController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $_rutPaciente = '';
    public $_mensaje;
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
                'actions' => array('index', 'ver', 'crear', 'editar'),
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
        $this->_rutPaciente = $id;
        
        $model = AntecedentesMedicos::model()->findByPk($id);
        
        if(is_null($model) || empty($model)){
            $this->forward('antecedentesmedicos/crear/' . $id);
            Yii::app()->end();
        }
        
        $this->render('detalles', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCrear($id) {
        
        $model = AntecedentesMedicos::model()->findByPk($id);
        
        if(is_null($model) || empty($model)){
            $model = new AntecedentesMedicos;
        }
        
        $this->performAjaxValidation($model);
        $this->_rutPaciente = $id;

        if (isset($_POST['AntecedentesMedicos'])) {
            $model->attributes = $_POST['AntecedentesMedicos'];
            $model->rut_paciente = $this->_rutPaciente;
            if ($model->save()){
                $this->_mensaje = 'Se han guardado los Antecedentes Médicos del paciente ' . $id;
                $this->forward('antecedentesmedicos/ver/' . $id);
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
        $this->_rutPaciente = $id;
        
        if (isset($_POST['AntecedentesMedicos'])) {
            $model->attributes = $_POST['AntecedentesMedicos'];
            if ($model->save()){
                $this->_mensaje = 'Se han modificado los Antecedentes Médicos del paciente ' . $id;
                $this->forward('ver');
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
        $dataProvider = new CActiveDataProvider('AntecedentesMedicos');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }
    
    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return AntecedentesMedicos the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = AntecedentesMedicos::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'La página solicitada no existe.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param AntecedentesMedicos $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'antecedentes-medicos-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
