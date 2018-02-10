<?php
	$link=mysqli_connect("localhost","root","","compramigov2");
						if (mysqli_connect_errno()) {
							echo "fallo la conexion: %s\n",mysqli_connect_errno();
							exit();
						}
?>