<!DOCTYPE html>
<html>
<?php
if (isset($_GET['error']) != null) {
  echo "<Script> alert('Usuario y/o Contraseña Incorrecto'); </Script>";
}
?>

<head>
  <meta charset="utf-8">
  <!--
  Customize this policy to fit your own app's needs. For more guidance, please refer to the docs:
      https://cordova.apache.org/docs/en/latest/
  Some notes:
    * https://ssl.gstatic.com is required only on Android and is needed for TalkBack to function properly
    * Disables use of inline scripts in order to mitigate risk of XSS vulnerabilities. To change this:
      * Enable inline JS: add 'unsafe-inline' to default-src
  -->
  <meta http-equiv="Content-Security-Policy" content="default-src * 'self' 'unsafe-inline' 'unsafe-eval' data: content:">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, viewport-fit=cover">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <link rel="stylesheet" href="src/js/jquery-ui.min.css">
  <meta name="theme-color" content="#fff">
  <meta name="format-detection" content="telephone=no">
  <meta name="msapplication-tap-highlight" content="no">
  <title>BO - GS EVENTOS</title>

  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <link rel="apple-touch-icon" href="assets/icons/apple-touch-icon.png">
  <link rel="icon" href="assets/icons/favicon.png">


  <link rel="stylesheet" href="framework7/framework7-bundle.min.css">
  <link rel="stylesheet" href="css/icons.css">
  <link rel="stylesheet" href="css/app.css">
</head>

<body>
  <div id="app">
    <!-- Popup -->
    <div class="popup" id="my-popup">
      <div class="view">
        <div class="page">
          <div class="navbar">
            <div class="navbar-bg"></div>
            <div class="navbar-inner">
              <div class="title">Popup</div>
              <div class="right">
                <a href="#" class="link popup-close">Close</a>
              </div>
            </div>
          </div>
          <div class="page-content">
            <div class="block">
              <p>Popup content goes here.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Login Screen -->
    <div class="page no-navbar no-toolbar no-swipeback login-screen-page">
      <div class="page-content login-screen-content">
        <form action="Check.php" method="GET" id="Logger">
          <div class="login-screen-title">Login</div>
          <div class="list">
            <ul>
              <li class="item-content item-input">
                <div class="item-inner">
                  <div class="item-title item-label">Usuario</div>
                  <div class="item-input-wrap">
                    <input type="text" name="username" placeholder="Tu Usuario" required />
                  </div>
                </div>
              </li>
              <li class="item-content item-input">
                <div class="item-inner">
                  <div class="item-title item-label">Contraseña</div>
                  <div class="item-input-wrap">
                    <input type="password" name="password" placeholder="Tu Contraseña" required />
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <div class="list">
            <ul>
              <li>
                <a href="#" onclick="Loger();" class="item-link list-button login-button" id="Log" style="border: none;">Ingresar</a>
              </li>
            </ul>
          </div>
        </form>
        <div class="block-footer">SISTEMA DE GESTION DE INCIDENTES<br />BANCO DE OCCIDENTE S.A</div>
      </div>
    </div>
  </div>
  </div>
  </div>


  <!-- Framework7 library -->
  <script src="framework7/framework7-bundle.min.js"></script>


  <!-- App routes -->
  <script src="js/routes.js"></script>
  <!-- App store -->
  <script src="js/store.js"></script>
  <!-- App scripts -->
  <script src="js/app.js"></script>
</body>

</html>