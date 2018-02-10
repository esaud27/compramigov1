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
	<link rel="stylesheet" type="text/css" href="producto.css">
	

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
	<link href="./galery/carrucel.css" rel="stylesheet">
	<script type="text/javascript" src="galery/js/jssor.slider.min.js"></script>
	<script type="text/javascript" src="./galery/carrucel.js"></script>



	<?php
	include_once( "common_files/header.php" );
	?>

	<div class="container-full">
	<div class="btn-group-vertical" role="group" aria-label="...">

	</div>	
			<!--<div><a  class="mediano" href="index.php" style="color: #2C3032;">Regresar</a><br></div>-->
			<div class="col-md-4 inline-block">
				<br>
				<br>
			</div>
			
	<?php
	
			$idp=$_GET['var'];
			$consulta='select * from producto where id='.$idp;

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
			        $consultaImg='select i.src as src from imagen_producto ip,imagen i where ip.id_producto='.$row['id'].' and ip.id_imagen=i.id';
			        $resImg=$db->query($consultaImg);
			        $imagen=$resImg->fetchAll( PDO::FETCH_ASSOC );

			        $consultaDes='select descripcion,caracteristica from caracteristicas where id_producto='.$row['id'];
			        $resDes=$db->query($consultaDes);
			        $rowDes=$resDes->fetchAll();

			        $consulta2='select Nombre from usuario where id='.$row['id_vendedor'];
			       	$resVendedor=$db->query($consulta2);
			       	$rowVendedor=$resVendedor->fetchAll();
			        //$row["id"]=$idp;
			        //$idp=$_GET['var'];
			       
			        echo'
			        <div class="container todo">
		<div class="btn-group-vertical" role="group" aria-label="...">
		</div>	
		<div class="row">		

			<div class="col-md-6">
				<!--
				<a href="#"><img src="img/pruebaproductos/monitor.jpg" style="border-radius: 5px 5px 0px 0px; width:100%;"/></a>
				-->

				<div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 825px; height: 480px; overflow: hidden; visibility: hidden; background-color: #FFFFFF;">
				        <!-- Loading Screen -->
				        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
				            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
				            <div style="position:absolute;display:block;background:url("galery/img/loading.gif") no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
				        </div>
				        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 105px; width: 720px; height: 480px; overflow: hidden;">
				            
				                ';

				                foreach ($imagen as $rowImg) {
				                	echo '<div data-p="150.00" style="display: none;">';
				                	echo '<img data-u="image" src="'.$rowImg['src'].'" />';
				                	echo '<img data-u="thumb" src="'.$rowImg['src'].'" />';
									echo '</div>';
				                }
				                
				            
				  echo '</div>
				        <!-- Thumbnail Navigator -->
				        <div data-u="thumbnavigator" class="jssort01-99-66" style="position:absolute;left:0px;top:0px;width:105px;height:480px;" data-autocenter="2">
				            <!-- Thumbnail Item Skin Begin -->

				            <div data-u="slides" style="cursor: default;">
				                <div data-u="prototype" class="p">
				                    <div class="w">
				                        <div data-u="thumbnailtemplate" class="t"></div>
				                    </div>
				                    <div class="c"></div>
				                </div>
				            </div>
				            <!-- Thumbnail Item Skin End -->
				        </div>
				        <!-- Arrow Navigator -->
			    	</div>
				<br>
				<br>
			</div>

			<div class="col-md-1"></div>

			<div class="col-md-5">
				<div class="page-header" >
			    	<h2 >'.$row['nombre'] .'</h2>
					Vendedor: <a href="#">'.$rowVendedor[0]['Nombre'].'</a>
				</div>
			    <h2>
			    	Precio: 
				   	<span class="label label-success">$'.$row['precio'].'.00 </span>
				</h2>
				<br>
				<br>	
			    <h3>Existencia: </h3>
			    <strong> 1 </strong>
		    </div>
		</div>	
		<div class="row">
			<div class="col-lg-12">
				<h3 class="descripcion">Descripcción</h3>
				<p class="contenido">'.$rowDes[0]['descripcion'].'</p>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<h3 class="caracteristicas">Caracteristicas</h3>
				<p class="contenido">'.$rowDes[0]['caracteristica'].'</p>
			</div>
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


<script>
    jssor_1_slider_init();
</script>
<?php
include_once( "./common_files/footer.php" );
?>

</body>
</html>