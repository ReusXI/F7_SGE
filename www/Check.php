<?php
$Usser = $_REQUEST['username'];
$Pass = $_REQUEST['password'];

include_once 'conexion.php';
$sql_leer = 'Select * from usuarios';
$gsent = $pdo->prepare($sql_leer);
$gsent->execute();
$resultado = $gsent->fetchAll();
foreach ($resultado as $dato) :
    if(strtoupper($Usser) == strtoupper($dato['Usuario']) && strtoupper($Pass) == strtoupper($dato['Password'])){
        $_SESSION['User'] = $dato['Usuario'];
        $_SESSION['Password'] = $dato['Password'];
        break;
    }
endforeach;

if($_SESSION['User'] != null && $_SESSION['Password'] != null){
    header("Location:index.html");
}else{
    
    header("Location:Login.php?error=1");
}
?>