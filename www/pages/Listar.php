<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.dataTables.min.css">

    <style>
        /*estilos para la tabla*/
        table th {
            background-color: grey;
            color: white;
        }
    </style>

</head>

<body>
    <form style="width: 600px; padding-right: 0px;display: flex; align-items: center;">
        <input type="date" class="form-control" name="fecha_inicio" style="width: 33%; display:inline-block;">
        <span> Hasta </span>
        <input type="date" name="fecha_fin" class="form-control" style="width: 33%; display:inline-block;">
        <button class="btn btn-success" name="buscar" style="display: inline-block;margin-left: 5px; margin-right: 10px;" value="buscar">Buscar</button>
        <button type="button" class="btn btn-success" name="Todo" onclick="window.location = 'Eventos.php';" value="Todo">Todo</button>

    </form>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Tipo Institucion</th>
                <th>Codigo Institucion</th>
                <th>Fecha de Reporte de datos</th>
                <th>Codigo Incidente</th>
                <th>Asunto</th>
                <th>Fecha de Incidente</th>
                <th>Fecha de Deteccion</th>
                <th>Descripcion</th>
                <th>Recursos Tecnologicos Afectados</th>
                <th>Codigo de Clasificacion(Nivel I)</th>
                <th>Codigo de Clasificacion(Nivel II)</th>
                <th>Impacto Economico Estimado</th>
                <th>Daño Reputacional</th>
                <th>Afectó Procesos Criticos</th>
                <th>Tiempo de Interrupcion</th>
                <th>Tiempo de Resolucion del Incidente</th>
                <th>Usuario</th>
                <th>Fecha de Registro</th>
            </tr>
        </thead>
        <tbody>
        <?php
                        include_once 'conexion.php';
                        $sql_leer = "SELECT * FROM evento ORDER BY codigo_incidente DESC;";
                        if (isset($_GET['fecha_inicio']) == "AFASFAS") {
                            $sql_leer = "SELECT * FROM evento WHERE f_incidente BETWEEN '" . $_GET['fecha_inicio'] . "' AND '" . $_GET['fecha_fin'] . "' ORDER BY codigo_incidente DESC;";
                        }

                        $gsent = $pdo->prepare($sql_leer);
                        $gsent->execute();
                        $resultado = $gsent->fetchAll();
                        foreach ($resultado as $dato) :
                        ?>
                            <tr>
                                <td><?= $dato['t_institucion']; ?></td>
                                <td><?= $dato['c_institucion']; ?></td>
                                <td><?= date('Y-m-d') ?></td>
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
                                <td><?= $dato['usuario']; ?></td>
                                <td><?= $dato['fecha_registro']; ?></td>
                            </tr>
                        <?php endforeach ?>
        </tbody>
    </table>

    <button id="btn1">clon</button>


    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>

    <script>
        let temp = $("#btn1").clone();
        $("#btn1").click(function() {
            $("#btn1").after(temp);
        });

        $(document).ready(function() {
            var table = $('#example').DataTable({
                orderCellsTop: true,
                fixedHeader: true
            });

            //Creamos una fila en el head de la tabla y lo clonamos para cada columna
            $('#example thead tr').clone(true).appendTo('#example thead');

            $('#example thead tr:eq(1) th').each(function(i) {
                var title = $(this).text(); //es el nombre de la columna
                $(this).html('<input type="text" placeholder="Search...' + title + '" />');

                $('input', this).on('keyup change', function() {
                    if (table.column(i).search() !== this.value) {
                        table
                            .column(i)
                            .search(this.value)
                            .draw();
                    }
                });
            });
        });
    </script>


</body>

</html>