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
	<link href="./css/sticky-footer.css" rel="stylesheet">
	<link href="./galery/carrucel.css" rel="stylesheet">
	<link href="./css/producto.css" rel="stylesheet">

</head>

<body>
<div id="wrapper">

	<?php
	include_once( "common_files/header.php" );
	?>

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
				            <div style="position:absolute;display:block;background:url('galery/img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
				        </div>
				        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 105px; width: 720px; height: 480px; overflow: hidden;">
				            <div data-p="150.00" style="display: none;">
				                <img data-u="image" src="galery/img/01.jpg" />
				                <img data-u="thumb" src="galery/img/thumb-01.jpg" />
				            </div>
				            <div data-p="150.00" style="display: none;">
				                <img data-u="image" src="galery/img/09.jpg" />
				                <img data-u="thumb" src="galery/img/thumb-09.jpg" />
				            </div>
				            <div data-p="150.00" style="display: none;">
				                <img data-u="image" src="galery/img/10.jpg" />
				                <img data-u="thumb" src="galery/img/thumb-10.jpg" />
				            </div>
				        </div>
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
			    	<h1 >Monitor mecanico</h1>
					Vendedor: <a href="#">Chapingo</a>
				</div>
			    <h2>
			    	Precio: 
				   	<span class="label label-success">$500.00 </span>
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
				<p class="contenido">monitorrrrrrrr</p>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<h3 class="caracteristicas">Caracteristicas</h3>
				<p class="contenido">sakdlñsdkfñlsdkfñ lsd kfñk sdñfksñd fñlsdk fñlkñsdkfñ</p>
			</div>
		</div>
	</div>
</div>

<?php
include_once( "./common_files/footer.php" );
?>

	
	<script type="text/javascript" src="galery/js/jssor.slider.min.js"></script>
	<script type="text/javascript" src="./galery/carrucel.js"></script>
	<script>
    jssor_1_slider_init();
</script>

</body>
</html>