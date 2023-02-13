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
        session_start();
        $_SESSION['User'] = htmlentities($Usser);
        $_SESSION['Password'] =htmlentities($Pass) ;
        $_SESSION['rol'] =htmlentities($dato['rol']);
        $_SESSION['admin'] =htmlentities($dato['admin']);
        break;
    }
endforeach;

if($_SESSION['User'] != null && $_SESSION['Password'] != null){
    if($_SESSION['admin'] == 'No'){
        header("Location:index.php");
    }else if($_SESSION['admin'] == 'Si'){
        header("Location:index2.php");
    }
    
}else{
    
    header("Location:Login.php?error=1");
}
?>