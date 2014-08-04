<?php

class CitasController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $selectedItem = 'Citas';
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
                'actions' => array('index', 'view', 'getcitas', 'create', 'editar'),
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

    private function tipoCitaToEvent($tipo){
     
        switch ($tipo) {
            case 'Normal':
                $tipo = 'event-info';
                break;
            case 'Urgente':
                $tipo = 'event-warning';
                break;
        }
        
        return $tipo;
        
    }
    
    /**
     * @return array retorna un array con las citas obtenidas de la base de datos en
     * formato json para ser usado por el plugin bootstrap-calendar
     */
    public function actionGetCitas() {

        $data = Citas::model()->findAll();

        $citas = null;

        foreach ($data as $cita) {
                        
            $citas[] = array(
                'id' => $cita->id,
                'title' => $cita->motivo,
                'url' => '/gestionclinicas/citas/' . $cita->id,
                'class' => $this->tipoCitaToEvent($cita->fkTipoCita->tipo_cita),
                'start' => (strtotime($cita->hora_inicio) + 18000) . '000',
                'end' => (strtotime($cita->hora_termino) + 18000). '000'
            );
        }

        echo json_encode(array('success' => 1, 'result' => $citas));
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->renderPartial('detalles', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Citas;
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['Citas'])) {
            $model->attributes = $_POST['Citas'];
            if ($model->save()){
                $this->mensaje = 'La cita ha sido agendada correctamente';
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
     * @param integer $id the ID of the model to be updated
     */
    public function actionEditar($id) {
        $model = $this->loadModel($id);

        $this->performAjaxValidation($model);

        if (isset($_POST['Citas'])) {
            $model->attributes = $_POST['Citas'];
            if ($model->save()){
                $this->mensaje = 'La cita ha sido modificada correctamente';
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
        $this->render('index');
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Citas('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Citas']))
            $model->attributes = $_GET['Citas'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Citas the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Citas::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Citas $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'citas-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
