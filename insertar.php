<?php
		//conexion a la base de datos 
		$con=mysqli_connect("localhost","root","","compramigov2");
			if (mysqli_connect_errno()) {
				echo "fallo la conexion: %s\n",mysqli_connect_errno();
				exit();
			}
		//obtenemos el valor de los campos del formulario
		
		$password=$_POST['InputPassword0'];
		$password1=$_POST['InputPassword1'];
		$correo=$_POST['InputEmail'];

		$IdCustomer=mysqli_insert_id($con);
		//insertar a la base de datos
		mysqli_query($con,"INSERT INTO usuario (Nombre,Apellidos,Email,Password)VALUES('$_POST[InputFirstName]','$_POST[InputLastName]','$_POST[InputEmail]','$password')");
			
		header("Location:index.php");
		//cerrar la conexion a la base de datos
		mysqli_close($con);	
?>
		

