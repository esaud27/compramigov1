<?php
/**
 * Created by PhpStorm.
 * User: Antonio
 * Date: 22/11/2015
 * Time: 08:39 PM
 */
?>

<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Iniciar sesión</title>

    <?php
        include_once("./common_files/css_files.php")
    ?>


    <!-- Custom styles for this template -->
    <link href="./css/signin.css" rel="stylesheet">
    <link href="./css/sticky-footer.css" rel="stylesheet">

</head>

<body>
<div id="wrapper">

    <?php
        include_once( "common_files/header.php" );
    ?>
    <!--    <div id="top-brand">
            <a href="/"><img src="img/compramigo_footer.png" alt="Header@2x" width="65"></a>
        </div>
    -->
    <div class="container" >

        <form class="form-signin"  method="post" action="./scripts/login.php" >
            <h2 class="form-signin-heading">Iniciar sesión</h2>
            <br>

            <?php
            if ( isset($_GET['error'])  ) {
                echo ' <div class="alert alert-danger text-center" role="alert">Correo electrónico y/o contraseña incorrectos</div> ';
            }
            ?>

            <div class="margin-bottom">
                <label for="inputEmail" >Correo electrónico</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="Correo electrónico" required autofocus name="user">
                <br>
                <label for="inputPassword" >Contraseña</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required name="pass">
                <br>
            </div>

            <!-- Remember an account
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            -->
            <button class="btn btn-lg btn-primary btn-block" type="submit">Acceder</button>
            <div class="checkbox">
                <p class="text-center">
                    <small><a href="login.html" class="text-center">¿Olvidaste tu contraseña? </a></small>
                </p>
            </div>

            <div class="form-control-static">
                <p class="text-center">
                    ¿Eres nuevo en  ComprAmigo? <a href="signup.php">¡Registrate!</a>
                </p>
            </div>
        </form>
    </div> <!-- /container -->

</div>

<?php
include_once( "./common_files/footer.php" );
?>

</body>
</html>
