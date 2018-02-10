<?php

$consulta='select * from producto where id>40 limit 0,4 ';

$dns = 'mysql:host=localhost;dbname=compramigov2';
$username = 'root';
$password = '';
$opciones = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
); 
try {
    $db = new PDO( $dns, $username, $password,$opciones);

    $res=$db->query($consulta);
    echo '<div class="row">';
    foreach ($res->fetchAll(PDO::FETCH_ASSOC) as $row) {
        $consultaImg='select i.src from imagen_producto ip,imagen i where ip.id_producto='.$row['id'].' and ip.id_imagen=i.id';
        $resImg=$db->query($consultaImg);
        $rowImg=$resImg->fetchAll();

        $consultaDes='select descripcion from caracteristicas where id_producto='.$row['id'];
        $resDes=$db->query($consultaDes);
        $rowDes=$resDes->fetchAll();
        //$row["id"]=$idp;
        //$idp=$_GET['var'];
        $rowID=$row['id'];
        echo'
        
            <div class="col-md-3">
                <a href="mostrar_producto.php?var='.$rowID.'">
                    <img class="img-responsive" src="'.$rowImg[0]['src'].'" style="border-radius: 5px 5px 0px 0px; width:265px; height:200px;"/>
                <div class="col-md-10" style="background-color: #1E90FF; color: #FFFFFF; border-radius: 0px 0px 5px 5px; width:265px; height:180px;">
                    <a href="" onclick="MyFunction('.$row['id'].');return false;">
                    <h3 style="color: #333b59;">'.$row['nombre'] .'</h3></a>
                    <p  style="color: #FFFFFF; word-wrap: break-word; width=60px;" > Descripcion: '.$rowDes[0]['descripcion'].'</p>
                    <h3 style="color: white;" >Precio: $'.$row['precio'].'</h3>
                </div>   
            </div>
        ';      
       
            
    }
    echo '</div>';
    $db = null;
    } catch (PDOException $e) {
        echo '<div class="alert alert-danger"><strong>Fallo: </strong>'.$e->getMessage().'</div>';
    die();
}

?>
<script>
function MyFunction(id)
{

    var url = 'mod_prod.php';
    var form = $('<form action="' + url + '" method="post">' +
                 '<input type="text" name="idProducto" value="' + id + '" />' +
                 '</form>');
    $(form).submit();
}
</script>