<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename= ROPSSCI" . Date("Ymd") . ".xls");
?>

<table class="table table-striped table-hover" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
    <thead class="table-dark">
        <tr class="table-dark">
            <th>Tipo de Institucion</th>
            <th>Codigo de Institucion</th>
            <th>Fecha Reporte de Datos</th>
            <th>Codigo Incidente</th>
            <th>Asunto</th>
            <th>Fecha del Incidente</th>
            <th>Fecha de Deteccion del Incidente</th>
            <th>Descripcion del Incidente</th>
            <th>Recursos Tecnologicos Afectados</th>
            <th>Codigo de Clasificacion(Nivel I)</th>
            <th>Codigo de Clasificacion(Nivel II)</th>
            <th>Impacto Economico Estimado</th>
            <th>Daño Reputacional</th>
            <th>Afectó Procesos Criticos</th>
            <th>Tiempo Interrupcion</th>
            <th>Tiempo Resolucion</th>
            <th>Fecha de Registro</th>
            <th>Usuario</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include_once 'conexion.php';
        $sql_leer = "SELECT * from evento WHERE f_incidente BETWEEN '" . $_GET['fecha_inicio'] . "' AND '" . $_GET['fecha_fin'] . "' ORDER BY codigo_incidente DESC;";
        $gsent = $pdo->prepare($sql_leer);
        $gsent->execute();
        $resultado = $gsent->fetchAll();
        foreach ($resultado as $dato) :
        ?>
            <tr>
                <td><?= $dato['t_institucion']; ?></td>
                <td><?= $dato['c_institucion']; ?></td>
                <td><?= Date("Y-m-d") ?></td>
                <td><?= $dato['codigo_incidente']; ?></td>
                <td><?= $dato['asunto']; ?></td>
                <td><?= $dato['f_incidente']; ?></td>
                <td><?= $dato['f_deteccion_incidente']; ?></td>
                <td><?= $dato['descripcion_incidente']; ?></td>
                <td><?= $dato['r_t_afectados']; ?></td>
                <td><?= $dato['codigo_clasificacion_1']; ?></td>
                <td><?= $dato['codigo_clasificacion_2']; ?></td>
                <td><?= $dato['impacto_economico_estimado']; ?></td>
                <td><?= $dato['daño_reputacional']; ?></td>
                <td><?= $dato['afecto_procesos_criticos']; ?></td>
                <td><?= $dato['tiempo_interrupcion']; ?></td>
                <td><?= $dato['tiempo_resolucion_incidente']; ?></td>
                <td><?= $dato['fecha_registro']; ?></td>
                <td><?= $dato['usuario']; ?></td>
            <?php endforeach ?>
    </tbody>
</table>