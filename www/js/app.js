var $ = Dom7;


var app = new Framework7({
  name: 'SQL Test', // App name
  theme: 'auto', // Automatic theme detection
  el: '#app', // App root element

  view: { stackPages: true },
  // App store
  store: store,
  // App routes
  routes: routes,
});
// Login Screen Demo
$('#my-login-screen .login-button').on('click', function () {
  var username = $('#my-login-screen [name="username"]').val();
  var password = $('#my-login-screen [name="password"]').val();

  // Close login screen
  app.loginScreen.close('#my-login-screen');

  // Alert username and password

});

$(document).on('click', '#Users', function () {
  app.preloader.show();
  setTimeout(function () {
    app.preloader.hide();
  }, 1000);
});

function Loger() {
  $(document).on('click', '#Log', function () {
    app.dialog.preloader('Iniciando Sesion');
    setTimeout(function () {
      app.dialog.close();
    }, 3000);
  });

  setTimeout(function () {
    document.forms[0].submit();
  }, 2999);
}

function errorLogin() {
  setTimeout(function () {
    app.dialog.alert('CONTRASEÑA Y/O USUARIO INCORRECTOS', 'Error');
  }, 1000);
}