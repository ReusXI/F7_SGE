<?php
$file = fopen("ROPSSCI" . Date("Ymd") . ".txt", "w") or die("Unable to open file!");
include_once 'conexion.php';
$sql_leer = "SELECT * FROM Evento ORDER BY codigo_incidente DESC;";
$gsent = $pdo->prepare($sql_leer);
$gsent->execute();
$resultado = $gsent->fetchAll();
foreach ($resultado as $dato) :
    $TEXTO = "Tipo de Institucion: ". $dato['t_institucion'] ."
Codigo de Institucion: ". $dato['c_institucion'] ."
Fecha Reporte de Datos: ".  Date("Y-m-d") ."
Codigo Incidente: ". $dato['codigo_incidente'] ."
Asunto: ". $dato['asunto'] ."
Fecha del Incidente: ". $dato['f_incidente'] ."
Fecha de Deteccion del Incidente: ". $dato['f_deteccion_incidente'] ."
Descripcion del Incidente: ". $dato['descripcion_incidente'] ."
Recursos Tecnologicos Afectados: ". $dato['r_t_afectados'] ."
Codigo de Clasificacion(Nivel I): ". $dato['codigo_clasificacion_1'] ."
Codigo de Clasificacion(Nivel II): ". $dato['codigo_clasificacion_2'] ."
Impacto Economico Estimado: ". $dato['impacto_economico_estimado'] ."
Daño Reputacional: ". $dato['daño_reputacional'] ."
Afecto Procesos Criticos: ". $dato['afecto_procesos_criticos'] ."
Tiempo Interrupcion: ". $dato['tiempo_interrupcion'] ."
Tiempo Resolucion: ". $dato['tiempo_resolucion_incidente'] ."
Fecha de Registro: ". $dato['fecha_registro'] ."
Usuario: ". $dato['usuario'] ."
    \n\n";
    fwrite($file, $TEXTO);
 endforeach;

fclose($file);

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="ROPSSCI' . Date("Ymd") . '.txt"');
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Content-Length: test.txt');
ob_clean();
flush();
readfile('ROPSSCI' . Date("Ymd") . '.txt');
exit();
?>