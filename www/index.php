<!DOCTYPE html>
<html>

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

  <meta name="theme-color" content="#fff">
  <meta name="format-detection" content="telephone=no">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Gestion de Eventos</title>

  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <link rel="apple-touch-icon" href="assets/icons/apple-touch-icon.png">
  <link rel="icon" href="assets/icons/favicon.png">


  <link rel="stylesheet" href="framework7/framework7-bundle.min.css">
  <link rel="stylesheet" href="css/icons.css">
  <link rel="stylesheet" href="css/app.css">
</head>

<body onload="P.src='Inicio.php'">
  <div id="app">
    <!-- Left panel with cover effect-->
    <div class="panel panel-left panel-cover dark panel-init">
      <div class="view">
        <div class="page">
          <div class="navbar">
            <div class="navbar-bg"></div>
            <div onclick="window.location = 'index.php';" class="navbar-inner">
              <div class="title">INICIO</div>
            </div>
          </div>
          <div class="page-content">
            <div class="block"><a href="#" onclick="P.src= './pages/Users.php';" id="Users" style="background-color: white;" class="col button button-outline">
                <div class="item-inner">
                  <div class="item-title">Usuarios</div>
                </div>
              </a>
            </div>
            <div class="block"><a href="#" onclick="P.src= './pages/Eventos.php';" id="Users" style="background-color: white;" class="col button button-outline">
                <div class="item-inner">
                  <div class="item-title">Eventos</div>
                </div>
              </a>
            </div>
            <div class="block"><a href="#" onclick="P.src= './pages/dashboards.php';" id="Users" style="background-color: white;" class="col button button-outline">
                <div class="item-inner">
                  <div class="item-title">Graficos y Estadisticas</div>
                </div>
              </a>
            </div>
            <div class="block"><a href="#" class="button button-raised button-fill popup-open" data-popup="#my-popup1">
                <div class="item-inner">
                  <div class="item-title">Exportar a Excel</div>
                </div>
              </a>
            </div>
            <div class="block"><a href="#" class="button button-raised button-fill popup-open" data-popup="#my-popup2">
                <div class="item-inner">
                  <div class="item-title">Exportar a Texto</div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Right panel with reveal effect-->
    <div class="panel panel-right panel-reveal dark">
      <div class="view">
        <div class="page">
          <div class="navbar">
            <div class="navbar-bg"></div>
            <div class="navbar-inner">
              <div class="title">Right Panel</div>
            </div>
          </div>
          <div class="page-content">
            <div class="block">Right panel content goes here</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Views/Tabs container -->
    <div class="views tabs safe-areas">
      <!-- Tabbar for switching views-tabs -->
      <!--  <div class="toolbar toolbar-bottom tabbar-labels">
        <div class="toolbar-inner">
          <a href="#view-home" class="tab-link tab-link-active">
            <i class="icon f7-icons if-not-md">house_fill</i>
            <i class="icon material-icons if-md">home</i>
            <span class="tabbar-label">Home</span>
          </a> -->
      <!--
          <a href="#view-catalog" class="tab-link">
            <i class="icon f7-icons if-not-md">square_list_fill</i>
            <i class="icon material-icons if-md">view_list</i>
            <span class="tabbar-label">Catalog</span>
          </a>-->

      <!-- <a href="#view-settings" class="tab-link">
            <i class="icon f7-icons if-not-md">gear</i>
            <i class="icon material-icons if-md">settings</i>
            <span class="tabbar-label">Settings</span>
          </a>
        </div>
      </div> -->

      <!-- Your main view/tab, should have "view-main" class. It also has "tab-active" class -->
      <div id="view-home" class="view view-main view-init tab tab-active">
        <div class="page page-with-navbar-large page-current page-with-navbar-large-collapsed" data-name="home">
          <!-- Top Navbar -->
          <div class="navbar navbar-large navbar-large-collapsed">

            <div class="navbar-inner">
              <div class="left">
                <a href="#" class="link icon-only panel-open" data-panel="left">
                  <i class="icon f7-icons if-not-md">menu</i>
                  <i class="icon material-icons if-md">menu</i>
                </a>
              </div>
              <div class="title sliding">Gestion de Eventos</div>
              <div class="right" style="padding-right: 20px;">
                <a href="#" class="button button-raised button-fill popup-open" data-popup="#my-popup">
                  <i class="icon f7-icons if-not-md">person_2_fill</i>
                  <i class="icon material-icons if-md">person_2_fill</i>
                </a>
              </div>
            </div>
          </div>

          <!-- Scrollable page content-->
          <div class="page-content">
            <!--  <div class="block block-strong">
              <p>This is an example of tabs-layout application. The main point of such tabbed layout is that each tab contains independent view with its own routing and navigation.</p>

              <p>Each tab/view may have different layout, different navbar type (dynamic, fixed or static) or without navbar like this tab.</p>
            </div>
            <div class="block-title">Navigation</div>
            <div class="list">
              <ul>
                <li>
                  <a href="/about/" class="item-content item-link">
                    <div class="item-inner">
                      <div class="item-title">About</div>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="/form/" class="item-content item-link">
                    <div class="item-inner">
                      <div class="item-title">Form</div>
                    </div>
                  </a>
                </li>
              </ul>
            </div>

            <div class="block-title">Modals</div>
            <div class="block block-strong">
              <div class="row">
                <div class="col-50">
                  <a href="#" class="button button-raised button-fill popup-open" data-popup="#my-popup">Popup</a>
                </div>
                <div class="col-50">
                  <a href="#" class="button button-raised button-fill login-screen-open" data-login-screen="#my-login-screen">Login Screen</a>
                </div>
              </div>
            </div>

            <div class="block-title">Panels</div>
            <div class="block block-strong">
                <div class="row">
              <div class="col-50">
                  <a href="#" class="button button-raised button-fill panel-open" data-panel="left">Left Panel</a>
                </div>
                <div class="col-50">
                  <a href="#" class="button button-raised button-fill panel-open" data-panel="right">Right Panel</a>
                </div>
              </div>
            </div>

            <div class="list links-list">
              <ul>
                <li>
                  <a href="/dynamic-route/blog/45/post/125/?foo=bar#about">Dynamic (Component) Route</a>
                </li>
                <li>
                  <a href="/load-something-that-doesnt-exist/">Default Route (404)</a>
                </li>
                <li>
                  <a href="/request-and-load/user/123456/">Request & DATA REQUERIDA</a>
                </li>
              </ul>
            </div>
          </div> -->
            <iframe src="" frameborder="0" width="100%" height="100%" id="P" class="iframe"></iframe>
          </div>
        </div>

        <!-- Catalog View -->
        <!-- Catalog page will be loaded here dynamically from /catalog/ route -->
        <!--  <div id="view-catalog" class="view view-init tab" data-name="catalog" data-url="/catalog/">
    </div> -->

        <!-- Settings View -->
        <!--   <div id="view-settings" class="view view-init tab" data-name="settings" data-url="/settings/">-->
        <!-- Settings page will be loaded here dynamically from /settings/ route -->
        <!--   </div>
    </div> -->


        <!-- Popup -->
        <div class="popup" id="my-popup">
          <div class="view">
            <div class="page">
              <div class="navbar">
                <div class="navbar-bg"></div>
                <div class="navbar-inner">
                  <div class="title">Log Out</div>
                  <div class="right">
                    <a href="#" class="link popup-close">Cerrar</a>
                  </div>
                </div>
              </div>
              <div class="page-content">
                <div class="block">
                  <H1 style="text-align: center;">
                    <p>CERRAR SESION</p>
                  </H1>
                  <img width="150px" height="150px" src="./assets/icons/logging-out-2355227_1280.png" style="display: block; margin: auto;">
                  <div style="padding-top: 40px;">
                    <button onclick="window.location='LogOut.php'" class="col button button-raised button-fill button-round">Finalizar Sesion</button>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Popup -->
        <div class="popup" id="my-popup1">
          <div class="view">
            <div class="page">
              <div class="navbar">
                <div class="navbar-bg"></div>
                <div class="navbar-inner">
                  <div class="title">Exportar a Excel</div>
                  <div class="right">
                    <a href="#" class="link popup-close">Cerrar</a>
                  </div>
                </div>
              </div>
              <div class="page-content">
                <div class="block">
                  <h1>OPCIONES DE EXPORTACION</h1>
                  <hr>
                  <form action="./pages/ExportEXCEL.php">
                    <center><label>EXPORTAR EVENTOS DESDE:</label>
                      <select id="opciones" name="opciones" onchange="DATES();" style="width: 500px; padding: 10px; background:#edf2ff; border:none;" class="">
                        <option value="1">TODO</option>
                        <option value="2">ULTIMOS 6 MESES</option>
                        <option value="3">ELEGIR FECHAS</option>
                      </select>
                      <br>
                      <input type="date" name="desde" id="desde" style="width: 400px; padding: 10px; background: #BDFFB6; border:none; visibility:hidden;" disabled="true" required>
                      <br>
                      <input type="date" name="hasta" id="hasta" style="width: 400px; padding: 10px; background:#BDFFB6; border:none; visibility:hidden;" disabled="true" required>
                      <br>
                      <hr>
                      <button type="Submit" id="ExportarXLS" class="col button button-small" name="ExportarXLS">EXPORTAR</button>
                    </center>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="popup" id="my-popup2">
          <div class="view">
            <div class="page">
              <div class="navbar">
                <div class="navbar-bg"></div>
                <div class="navbar-inner">
                  <div class="title">Exportar a Texto</div>
                  <div class="right">
                    <a href="#" class="link popup-close">Cerrar</a>
                  </div>
                </div>
              </div>
              <div class="page-content">
                <div class="block">
                  <h1>OPCIONES DE EXPORTACION</h1>
                  <hr>
                  <form action="./pages/ExportTEXT.php">
                    <center><label>EXPORTAR EVENTOS DESDE:</label>
                      <select id="opciones5" name="opciones5" onchange="DATES1();" style="width: 500px; padding: 10px; background:#edf2ff; border:none;" class="">
                        <option value="1">TODO</option>
                        <option value="2">ULTIMOS 6 MESES</option>
                        <option value="3">ELEGIR FECHAS</option>
                      </select>
                      <br>
                      <input type="date" name="fdesde" id="fdesde" style="width: 400px; padding: 10px; background: #BDFFB6; border:none; visibility:hidden;" disabled="true" required>
                      <br>
                      <input type="date" name="fhasta" id="fhasta" style="width: 400px; padding: 10px; background:#BDFFB6; border:none; visibility:hidden;" disabled="true" required>
                      <br>
                      <hr>
                      <button type="Submit" id="ExportarXLS" class="col button button-small" name="ExportarXLS">EXPORTAR</button>
                    </center>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Login Screen -->
        <!-- <div class="login-screen" id="my-login-screen">
      <div class="view">
        <div class="page">
          <div class="page-content login-screen-content">
            <div class="login-screen-title">Login</div>
            <div class="list">
              <ul>
                <li class="item-content item-input">
                  <div class="item-inner">
                    <div class="item-title item-label">Username</div>
                    <div class="item-input-wrap">
                      
                      <input type="text" name="username" placeholder="Your username"/>
                    </div>
                  </div>
                </li>
                <li class="item-content item-input">
                  <div class="item-inner">
                    <div class="item-title item-label">Password</div>
                    <div class="item-input-wrap">
                      
                      <input type="password" name="password" placeholder="Your password"/>
                    </div>
                    </div>
                </li>
              </ul>
            </div>
            <div class="list">
              <ul>
                <li>
                  
                  <a href="#" class="item-link list-button login-button">Sign In</a>
                </li>
              </ul>
              <div class="block-footer">Some text about login information.<br/>Click "Sign In" to close Login Screen</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
-->
<script>
  function DATES(){
    var x = document.getElementById('opciones').value;

    if(x == 3){
      document.getElementById('desde').disabled = false;
      document.getElementById('desde').style.visibility = 'visible';
      document.getElementById('hasta').disabled = false;
      document.getElementById('hasta').style.visibility = 'visible';
    }else{
      document.getElementById('desde').disabled = true;
      document.getElementById('desde').style.visibility = 'hidden';
      document.getElementById('hasta').disabled = true;
      document.getElementById('hasta').style.visibility = 'hidden';
    }
  }
  function DATES1(){
    var x = document.getElementById('opciones5').value;

    if(x == 3){
      document.getElementById('fdesde').disabled = false;
      document.getElementById('fdesde').style.visibility = 'visible';
      document.getElementById('fhasta').disabled = false;
      document.getElementById('fhasta').style.visibility = 'visible';
    }else{
      document.getElementById('fdesde').disabled = true;
      document.getElementById('fdesde').style.visibility = 'hidden';
      document.getElementById('fhasta').disabled = true;
      document.getElementById('fhasta').style.visibility = 'hidden';
    }
  }
</script>
        <!-- Framework7 library -->
        <script src="framework7/framework7-bundle.min.js"></script>


        <!-- App routes -->
        <script src="js/routes.js"></script>
        <!-- App store -->
        <script src="js/store.js"></script>
        <!-- App scripts -->
        <script src="js/app.js"></script>
        <!-- App methods -->
        <script src="js/methods.js"></script>
</body>

</html>