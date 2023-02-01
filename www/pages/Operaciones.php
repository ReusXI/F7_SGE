<?php 
include_once 'conexion.php';
if (isset($_GET['inp_guardar']) != null) {
    include_once 'conexion.php';
  session_start();
  $sesion = $_SESSION['User'];
    $sql_leer = "CALL INSERTAR_EVENTO('" . $_GET['t_institucion'] . "','" . $_GET['c_institucion'] . "','" . $_GET['asunto'] . "','" . $_GET['f_incidente'] . "','" . $_GET['f_deteccion'] . "','" . $_GET['descripcion'] . "','" . $_GET['r_t_afectados'] . "','" . $_GET['c_clasificacion1'] . "','" . $_GET['c_clasificacion2'] . "'," . $_GET['economico'] . ",'" . $_GET['dano'] . "','" . $_GET['procesos'] . "'," . $_GET['t_interrupcion'] . "," . $_GET['t_resolucion'] . ",'" . $sesion . "');";
    $gsent = $pdo->prepare($sql_leer);
    $resultado = $gsent->execute();
    if ($resultado > 0) {
        echo "<script>alert('TAREA REALIZADA CON EXITO!')</script>";
    }
}
//MODIFICAR REGISTRO
if (isset($_GET['inp_editar']) != null) {
    include_once 'conexion.php';
    $sql_leer = "CALL EDITAR_EVENTO('" . $_GET['c_incidente'] . "','" . $_GET['t_institucion'] . "','" . $_GET['c_institucion'] . "','" . $_GET['asunto'] . "','" . $_GET['f_incidente'] . "','" . $_GET['f_deteccion'] . "','" . $_GET['descripcion'] . "','" . $_GET['r_t_afectados'] . "','" . $_GET['c_clasificacion1'] . "','" . $_GET['c_clasificacion2'] . "'," . $_GET['economico'] . ",'" . $_GET['dano'] . "','" . $_GET['procesos'] . "'," . $_GET['t_interrupcion'] . "," . $_GET['t_resolucion'] . ");";
    $gsent = $pdo->prepare($sql_leer);
    $resultado = $gsent->execute();
    if ($resultado > 0) {
        echo "<script>alert('TAREA REALIZADA CON EXITO!')</script>";
    }
}
//ELIMINAR REGISTRO
if (isset($_GET['inp_eliminar']) != null) {
    include_once 'conexion.php';
    $sql_leer = 'DELETE from users where id = \'' . $_GET['ide'] . '\';';
    $gsent = $pdo->prepare($sql_leer);
    $resultado = $gsent->execute();
    if ($resultado > 0) {
        echo "<script>alert('TAREA REALIZADA CON EXITO!')</script>";
    }
}
//BUSCAR REGISTRO
if (isset($_GET['desde']) != null) {
    include_once 'conexion.php';
    $sql_leer = "SELECT * FROM evento WHERE f_incidente BETWEEN '" . $_GET['desde'] . "' AND '" . $_GET['hasta'] . "' ORDER BY codigo_incidente DESC;";
    $gsent = $pdo->prepare($sql_leer);
    $resultado = $gsent->execute();
    if ($resultado > 0) {
        echo "<script>alert('TAREA REALIZADA CON EXITO!')</script>";
    }
}
?>