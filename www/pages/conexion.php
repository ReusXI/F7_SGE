<?php
$link = 'mysql:host=localhost;dbname=sg_e_2023';
$usuario = 'root';
$pass = '1234';

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
            