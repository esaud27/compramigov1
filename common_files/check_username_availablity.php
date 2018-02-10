<?php
sleep(1);
include('dbcon.php');
if($_REQUEST)
{
	$username 	= $_REQUEST['InputUserName'];
	$query = "SELECT * FROM usuario WHERE nombre = '".strtolower($username)."'";
	$results =mysqli_query($link, $query);
	
	if ($result = mysqli_query($link, $query)) {
    		if (mysqli_num_rows($result)>0) {
    			 while($row=mysqli_fetch_array($result)){
                    echo '<div id="Error">User Not Available</div>';
                }
    		}
    		else{
    				//echo "nada nada nada ";
    			echo '<div id="Success">Available</div>';
    		}
    		/* free result set */
    	   mysqli_free_result($result);
        }
	
}?>