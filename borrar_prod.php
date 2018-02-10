<?php
include_once( "baseConexion.php" );
$id=$_POST['id'];

	$db = conectaUTF();
	try {  
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->beginTransaction();	

		$consulta="select i.src,i.id from imagen i,imagen_producto ip where i.id=ip.id_imagen and ip.id_producto=".$id;
		$res=$db->query($consulta);
		foreach ($res->fetchAll(PDO::FETCH_ASSOC) as $row)
		{
			$src[]=$row['src'];
			$consulta="delete from imagen where id=".$row['id'];
			$res=$db->exec($consulta);
		}


		$consulta="delete from producto where id=".$id;
		$res=$db->exec($consulta);	
		$consulta="delete from imagen_producto where id_producto=".$id;
		$res=$db->exec($consulta);
		$consulta="delete from tag_producto where id_producto=".$id;
		$res=$db->exec($consulta);
		$consulta="delete from preguntas where id_producto=".$id;
		$res=$db->exec($consulta);
		$consulta="delete from caracteristicas where id_producto=".$id;
		$res=$db->exec($consulta);

		$db->commit();

		foreach ($src as $key => $value) {
			unlink ($value); 
		}
		
		} catch (Exception $e) {
  		$db->rollBack();
  		echo '<div class="alert alert-danger"><strong>Fallo: </strong>'.$e->getMessage().'</div>';
  		return;
	}
	$db = null;

?>