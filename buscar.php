<?php
	ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();


	function srcImagen($db, $idProducto)
	{
		$query = "select src from imagen WHERE id = ( 
			select id_imagen from imagen_producto where id_producto = :idProducto limit 0,1)";
		$res = $db->prepare($query);
		$res->bindParam( ':idProducto', $idProducto, PDO::PARAM_INT );
		$res->execute();

		foreach ( $res->fetchAll(PDO::FETCH_ASSOC) as $row) {
    		return ( $row['src'] );
    	}

	}


	$dns = 'mysql:host=localhost;dbname=compramigov2';
	$username = 'root';
	$password = '';
	$opciones = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' ); 

    
	try {
    	$db = new PDO( $dns, $username, $password, $opciones );
		if ( !isset($_GET['query']) ){
			throw new Exception("Error en la busqueda", 1);			
		}

		$busqueda = $_GET['query'];

		if ( !isset($_GET['pagina']) ){
			$pagina  = 1;			
		}


		// echo $busqueda."<br>";
		// echo $pagina."<br>";
		$res = $db->prepare( "
					select 
						producto.id as pid,
						producto.nombre as pnombre,
						producto.precio as pprecio,
						producto.descuento as pdescuento,
		
						MATCH(producto.nombre) AGAINST ( :busqueda ) as ppnombre,
					    MATCH (caracteristicas.caracteristica) AGAINST( :busqueda ) as ppcaracteristica
					FROM producto
					LEFT JOIN   caracteristicas  ON producto.id = caracteristicas.id_producto
					WHERE 
						  producto.activo = 1 AND
					      ( MATCH(producto.nombre) AGAINST ( :busqueda )
					       OR MATCH (caracteristicas.caracteristica) AGAINST( :busqueda ) )
					ORDER BY greatest( ppnombre, ppcaracteristica) "  );
		$res->bindParam( ':busqueda', $busqueda, PDO::PARAM_STR );
		$res->execute();


		$num_total_registros = $res->rowCount();
		$tam_pagina = 10;
		$max_num_pag = ceil( $num_total_registros / $tam_pagina );

		$limiteI = ($pagina-1)*$tam_pagina;
		$limiteF = ($pagina)*$tam_pagina;


		$res = $db->prepare( "
					select 
						producto.id as pid,
						producto.nombre as pnombre,
						producto.precio as pprecio,
						producto.descuento as pdescuento,
						caracteristicas.caracteristica as pcaracteristicas,
		
						MATCH(producto.nombre) AGAINST ( :busqueda ) as ppnombre,
					    MATCH (caracteristicas.caracteristica) AGAINST( :busqueda ) as ppcaracteristica
					FROM producto
					LEFT JOIN   caracteristicas  ON producto.id = caracteristicas.id_producto
					WHERE 
						  producto.activo = 1 AND
					      ( MATCH(producto.nombre) AGAINST ( :busqueda )
					       OR MATCH (caracteristicas.caracteristica) AGAINST( :busqueda )

					       )
					ORDER BY greatest( ppnombre, ppcaracteristica)  LIMIT :limiteI , :limiteF"  );
		$res->bindParam( ':busqueda', $busqueda, PDO::PARAM_STR );
		$res->bindParam( ':limiteI', $limiteI, PDO::PARAM_INT );
		$res->bindParam( ':limiteF', $limiteF, PDO::PARAM_INT );
		$res->execute();


		$productosPagina = $res->fetchAll(PDO::FETCH_ASSOC);

    	foreach ( $productosPagina as $row) {
    		$row[ 'psrc' ] = srcImagen($db,$row['pid']);
    		//print_r( $row );
    	}
    	//print_r( $productosPagina );


	} catch (Exception $e) {
		print_r( $e )		;
	}
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
	

	<title>Busqueda</title>

	<?php
	include_once("./common_files/css_files.php")
	?>


	<!-- Custom styles for this template -->
	<link href="./css/signin.css" rel="stylesheet">
	
	<link href="./css/sticky-footer.css" rel="stylesheet">

	<link href="./css/producto.css" rel="stylesheet">

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
		<?php
		printf( '<h1 id="thumbnails" class="page-header">Resultados de busqueda: <small><strong>%s</strong></small></h1>', $busqueda );

		$ban = false;
		printf('<div class="row">');
		foreach ( $productosPagina as $row) {
			$ban = true;
    		$row[ 'psrc' ] = srcImagen($db,$row['pid']);
			printf( 
				'<div class="col-sm-6 col-md-4">
				    <div class="thumbnail">
				      <img src="%s" alt="..." class="img-responsive" alt="Responsive image">
				      <div class="caption">
				        <h3>
				        	<a href="#">%20s </a>
				        	<span class="label label-success precio-content">$ %.2f</span>
				        </h3>
				        <p>%.97s...</p>
				        
				      </div>
				    </div>
				</div> ',  $row['psrc'],  $row['pnombre'], floatval($row['pprecio']), $row['pcaracteristicas']);

    	}
		printf('</div>');

    	if ( $ban == false ) {
    		printf( '<blockquote style="border-left-color:#ce4844"><p>No se encuentran coincidencias con su búsqueda</p></blockquote>' );
    	}
		?>
		<div class="row">
			
			

		</div>
	</div>
</div>

<?php
include_once( "./common_files/footer.php" );
?>

</body>
</html>