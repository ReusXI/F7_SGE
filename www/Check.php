<?php
$Usser = $_REQUEST['username'];
$Pass = $_REQUEST['password'];

include_once 'conexion.php';
$sql_leer = 'Select * from users';
$gsent = $pdo->prepare($sql_leer);
$gsent->execute();
$resultado = $gsent->fetchAll();
foreach ($resultado as $dato) :
    if(strtoupper($Usser) == strtoupper($dato['Uss']) && strtoupper($Pass) == strtoupper($dato['Pass'])){
        $_SESSION['User'] = $dato['Uss'];
        $_SESSION['Password'] = $dato['Pass'];
        break;
    }
endforeach;

if($_SESSION['User'] != null && $_SESSION['Password'] != null){
    header("Location:index.html");
}else{
    
    header("Location:Login.php?error=1");
}
?>