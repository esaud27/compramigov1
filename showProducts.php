<?php
include_once( "baseConexion.php" );
$idUsuario=$_SESSION['id'];
$consulta='select * from producto where id_vendedor='.$idUsuario;


    $db = conectaUTF();

    $res=$db->query($consulta);

    foreach ($res->fetchAll(PDO::FETCH_ASSOC) as $row) {
        $consultaImg='select i.src from imagen_producto ip,imagen i where ip.id_producto='.$row['id'].' and ip.id_imagen=i.id';
        $resImg=$db->query($consultaImg);
        $rowImg=$resImg->fetchAll();

        $consultaDes='select descripcion from caracteristicas where id_producto='.$row['id'];
        $resDes=$db->query($consultaDes);
        $rowDes=$resDes->fetchAll();
        echo'
        <div class="row">
        <hr>
            <div class="col-md-3">
                <a href="" onclick="MyFunction('.$row['id'].');return false;"><h4>'.$row['nombre'] .'</h4></a>
                <p style="color: black;">Precio: $'.$row['precio'].'</p>
            </div>
            <div class="col-md-3">
                <img class="img-responsive" src="'.$rowImg[0]['src'].'" style="border-radius: 5px 5px 0px 0px; width:100%;"/>
            </div>
            <div class="col-md-3">    
                <h4>Descripcion:</h4>
                <p  style="color: black; word-wrap: break-word;">'.$rowDes[0]['descripcion'].'</p>    
            </div>
            <div class="col-md-3">   
                <a href="" class="btn btn-default" onclick="Mod('.$row['id'].');return false;">
                    <i class="fa fa-pencil-square-o text-primary fa-2x" ></i>
                </a>
                <a data-toggle="modal" data-target="#myModal" href="" class="btn btn-default" onclick="Delete('.$row['id'].');return false;">
                    <i class="fa fa-times text-danger fa-2x" ></i>
                </a>
            </div>
            <hr>
        </div>

            


            ';
    }

    echo '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" id="contenidoModelo">
                </div>
            </div>
        </div>';

    $db = null;
   

?>

<script>
function Mod(id)
{
    window.location="mod_prod.php?id="+id;
}
function MyFunction(id)
{
    /*
    url = "files/winedata.csv";
    window.open( url , '_blank','width=350,height=400');
    */

    $( "#contenidoModelo" ).load("modal1.php");  
    /*
//FUNCIONA
    var url = 'mod_prod.php';
    var form = $('<form action="' + url + '" method="post">' +
                 '<input type="text" name="idProducto" value="' + id + '" />' +
                 '</form>');
    $(form).submit();
    */
}
function Delete(id)
{
    $( "#contenidoModelo" ).load("modalDelete.php",{ id:id});

}
</script>