<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div style="float:left; position: relative; height: 60vh; width:40vw; padding-left:40px">
    <h1>Numero de Caidas por Sistema</h1>    
    <canvas id="myChart"></canvas>
    </div>
    <div style="float:left; position: relative; height: 60vh; width:50vw;  padding-left:40px">
        <h1>Numero de Incidentes por Taxonomia (Nivel II)</h1>
        <canvas id="myChart2"></canvas>
    </div>
    <div style="float:left; position: relative; padding-top:70px; height: 60vh; width:40vw; padding-left:40px">
        <h1 style="text-align: center;">Impacto Economico por Incidente</h1>
        <canvas id="myChart3" style="width:100%"></canvas>
    </div>
    <div style="float:left; position: relative; padding-top:70px; height: 60vh; width:50vw;  padding-left:40px">
        <h1 style="text-align: center;">Incidentes por fecha</h1>
        <canvas id="myChart4" style="width:100%"></canvas>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');
        const ctx1 = document.getElementById('myChart2');
        const ctx2 = document.getElementById('myChart3');
        const ctx3 = document.getElementById('myChart4');

        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [
                    <?php
                    include_once 'conexion.php';
                    $sql_leer = "select r_t_afectados from evento group by r_t_afectados;";
                    $gsent = $pdo->prepare($sql_leer);
                    $gsent->execute();
                    $resultado = $gsent->fetchAll();
                    foreach ($resultado as $dato) :
                        echo "'" . $dato['r_t_afectados'] . "',";
                    endforeach;
                    ?>
                ],
                datasets: [{
                    label: '# De Caidas',
                    data: [
                        <?php
                        $sql_leer = "select count(*) as 'cantidad' from evento group by r_t_afectados";
                        $gsent = $pdo->prepare($sql_leer);
                        $gsent->execute();
                        $resultado = $gsent->fetchAll();
                        foreach ($resultado as $dato) :
                            echo "'" . $dato['cantidad'] . "',";
                        endforeach;
                        ?>
                    ],
                    backgroundColor: [
                        'Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'
                    ],
                    borderColor: [
                        'Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'
                    ],
                    borderWidth: 1
                }]
            },
            options: {}
        });
        new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: [
                    <?php
                    $sql_leer = "select c.taxonomia2, count(*) as 'Cantidad' from evento a, taxonomia1 b, taxonomia2 c where a.codigo_clasificacion_2 = c.codigo and a.codigo_clasificacion_1 = c.taxonomia1 and b.codigo = c.taxonomia1 group by c.taxonomia2";
                    $gsent = $pdo->prepare($sql_leer);
                    $gsent->execute();
                    $resultado = $gsent->fetchAll();
                    foreach ($resultado as $dato) :
                        echo "'" . $dato['taxonomia2'] . "',";
                    endforeach
                    ?>
                ],
                datasets: [{
                    label: '# De Incidentes',
                    data: [
                        <?php
                        $sql_leer = "select c.taxonomia2, count(*) as 'Cantidad' from evento a, taxonomia1 b, taxonomia2 c where a.codigo_clasificacion_2 = c.codigo and a.codigo_clasificacion_1 = c.taxonomia1 and b.codigo = c.taxonomia1 group by c.taxonomia2";
                        $gsent = $pdo->prepare($sql_leer);
                        $gsent->execute();
                        $resultado = $gsent->fetchAll();
                        foreach ($resultado as $dato) :
                            echo "'" . $dato['Cantidad'] . "',";
                        endforeach;
                        ?>
                    ],
                    backgroundColor: [
                        'Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'
                    ],
                    borderColor: [
                        'Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        new Chart(ctx2, {
            type: 'line',
            data: {
                labels: [
                    <?php
                    $sql_leer = "SELECT * FROM evento ORDER BY codigo_incidente DESC;";
                    $gsent = $pdo->prepare($sql_leer);
                    $gsent->execute();
                    $resultado = $gsent->fetchAll();
                    foreach ($resultado as $dato) :
                        echo "'" . $dato['codigo_incidente'] . "',";
                    endforeach
                    ?>
                ],
                datasets: [{
                    label: 'Impacto Economico',
                    data: [
                        <?php
                        $sql_leer = "SELECT * FROM evento ORDER BY codigo_incidente DESC";
                        $gsent = $pdo->prepare($sql_leer);
                        $gsent->execute();
                        $resultado = $gsent->fetchAll();
                        foreach ($resultado as $dato) :
                            echo "'" . $dato['impacto_economico_estimado'] . "',";
                        endforeach;
                        ?>
                    ],
                    backgroundColor: [
                        'Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'
                    ],
                    borderColor: [
                        'Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: false
                    }
                }
            }
        });
        new Chart(ctx3, {
            type: 'line',
            data: {
                labels: [
                    <?php
                    $sql_leer = "select f_incidente, count(*) from evento Group by f_incidente order by f_incidente;";
                    $gsent = $pdo->prepare($sql_leer);
                    $gsent->execute();
                    $resultado = $gsent->fetchAll();
                    foreach ($resultado as $dato) :
                        echo "'" . $dato['f_incidente'] . "',";
                    endforeach
                    ?>
                ],
                datasets: [{
                    label: '# de Incidentes',
                    data: [
                        <?php
                        $sql_leer = "select f_incidente, count(*) as 'cantidad' from evento Group by f_incidente order by f_incidente;";
                        $gsent = $pdo->prepare($sql_leer);
                        $gsent->execute();
                        $resultado = $gsent->fetchAll();
                        foreach ($resultado as $dato) :
                            echo "'" . $dato['cantidad'] . "',";
                        endforeach;
                        ?>
                    ],
                    backgroundColor: [
                        'Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'
                    ],
                    borderColor: [
                        'Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>