<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>ComprAmigo/Registro</title>
     <?php
        include_once("./common_files/css_files.php")
    ?>

    <!-- Custom styles for this template -->
    <LINK href="css.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="./css/signin.css" rel="stylesheet">
    <link href="./css/sticky-footer.css" rel="stylesheet">

    <script src="js/prototype.js" type="text/javascript"></script>
    <script type="text/javascript" src="jquery-1.3.2.js"></script>
    <!-- script para la validación de usuarios-->
    <script type="text/javascript">
            $(document).ready(function() {  
              $('#InputUserName').blur(function(){
                
                $('#Info').html('<img src="loader.gif" alt="" />').fadeOut(1000);

                var username = $(this).val();   
                var dataString = 'InputUserName='+username;
                
                $.ajax({
                        type: "POST",
                        url: "common_files/check_username_availablity.php",
                        data: dataString,
                        success: function(data) {
                    $('#Info').fadeIn(1000).html(data);
                    //alert(data);
                        }
                    });
                });              
            });    
    </script>

    <!-- script para validacion de correo-->
    <script type="text/javascript">
            $(document).ready(function() {  
              $('#InputEmail').blur(function(){
                
                $('#Info2').html('<img src="loader.gif" alt="" />').fadeOut(1000);

                var username = $(this).val();   
                var dataString = 'InputEmail='+username;
                
                $.ajax({
                        type: "POST",
                        url: "common_files/check_email_availablity.php",
                        data: dataString,
                        success: function(data) {
                    $('#Info2').fadeIn(1000).html(data);
                    //alert(data);
                        }
                    });
                });              
            });    
    </script>

  <!-- script para la validación de password-->
    <script type="text/javascript">
        $(document).ready(function() {
  //variables
  var pass1 = $('[name=InputPassword0]');
  var pass2 = $('[name=InputPassword1]');
  var confirmacion = "Las contraseñas si coinciden";
  //var longitud = "La contraseña debe estar formada entre 6-10 carácteres (ambos inclusive)";
  var negacion = "No coinciden las contraseñas";
  var vacio = "La contraseña no puede estar vacía";
  //oculto por defecto el elemento span
  var span = $('<span></span>').insertAfter(pass2);
  span.hide();
  //función que comprueba las dos contraseñas
  function coincidePassword(){
  var valor1 = pass1.val();
  var valor2 = pass2.val();
  //muestro el span
  span.show().removeClass();
  //condiciones dentro de la función
  if(valor1 != valor2){
  span.text(negacion).addClass('negacion'); 
  }
  if(valor1.length==0 || valor1==""){
  span.text(vacio).addClass('negacion');  
  }
  if(valor1.length!=0 && valor1==valor2){
  span.text(confirmacion).removeClass("negacion").addClass('confirmacion');
  }
  }
  //ejecuto la función al soltar la tecla
  pass2.keyup(function(){
  coincidePassword();
  });
});
    </script>
  <!-- script para validación de email-->
    <script type="text/javascript">
        $(document).ready(function() {
  //variables
  var pass1 = $('[name=InputEmail]');
  var pass2 = $('[name=InputReEmail]');
  var confirmacion = "Email correcto";
  
  var negacion = "Email incorrecto";
  var vacio = "El email no puede estar vacía";
  //oculto por defecto el elemento span
  var span = $('<span></span>').insertAfter(pass2);
  span.hide();
  //función que comprueba las dos email
  function coincideEmail(){
  var valor1 = pass1.val();
  var valor2 = pass2.val();
  //muestro el span
  span.show().removeClass();
  //condiciones dentro de la función
  if(valor1 != valor2){
  span.text(negacion).addClass('negacion'); 
  }
  if(valor1.length==0 || valor1==""){
  span.text(vacio).addClass('negacion');  
  }
  
  if(valor1.length!=0 && valor1==valor2){
  span.text(confirmacion).removeClass("negacion").addClass('confirmacion');
  }
  }
  //ejecuto la función al soltar la tecla
  pass2.keyup(function(){
  coincideEmail();
  });
});
    </script>
               
    </head>
<body>

<?php
include('common_files/header.php');
?>

<div class="container-full">

            <div class="row">
                <div class="col-md-4 text-center">
                    
                </div>
                <div class="col-md-4 text-center" style="border-style: groove; border-radius: 5px 5px 5px 5px; border-color: #D8DBD7; border-width: 1px;">
                    <h2 class="text-left">Registrar</h2>
                    <form method="post" action="insertar.php">  
                        <div class="form-group">
                      <h5 class="text-left">Nombre:</h5>
                      <input type="name" class="form-control" name="InputFirstName" id="InputFirstName" placeholder="Nombre" required>
                      </div>
                      <div class="form-group">
                      <h5 class="text-left">Apellido:</h5>
                        <input type="name" class="form-control" name="InputLastName" id="InputLastName" placeholder="Apellido"required>
                      </div>
                      <div class="form-group">
                      <h5 class="text-left">Correo Electrónico:</h5>
                        <input type="email" class="form-control" name="InputEmail" id="InputEmail" placeholder="Correo Electrónico"required>
                        <div id="Info2"> </div>
                      </div>
                      <div class="form-group">
                      <h5 class="text-left">Confirmar Correo:</h5>
                        <input type="email" class="form-control" name="InputReEmail" id="InputReEmail" placeholder="Confirma tu Correo"required>
                      </div>
                      <div class="form-group">
                      <h5 class="text-left">Contraseña:</h5>
                        <input type="password" class="form-control" name="InputPassword0" id="InputPassword0" placeholder="Contraseña" required>
                      </div>
                      <div class="form-group">
                      <h5 class="text-left">Confirmar Contraseña:</h5>
                        <input type="password" class="form-control" name="InputPassword1" id="InputPassword1" placeholder="Confirma tu Contraseña" required>
                      </div>
                      <button type="submit" class="btn btn-default btn-lg btn-block" style="background-color:rgb(55, 60, 114);; color: white;">Registrate!                             </button>
                      <p style="color: #aaa8aa;">Para registrarte te recomendamos leer nuestras politicas.</p>
                    </form>
                    <h4 style="color: #aaa8aa;">Tienes alguna cuenta ? <a href="login.php">Acceder</a></h4>
                </div>
                <div class="col-md-4 text-center">
                </div>
            </div>
            <hr>
</div>
<?php
include('common_files/footer.php');
?>
</body>
</html>