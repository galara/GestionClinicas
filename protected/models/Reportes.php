<?php

class Reportes extends CActiveRecord {

    private $connection;

    public function __construct() {
        $this->connection = new CDbConnection(Yii::app()->db->connectionString, Yii::app()->db->username, Yii::app()->db->password);
        $this->connection->active = true;
    }

    public static function model($className = __CLASS__) {
        parent::model($className);
    }

    public function getEnfermedadesRecurrentes($fDesde = null, $fHasta = null) {

        $diagnosticos = Diagnosticos::model()->findAll();
        $rows = null;

        if (is_null($fHasta)) {
            $fHasta = date('Y-m-d');
        }

        foreach ($diagnosticos as $item) {
            $sql = 'SELECT diag.diagnostico, count(id_diagnostico) as total FROM atenciones ate, '
                    . 'diagnosticos diag WHERE id_diagnostico = ' . $item->id . ' AND ate.id_diagnostico = diag.id  '
                    . 'AND ate.fecha BETWEEN "' . $fDesde . '" AND "' . $fHasta . '"';
            $rows[] = $this->connection->createCommand($sql)->queryRow();
            //echo $sql;
        }

        //Yii::app()->end();

        foreach ($rows as $clave => $fila) {
            $total[$clave] = $fila['total'];
            //$diagnostico[$clave] = $fila['diagnostico'];
        }

        array_multisort($total, SORT_DESC, $rows);
        return $rows;
    }

}
