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

	<title>Conócenos</title>

	<?php
	include_once("./common_files/css_files.php")
	?>


	<!-- Custom styles for this template -->
	<link href="./css/signin.css" rel="stylesheet">
	<link href="./css/sticky-footer.css" rel="stylesheet">
    <link href="./css/misCss.css" rel="stylesheet">
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
        	<a href="#" class="list-group-item" id="btnRegProd">
          	Compras
        	</a>
            <a href="mis_prod.php" class="list-group-item" id="btnResenasCliente">
            Mis Productos
            </a>
        	<a href="reg_prod.php" class="list-group-item active" id="btnPublicacionesCliente">
          	Registrar Producto
        	</a>
        	
      		</div>
    	</div>

    	<div class="col-md-6">  <!-- Publicacion central -->
        <div class="row">
        <div class="panel panel-default text-left">
        <div class="panel-body" id="subContenedor">
        
        <h3>CONÓCENOS</h3><br><br>
        
        <p><b>¿Quiénes somos?</b></p>
        
        <p align="justify"><img src="computers.jpg" width=270 height=150 style="float:right; margin-left:5px"></img>
        	 Somos un equipo estudiantil de séptimo semestre en la carrera de Ingeniería en Computación, que implementa como proyecto de semestre las soluciones a la necesidad de vender y comprar productos dentro de la sociedad estudiantil.
        </p><br><br><br>
        
        <p><b>¿Qué es ComprAmigo?</b></p>
        <p align="justify"><img src="logo.jpg" width=270 height=150 style="float:left; margin-right:5px"></img>
        	 ComprAmigo es un espacio diseñado para la venta y compra de productos múltiples de diversas categorías, en el cuál los estudiantes pueden comprar artículos por empresas externas a la universidad o productos de otros estudiantes. Siendo su única y principal plataforma <a href="url">compramigo.mx</a></p>
        
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

<script>

function enviarForm(){
	var idProducto='';

	var nombre= $("#nombre").val();
  	var precio= $("#precio").val();
  	var descuento= $("#descuento").val();
  	var cantidad= $("#cantidad").val();
  	var categoria=document.getElementById("categoria").value;
  	var caracteristicas=$("#caracteristicas").val();
  	var descripcion=$("#descripcion").val();
  	var archivo=document.getElementsByName("archivo");

  	if(nombre==""||precio==""||cantidad==""||descuento==""||caracteristicas==""||descripcion=="" )
	    document.getElementById('mensajes').innerHTML="<div class='alert alert-info'><strong>Lo sentimos.</strong>No se ha podido completar la acción. Faltan uno o más campos</div>";
  	else if(isNaN(precio) || isNaN(descuento)||isNaN(cantidad))
	    document.getElementById('mensajes').innerHTML="<div class='alert alert-info'><strong>Valor inválido.</strong>El precio,descuento o cantidad no puede contener caracteres distintos de números o un punto</div>";
  	else{

	var campos = {
		"nombre" : $("#nombre").val(),
		"precio" : $("#precio").val(),
		"descuento" : $("#descuento").val(),
		"cantidad" : $("#cantidad").val(),
		"categoria" : $("#categoria").val(),
		"caracteristicas" : $("#caracteristicas").val(),
		"descripcion" : $("#descripcion").val()
	};
	var data = new FormData($("formulario")[0]);
    var ruta = "reg_prod_res.php";
	$.ajax({
    	url: ruta,
        type:"POST",
        data:campos,
        success: function(datos)
        {
        	idProducto=datos;
        	console.log('id '+datos);
        	if(datos=='ERROR')
        		document.getElementById('mensajes').innerHTML="<div class='alert alert-danger'><strong>Lo sentimos.</strong>Ha ocurrido un error</div>";
        	else if( ! isNaN(datos))
        	{
        		document.getElementById('mensajes').innerHTML="<div class='alert alert-success'><strong>Enhorabuena!! </strong>Registraste exitosamente un producto</div>";
                $("#subContenedor").load("reg_prodImg.php",{ idProducto : idProducto });
                //location.href="reg_prodImg.php";
        	}
        	else
        		document.getElementById('mensajes').innerHTML=datos;	
        }
    });
	

	}
	/*
	var formData = new FormData($("#formulario")[0]);
    var ruta = "reg_prod_res.php";
            $.ajax({
                url: ruta,
                type: "POST",
                data: formData ,
                contentType: false,
                processData: false,
                success: function(datos)
                {
                    $("#mensajes").html(datos);
                }
            });
*/
}

</script>
</body>
</html>
