<?php
sleep(1);
include('dbcon.php');
if($_REQUEST)
{
	$username 	= $_REQUEST['InputEmail'];
	$query = "SELECT * FROM usuario WHERE Email = '".strtolower($username)."'";
	$results =mysqli_query($link, $query);
	
	if ($result = mysqli_query($link, $query)) {
    		if (mysqli_num_rows($result)>0) {
    			 while($row=mysqli_fetch_array($result)){
                    echo '<div id="Error">Correo ya registrado</div>';
                }
    		}
    		else{
    				//echo "nada nada nada ";
    			echo '<div id="Success">Email Disponible</div>';
    		}
    		/* free result set */
    	   mysqli_free_result($result);
        }
	
}?>