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

	<title>Mis productos</title>

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
	include_once( "./common_files/header.php" );
	?>
	<!--    <div id="top-brand">
            <a href="/"><img src="img/compramigo_footer.png" alt="Header@2x" width="65"></a>
        </div>
    -->

	<div class="container-full">

		<div class="page-header">
        		</div>
		<div class="row text-center">
		<div class="col-md-1">
    	</div>
    	
    	<div class="col-md-2">
      		<div class="list-group text-left">
        	<a href="mis_compras.php" class="list-group-item" id="btnRegProd">
          	Compras
        	</a>
            <a href="mis_prod.php" class="list-group-item active" id="btnResenasCliente">
            Mis Productos
            </a>
        	<a href="reg_prod.php" class="list-group-item" id="btnPublicacionesCliente">
          	Registrar Producto
        	</a>
        	
      		</div>
    	</div>

    	<div class="col-md-6">  <!-- Publicacion central -->
      	<div class="row">
            <?php
            if(isset($_SESSION['modi']))
                {
                    echo '<div class="alert alert-success"><strong>'.$_SESSION['modi'].'</strong> Se modificó correctamente.</div>';
                    unset($_SESSION['modi']);
                }
                if(isset($_SESSION['registro']))
                {
                    echo '<div class="alert alert-success"><strong>'.$_SESSION['registro'].'</strong> Se registró correctamente.</div>';
                    unset($_SESSION['registro']);
                }
                
            ?>
        <div class="panel panel-default text-left">
        <div class="panel-body" id="subContenedor">
        
        <div class="row">
                <div class="col-md-3"><h3 style="color: #2C3032;"></h3></div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
        </div>
       <?php
            include('showProducts.php');
        ?>


        </div>
        </div>
        </div>
    	</div> <!--Termina Publicacion central -->
    	</div>

	</div>
</div>






<?php
include_once( "./common_files/footer.php" );
?>

</body>
</html>