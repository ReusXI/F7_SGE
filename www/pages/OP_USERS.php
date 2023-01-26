<?php 
include_once 'conexion.php';
if (isset($_GET['inp_guardar']) != null) {
    include_once 'conexion.php';
    $sql_leer = 'INSERT INTO users(Uss,Pass,rol,Estado) VALUES(\'' . $_GET['usuario'] . '\',\'' . $_GET['clave'] . '\',\'' . $_GET['rol'] . '\',\'ACTIVO\');';
    $gsent = $pdo->prepare($sql_leer);
    $resultado = $gsent->execute();
    if ($resultado > 0) {
        echo "<script>alert('TAREA REALIZADA CON EXITO!')</script>";
    }
}
//MODIFICAR REGISTRO
if (isset($_GET['inp_editar']) != null) {
    include_once 'conexion.php';
    $sql_leer = 'UPDATE users SET Uss = \'' . $_GET['usuario'] . '\', Pass = \'' . $_GET['clave'] . '\', rol= \'' . $_GET['rol'] . '\',Estado = \'' . $_GET['estado'] . '\' where id = \'' . $_GET['id'] . '\';';
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
?>
