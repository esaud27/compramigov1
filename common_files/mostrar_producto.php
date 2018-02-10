<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	

	<title>ComprAmigo</title>

	<?php
	include_once("./common_files/css_files.php")
	?>
	<!-- Custom styles for this template -->
	<link href="./css/signin.css" rel="stylesheet">
	<link href="./css.css" rel="stylesheet">	
	<link href="./css/sticky-footer.css" rel="stylesheet">

</head>

<body>
<div id="wrapper">

	<?php
	include_once( "common_files/header.php" );
	?>

	<div class="container-full">
		
	<div><a  class="mediano" href="index.php" style="color: #2C3032;">Regresar</a><br></div>
	<div class="col-md-2 inline-block"></div>
	<?php
	
			
			$consulta='select * from producto where id=38';
			$dns = 'mysql:host=localhost;dbname=compramigov2';
			$username = 'root';
			$password = '';
			$opciones = array(
			    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
			); 
			try {
			    $db = new PDO( $dns, $username, $password,$opciones);

			    $res=$db->query($consulta);

			    foreach ($res->fetchAll(PDO::FETCH_ASSOC) as $row) {
			        $consultaImg='select i.src from imagen_producto ip,imagen i where ip.id_producto='.$row['id'].' and ip.id_imagen=i.id';
			        $resImg=$db->query($consultaImg);
			        $rowImg=$resImg->fetchAll();

			        $consultaDes='select descripcion from caracteristicas where id_producto='.$row['id'];
			        $resDes=$db->query($consultaDes);
			        $rowDes=$resDes->fetchAll();
			        //$row["id"]=$idp;
			        //$idp=$_GET['var'];
			        echo'

			        <div class="row">
			            <div class="col-md-4 inline-block">
			                <a href="comprar.php?var=">
			                    <img class="img-responsive" src="'.$rowImg[0]['src'].'" style="border-radius: 5px 5px 0px 0px; width:100%;"/>
			                <div class="col-md-10" style="background-color: #FFBF00; color: #FFFFFF; border-radius: 0px 0px 5px 5px;width: 100%">
			                        <a href="" onclick="MyFunction('.$row['id'].');return false;">
			                        <h3>'.$row['nombre'] .'</h3></a>
			                   
			                         <p  style="color: #FFFFFF; word-wrap: break-word; width=50px;" > Descripcion: '.$rowDes[0]['descripcion'].'</p>
			                        <p style="color: white;" >Precio: $'.$row['precio'].'</p>
			                </div>   
			        </div>';
			    }
			    $db = null;
			    } catch (PDOException $e) {
			        echo '<div class="alert alert-danger"><strong>Fallo: </strong>'.$e->getMessage().'</div>';
			    die();
			}
	?>

		</div>

			<?php
	            if (isset($_GET['var'])) {   //verificacion para el inicio de sesión. 
	                //include('./common_files/MakerEducation_log.php');  //si la sesión se ha iniciado se debe mostrar el nton de "Bienvenido".
	            }
	            else{
	                //include('./common_files/MakerEducation.php');  //si la sesión no se ha iniciado mostrar botones de "login" y "sign up".
	            }               
   			 ?>

				<hr>
				
			<?php
	            if (isset($_GET['var'])) {   //verificacion para el inicio de sesión. 
	                //include('./common_files/products_log.php');  //si la sesión se ha iniciado se debe mostrar el boton de "Bienvenido".
	                echo "<br>";
	            }
	            else{
	                //include('./common_files/products.php');  //si la sesión no se ha iniciado mostrar botones de "login" y "sign up".
	            }
               
   			 ?>
   			<br>
			<br>
			
	</div>
</div>

<?php
include_once( "./common_files/footer.php" );
?>

</body>
</html>