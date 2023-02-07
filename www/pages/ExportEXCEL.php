<?php
$X = $_REQUEST['opciones'];
if($X==1){
    header('Location:ExportXLS.php');

}if($X==2){
    header('Location:ExportXLS2.php');

}if($X==3){
    header('Location:ExportXLS3.php?fecha_inicio='. $_REQUEST['desde'].'&fecha_fin='. $_REQUEST['hasta']);
}

?>