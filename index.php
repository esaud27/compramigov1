
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

<div class="container">
<div class="btn-group-vertical" role="group" aria-label="...">
</div>


	<div class="row">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
				<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				<li data-target="#carousel-example-generic" data-slide-to="2"></li>

			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
				<div class="item active">

				  <img src="potenciometrosd2.jpg" >
				  <div class="carousel-caption">

				  </div>
				</div>

				<div class="item">
				  <img src="rasberrypi.jpg" >
				  <div class="carousel-caption">

				  </div>
				</div>

				<div class="item">
				  <img src="tarjeta1.jpg" >
				  <div class="carousel-caption">

				  </div>
				</div>

			  </div>

			  <!-- Controls -->
			  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Prev</span>
			  </a>
			  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			  </a>
		</div>
	</div>
			<hr>
				<div class="row">
				<div class="col-md-12 text-center" style="background-color:#E3E3E3;">
					<h2>ComprAmigo</h2>
					<h4>Un espacio de venta y compra en el cual los estudiantes puedan adquirir artículos por empresas externas a la universidad o por ellos mismos
</h4>
					<button type="button" class="btn btn-success">Leer más</button>
					<br><br><br>
				</div>
			</div>
			<hr>

			<hr>
			<div class="row">
			<div class="col-md-6"><h3 style="color: #2C3032;">Productos Electrónicos</h3></div>
			<br><br>
			</div>
			
		<?php
            if (isset($_GET['var'])) {   //verificacion para el inicio de sesión. 
                include('./common_files/MakerEducation_log.php');  //si la sesión se ha iniciado se debe mostrar el nton de "Bienvenido".
            }
            else{
                include('./common_files/productos_electronicos.php');  //si la sesión no se ha iniciado mostrar botones de "login" y "sign up".
            }
           
			 ?>

			<hr>
			<div class="row">
			<br>
			<div class="col-md-3"><h3 style="color: #2C3032;">Otros Productos</h3></div>
			</div>

		<?php
            if (isset($_GET['var'])) {   //verificacion para el inicio de sesión. 
                include('./common_files/products_log.php');  //si la sesión se ha iniciado se debe mostrar el nton de "Bienvenido".
            }
            else{
                include('./common_files/productos_otros.php');  //si la sesión no se ha iniciado mostrar botones de "login" y "sign up".
            }
           
			 ?>
			<br>

			<br>
			<hr>
</div>
</div>

<?php
include_once( "./common_files/footer.php" );
?>

</body>
</html>