<?php
include_once 'conexion.php';
$id_estado = $_POST['id_estado'];
session_start();
  $sesion = $_SESSION['rol'];
    $sql_leer = "SELECT * FROM taxonomia2 WHERE taxonomia1 = '$id_estado' AND usuario = '$sesion' or admin = '$sesion'";
    $gsent = $pdo->prepare($sql_leer);
    $gsent->execute();
    $resultado = $gsent->fetchAll();
    foreach ($resultado as $dato) :
    $html = "<option value='". $dato['codigo'] ."'>". $dato['taxonomia2'] ."</option>";
    echo $html;
    endforeach
?>