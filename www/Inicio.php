<!DOCTYPE html>
<?php
  session_start();
  $sesion = $_SESSION['User'];
?>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>Designlopers</title>
        <link rel="stylesheet" href="./assets/css/style.css">
    </head>
    <body>
        <section class="banner">
            <div class="banner-content">
                <h1>BIENVENID@,  <?=$sesion?> </h1>
            </div>
        </section>

        
        <script src="./assets/js/jquery-3.1.0.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
        <script src="./assets/js/main.js"></script>
    </body>
</html>