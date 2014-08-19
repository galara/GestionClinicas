<h1>Personas afectadas por enfermedad</h1>
<hr>
<h6><strong>Enfermedad: </strong><?php echo $params['enfermedad'] ?></h6>
<h6><strong>Periodo: </strong><?php echo $params['fDesde'] . ' al ' . $params['fHasta'] ?></h6>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Paciente</th>
            <th>Fecha Atención</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($model as $item): ?>
            <tr>
                <td><?php echo $item->fkPaciente->nombre_1 . ' ' . $item->fkPaciente->apellido_paterno ?></td>
                <td><?php echo date('d/m/Y', strtotime($item->fecha)) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<hr>



