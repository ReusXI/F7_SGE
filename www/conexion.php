<?php
$link = 'mysql:host=172.16.102.45;dbname=sg_e_2023';
$usuario = 'SGE';
$pass = 'Occidente2023';

try{

$pdo = new PDO ($link,$usuario,$pass);

} catch (PDOException $e){
    print "¡Error!" . $e->getMessage(). "<br>";
}

?>

<?php 
/*            include_once 'conexion.php';
            $sql_leer = 'Select * from actor';
            $gsent = $pdo->prepare($sql_leer);
            $gsent->execute();
            $resultado = $gsent->fetchAll();
            foreach($resultado as $dato):
            ?>
            <div class="block">Id:<?= $dato['actor_id'] ?> Nombre:<?= $dato['first_name'] ?></div>
            <?php 
            endforeach;*/
?>
            