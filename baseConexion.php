<?php
	function conectaUTF()
	{
		$dns = 'mysql:host=localhost;dbname=compramigov2';
		$username = 'root';
		$password = '';
		$opciones = array(
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
		); 
		try {
			$db = new PDO( $dns, $username, $password,$opciones);
			return $db;
		} catch (PDOException $e) {
			echo '<div class="alert alert-danger"><strong>Fallo: </strong>'.$e->getMessage().'</div>';
			die();
		}
	}

?>