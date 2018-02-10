<?php
session_start();
session_destroy();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>
<?php
if(@$_GET["cerrar"])
{
	session_unset('usuario');
	
	header("location: index.php");
}
if(!empty($_SESSION['usuario']))
{
	?>
    <a href="index.php?cerrar=session">Cerrar session(<?php echo $_SESSION['usuario']; ?>)</a>
	<?php

}else
header("location: index.php");
//echo "Acceso ";
?>
</body>
</html>