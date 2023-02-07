<?php
$X = $_REQUEST['opciones5'];
if($X==1){
    header('Location:TextFile1.php');

}if($X==2){
    header('Location:TextFile2.php');

}if($X==3){
    header('Location:TextFile3.php?fecha_inicio='. $_REQUEST['fdesde'].'&fecha_fin='. $_REQUEST['fhasta']);
}

?>