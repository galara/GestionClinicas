<?php
/**
 * @var $this AtencionesController
 * @var $dataProvider CActiveDataProvider 
 */
?>

<h1>Pacientes atendidos</h1>
<hr>

<?php
if (!empty($params['medico'])) {
    echo '<h6><strong>Médico Tratante: </strong>' . $params['medico'] . '</h6>';
}
?>
<h6><strong>Periodo: </strong><?php echo (!empty($params['fDesde']) ? date('d/m/Y', strtotime($params['fDesde']))  : 'El inicio' ) . ' al ' . date('d/m/Y', strtotime($params['fHasta'])) ?></h6>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Paciente</th>
            <th>Diagnóstico</th>
            <th>Fecha Atención</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($model as $item): ?>
            <tr>
                <td><?php echo $item->fkPaciente->nombre_1 . ' ' . $item->fkPaciente->apellido_paterno ?></td>
                <td><?php echo $item->fkDiagnostico->diagnostico ?></td>
                <td><?php echo date('d/m/Y', strtotime($item->fecha)) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<hr>
