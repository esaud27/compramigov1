<?php
include_once( "baseConexion.php" );
session_start();

$nombre=$_POST['nombre'];
$precio=$_POST['precio'];
$descuento=$_POST['descuento'];
$cantidad=$_POST['cantidad'];
$categoria=$_POST['categoria'];
$caracteristicas=$_POST['caracteristicas'];
$descripcion=$_POST['descripcion'];
$descripcionIMG=$_POST['descripcionIMG'];

$nick=$_SESSION['id'];//id del usuario leonardo-- $_SESSION['idUsuario']


	$db = conectaUTF();
	
	try {  
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->beginTransaction();

		$consulta="insert into producto (id_vendedor,nombre,precio,cantidad,descuento,activo) values ('".$nick."','".$nombre."',".$precio.",".$cantidad.",".$descuento.",1)";
		$res=$db->exec($consulta);
		$idProducto = $db->lastInsertId();
        
        if($_FILES['archivo']['error'][0]==0 || $_FILES['archivo']['error'][1]==0 || $_FILES['archivo']['error'][2]==0)
        {
    		# se recorren los archivos subidos count($_FILES["archivo"]["name"])
			for($i=0;$i<3;$i++)
    		{
                if($_FILES['archivo']['error'][$i]==0)
                {
    			# verificar si es un formato valido  
                    if($_FILES["archivo"]["type"][$i]=="image/jpeg" || $_FILES["archivo"]["type"][$i]=="image/pjpeg" || $_FILES["archivo"]["type"][$i]=="image/gif" || $_FILES["archivo"]["type"][$i]=="image/png")
                    {
            			$prefijo1 = substr( md5(uniqid(rand())), 0, 6 );
            			$prefijo2 = substr( md5(uniqid(rand())), 0, 6 );
    					$destino="img/productos/".$prefijo1.'_'.$prefijo2.$_FILES["archivo"]["name"][$i];
                       // echo $destino;
                		$imgFile=$_FILES["archivo"]["tmp_name"][$i];
                		if(@move_uploaded_file($imgFile, $destino))
                		{
                           
                    		$des=$descripcionIMG[$i];
                    		$consulta="insert into imagen(descripcion,src) values ('".$des."','".$destino."')";
    						$res=$db->exec($consulta);
    						$idImagen = $db->lastInsertId();
    						$consulta="insert into imagen_producto(id_imagen,id_producto) values ('".$idImagen."','".$idProducto."')";
    						$res=$db->exec($consulta);
    					}
                		else
                		{
                			echo '<div class="alert alert-warning"><strong>Imagen</strong> No se ha podido mover el archivo: '.$_FILES["archivo"]["name"][$i].'.</div>';
                			return;
                		}
                    }
                }
                else
                {
                    switch ($_FILES['archivo']['error'][$i]) {
                    case 1:
                    echo '<div class="alert alert-warning"><strong>'.$_FILES["archivo"]["name"][$i].'</strong> Excede el tamaño maximo permitido.</div>';
                    return;
                    break;
                    case 2:
                    echo '<div class="alert alert-warning"><strong>'.$_FILES["archivo"]["name"][$i].'</strong> El archivo subido excede la directiva MAX_FILE_SIZE especificada en el formulario HTML.</div>';
                    return;
                    break;
                    case 3:
                    echo '<div class="alert alert-warning"><strong>'.$_FILES["archivo"]["name"][$i].'</strong> Se subio parcialmente.</div>';
                    return;
                    break;
                    case 6:
                    echo '<div class="alert alert-warning"><strong>Error: </strong> Carpeta destino no encontrada.</div>';
                    return;
                    break;
                    default:
                    # code...
                    break;
                    }
                }
    		}
		}
        else
        {
            for($i=0;$i<3;$i++)
            {
                 switch ($_FILES['archivo']['error'][$i]) {
                    case 1:
                    echo '<div class="alert alert-warning"><strong>'.$_FILES["archivo"]["name"][$i].'</strong> Excede el tamaño maximo permitido.</div>';
                    return;
                    break;
                    case 2:
                    echo '<div class="alert alert-warning"><strong>'.$_FILES["archivo"]["name"][$i].'</strong> El archivo subido excede la directiva MAX_FILE_SIZE especificada en el formulario HTML.</div>';
                    return;
                    break;
                    case 3:
                    echo '<div class="alert alert-warning"><strong>'.$_FILES["archivo"]["name"][$i].'</strong> Se subio parcialmente.</div>';
                    return;
                    break;
                    case 6:
                    echo '<div class="alert alert-warning"><strong>Error: </strong> Carpeta destino no encontrada.</div>';
                    return;
                    break;
                    default:
                    # code...
                    break;
                    }
            }
            return;
        }

		$consulta="INSERT INTO caracteristicas (id_producto,caracteristica,descripcion) VALUES('".$idProducto."','".$caracteristicas."','".$descripcion."')";
		$res=$db->exec($consulta);
		$consulta="INSERT INTO tag_producto (id_tag, id_producto) VALUES('".$categoria."','".$idProducto."')";
		$res=$db->exec($consulta);

  		$db->commit();
  		echo 'OK';
        $_SESSION['registro']=$nombre;
  
	} catch (Exception $e) {
  		$db->rollBack();
  		echo '<div class="alert alert-danger"><strong>Fallo: </strong>'.$e->getMessage().'</div>';
  		return;
	}

	$db = null;
?>