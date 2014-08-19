<?php

class ReportesController extends Controller {

    public $selectedItem = 'reportes';

    public function actionIndex() {

        $this->render('index');
    }

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
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('pacientesatendidos', 'enfermedadesrecurrentes',
                    'cargardiagnosticos', 'personasenfermedad', 'index'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    //**************************************************************************
    public function actionPacientesAtendidos() {

        $criteria = new CDbCriteria();
        $params = array();

        if (isset($_POST['fDesde'])) {
            $fDesde = $_POST['fDesde'];
        } else {
            $fDesde = null;
        }

        if (isset($_POST['fHasta']) && !empty($_POST['fHasta'])) {
            $fHasta = $_POST['fHasta'];
        } else {
            $fHasta = date('Y-m-d');
        }

        if (isset($_POST['rutMedico']) && !empty($_POST['rutMedico'])) {
            $medico = Profesionales::model()->findByPk($_POST['rutMedico']);
            $params['medico'] = $medico->nombre_1 . ' ' . $medico->apellido_paterno;
            $criteria->compare('rut_profesional', $_POST['rutMedico']);
        }

        $params['fHasta'] = $fHasta;
        $params['fDesde'] = $fDesde;
        $criteria->addBetweenCondition('fecha', $fDesde, $fHasta);
        $criteria->order = 'fecha DESC';
        $model = Atenciones::model()->findAll($criteria);

        $this->printPDF('_pacientesatendidos', $model, $params);
    }

    //**************************************************************************
    public function actionEnfermedadesRecurrentes() {
        $model = new Reportes();
        $params = array();

        if (isset($_POST['fDesde'])) {
            $fDesde = $_POST['fDesde'];
        } else {
            $fDesde = null;
        }

        if (isset($_POST['fHasta']) && !empty($_POST['fHasta'])) {
            $fHasta = $_POST['fHasta'];
        } else {
            $fHasta = date('Y-m-d');
        }
        $criteria->addBetweenCondition('fecha', $fDesde, $fHasta);
        $params['fHasta'] = $fHasta;
        $params['fDesde'] = $fDesde;

        $rows = $model->getEnfermedadesRecurrentes($fDesde, $fHasta);
        //echo print_r($rows);
        $this->printPDF('_enfermedadesrecurrentes', $rows, $params);
    }

    //**************************************************************************
    public function actionPersonasEnfermedad() {

        $params = array();
        $criteria = new CDbCriteria();

        if (isset($_POST['fDesde'])) {
            $fDesde = $_POST['fDesde'];
        } else {
            $fDesde = null;
        }

        if (isset($_POST['fHasta']) && !empty($_POST['fHasta'])) {
            $fHasta = $_POST['fHasta'];
        } else {
            $fHasta = date('Y-m-d');
        }

        if (isset($_POST['idCategoiras']) && !isset($_POST['idDiagnostico'])) {
            $criteria->addCondition('diagnosticos.id = atenciones.id_diagnostico');
            $criteria->addCondition('diagnosticos.id_categoria = categorias_diagnosticos.id');
            $criteria->addCondition('categorias.id =' . $_POST['idCategorias']);
        }

        if (isset($_POST['idDiagnostico'])) {
            $criteria->compare('id_diagnostico', $_POST['idDiagnostico'], false, 'OR');
            $params['enfermedad'] = Diagnosticos::model()->findByPk($_POST['idDiagnostico'])->diagnostico;
        }

        $criteria->addBetweenCondition('fecha', $fDesde, $fHasta);

        $params['fHasta'] = $fHasta;
        $params['fDesde'] = $fDesde;

        $model = Atenciones::model()->findAll($criteria);

        $this->printPDF('_personasenfermedad', $model, $params);
    }

    //**************************************************************************
    private function printPDF($view, $model, $params = null) {

        $mPDF1 = Yii::app()->ePdf->mpdf();
        $css = file_get_contents(Yii::getPathOfAlias('webroot.public.css') . '/bootstrap.min.css');
        $mPDF1->WriteHTML($css, 1);
        $mPDF1->WriteHTML($this->renderPartial($view, array('model' => $model, 'params' => $params), true));

        $mPDF1->Output();
    }

    //**************************************************************************
    public function actionCargarDiagnosticos() {

        $data = Diagnosticos::model()->findAll('id_categoria=:idCategoria', array(':idCategoria' => (int) $_POST['idCategoria']));

        $data = CHtml::listData($data, 'id', 'diagnostico');

        foreach ($data as $value => $name) {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
        }
    }

}
