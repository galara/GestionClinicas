<h1>Enfermedades mas Recurrentes</h1>
<hr>

<h6>
    <strong>Periodo: </strong>
    <?php echo (!empty($params['fDesde']) ? date('d/m/Y', strtotime($params['fDesde']))  : 'El inicio' ) . ' al ' . date('d/m/Y', strtotime($params['fHasta'])) ?>
</h6>

<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width: 65%;">Enfermedad</th>
            <th>Cantidad de Personas Afectadas</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($model as $item): ?>
            <?php if($item['total'] != '0'):?>
            <tr>
                <td><?php echo $item['diagnostico'] ?></td>
                <td><?php echo $item['total'] ?></td>
            </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </tbody>
</table>
<hr>


