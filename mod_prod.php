<?php
session_start();
include_once( "baseConexion.php" );
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../../favicon.ico">

	<title>Registrar producto</title>

	<?php
	include_once("./common_files/css_files.php")
	?>


	<!-- Custom styles for this template -->
	<link href="./css/signin.css" rel="stylesheet">
	<link href="./css/sticky-footer.css" rel="stylesheet">

    <style type="text/css">
    
    .ImgSubmit{
      width: 120px;height: 120px;
      background: #F5F5F5 url(img/camara.png);
      border: 1px ridge #DADADA;
      margin: 10px;
      display: inline-block;
      cursor: pointer;
      vertical-align: middle;
      position: relative;
      }
    .link{
      display: block;width: 120px;height: 120px;vertical-align: middle;
    }
    .clear{clear:both;}
    .thumb{width: 120px;height: 120px;vertical-align: middle;border: 0;margin: 0;padding:0;}
    .cerrar{
      width: 19px;height: 19px;position: absolute;top: 0;left: 82px;cursor: pointer;overflow: visible;
    }
    .imgText{
      width: 120px;height: 25px;
      border: 1px groove #DADADA;
      padding:0;
      display: inline-block;
      vertical-align: middle;
      position: relative;
      
    }
    td{ text-align: center; }
  </style>
  
</head>

<body>
<div id="wrapper">

	<?php
	include_once( "./common_files/header.php" );
	?>
	<!--    <div id="top-brand">
            <a href="/"><img src="img/compramigo_footer.png" alt="Header@2x" width="65"></a>
        </div>
    -->

	<div class="container-full">

		<div class="page-header">
        		</div>
		<div class="row text-center">
		<div class="col-md-1">
    	</div>
    	
    	<div class="col-md-2">
      		<div class="list-group text-left">
        	<a href="mis_compras.php" class="list-group-item" id="btnRegProd">
          	Compras
        	</a>
            <a href="mis_prod.php" class="list-group-item" id="btnResenasCliente">
            Mis Productos
            </a>
        	<a href="reg_prod.php" class="list-group-item" id="btnPublicacionesCliente">
          	Registrar Producto
        	</a>
        	
      		</div>
    	</div>

      <div class="col-md-6">  <!-- Publicacion central -->
        <div class="row">
          <div class="panel panel-default text-left">
            <div class="panel-body" id="subContenedor">
              <h3>Modificar producto</h3><hr>
              <form method="post" id="formulario" enctype="multipart/form-data"> <!-- FORMULARIO -->

                <?php
                  $idProducto=$_GET['id'];
                  
                  $db=conectaUTF();

                  $consulta='select * from producto where id='.$idProducto;
                  $resProducto=$db->query($consulta);
                  $rowProducto=$resProducto->fetchAll();
                  //var_dump($rowProducto);

                  $consulta='select id_tag from tag_producto where id_producto='.$idProducto;
                  $resTag=$db->query($consulta);
                  $rowTag=$resTag->fetchAll();

                  $consulta='select * from caracteristicas where id_producto='.$idProducto;
                  $resCaracteristicas=$db->query($consulta);
                  $rowCaracteristicas=$resCaracteristicas->fetchAll();

                  $consulta='select i.src,i.id from imagen_producto ip,imagen i where ip.id_producto='.$idProducto.' and ip.id_imagen=i.id';
                  $resImg=$db->query($consulta);
                  $nImg=$resImg->rowCount();
                  $rowImg=$resImg->fetchAll();


                  for($i=0;$i<$nImg;$i++)
                  {
                    $srcs[$i]=$rowImg[$i]['src'];
                    $idsImgs[$i]=$rowImg[$i]['id'];
                  }
                ?>




                <div class="form-group">
                  <label for="ejemplo_password_1">Nombre del producto</label>
                  <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" required value=<?php echo $rowProducto[0]['nombre']; ?>>
                </div>
                <div class="form-group">
                  <label for="ejemplo_password_1">Precio</label>
                  <input type="text" class="form-control" name="precio" id="precio" placeholder="Precio" required value=<?php echo $rowProducto[0]['precio']; ?>>
                </div>
                <div class="form-group">
                  <label for="ejemplo_password_1">Descuento (%)</label>
                  <input type="text" class="form-control" name="descuento" id="descuento" placeholder="Descuento" required value=<?php echo $rowProducto[0]['descuento']; ?>>
                </div>
                <div class="form-group">
                  <label for="ejemplo_password_1">Cantidad</label>
                  <input type="text" class="form-control" name="cantidad" id="cantidad" placeholder="Cantidad" required value=<?php echo $rowProducto[0]['cantidad']; ?>>
                </div>
                <div class="form-group">
                  <label for="ejemplo_password_1">Categor&iacute;a/Tag</label>
                  <select class="form-control" name="categoria" id="categoria">
                    <option value="1" <?php if($rowTag[0]['id_tag']==1) echo 'selected="selected"'; ?> >Electr&oacute;nico</option>
                    <option value="2" <?php if($rowTag[0]['id_tag']==2) echo 'selected="selected"'; ?> >Hogar</option>
                    <option value="3" <?php if($rowTag[0]['id_tag']==3) echo 'selected="selected"'; ?> >Libros</option>
                    <option value="4" <?php if($rowTag[0]['id_tag']==4) echo 'selected="selected"'; ?> >C&oacute;mputo</option>
                    <option value="5" <?php if($rowTag[0]['id_tag']==5) echo 'selected="selected"'; ?> >Otros</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="ejemplo_password_1">Caracter&iacute;sticas</label>
                  <textarea wrap="soft" class="form-control" rows="7" name="caracteristicas" id="caracteristicas" required><?php echo $rowCaracteristicas[0]['caracteristica']; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="ejemplo_password_1">Descripci&oacute;n T&eacute;cnica</label>
                  <textarea wrap="soft" class="form-control" rows="7" name="descripcion" id="descripcion" required><?php echo $rowCaracteristicas[0]['descripcion']; ?></textarea>
                </div>

                <div class="page-header text-left">
                  <label>Agrega fotos o imagenes de tu producto.</label>
                </div>
                
                <center>
                  <table>
                    <tr>
                      <td>
                        <div class="ImgSubmit">
                        <input type='file' name='archivo[]' id="file-0"/>
                        <div id="photo-0" class="link"></div>
                        <div class="cerrar" id="cerrar-0"></div>
                        </div>
                      </td>
                      <td>
                        <div class="ImgSubmit">
                        <input type='file' name='archivo[]' id="file-1" />
                        <div id="photo-1" class="link"></div>
                        <div class="cerrar" id="cerrar-1"></div>
                        </div>
                      </td>
                      <td>
                        <div class="ImgSubmit">
                        <input type='file' name='archivo[]' id="file-2"/>
                        <div id="photo-2" class="link"></div>
                        <div class="cerrar" id="cerrar-2"></div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <input type='text' name='descripcionIMG[]' placeholder='Descripcion' class="imgText">
                      </td>
                      <td>
                        <input type='text' name='descripcionIMG[]' placeholder='Descripcion' class="imgText">
                      </td>
                      <td>
                        <input type='text' name='descripcionIMG[]' placeholder='Descripcion' class="imgText">
                      </td>
                    </tr>
                  </table>
                </center>

                <div class="row" id="mensajes"> <!--Div para alertas -->
                </div>
                <div class="row text-right">
                <div class="col-md-12">
                <div class="page-header text-left separadorBotones">
                </div>
               
                <button type="submit" class="btn btn-success" id="btnAceptar">Guardar</button>
              
                <button type="button" class="btn btn-danger" id="btnCancelar" onclick="window.location.href='index.php'">Cancelar</button>
              
                </div>
                </div>


              </form><!-- FIN FORMULARIO -->
            </div>
          </div>
        </div>
      </div> <!--Termina Publicacion central -->
    	</div>

	</div>
</div>

<?php
include_once( "./common_files/footer.php" );
?>

<script src="js/jquery-2.1.4.js"></script>
<script>

function formValido(){
  var nombre= $("#nombre").val();
  var precio= $("#precio").val();
  var descuento= $("#descuento").val();
  var cantidad= $("#cantidad").val();
  var categoria=document.getElementById("categoria").value;
  var caracteristicas=$("#caracteristicas").val();
  var descripcion=$("#descripcion").val();

  if(nombre==""||precio==""||cantidad==""||descuento==""||caracteristicas==""||descripcion=="" )
  {
    document.getElementById('mensajes').innerHTML="<div class='alert alert-info'><strong>Lo sentimos.</strong>No se ha podido completar la accion.Falta uno o más campos</div>";
    return false;
  }
  else if(isNaN(precio) || isNaN(descuento)||isNaN(cantidad))
  {
    document.getElementById('mensajes').innerHTML="<div class='alert alert-info'><strong>Valor invalido.</strong>El precio,descuento o cantidad no puede contener caracteres distintos de números o un punto.</div>";
    return false;
  }
  return true;
}

$(function(){
        $("#formulario").on("submit", function(e){
          e.preventDefault();
            if(formValido())
            {
               var n=nImgs[0]+nImgs[1]+nImgs[2];
               if(n==0)
               {
                $("#mensajes").html("<div class='page-header text-left separadorBotones'></div><div class='alert alert-info'>Necesita al menos una <strong>imagen</strong> para su producto</div>");
               }
               else
               {
                  var f = $(this);
                  var formData = new FormData(document.getElementById("formulario"));
                  var idP="<?php echo $idProducto; ?>";
                  
                  formData.append("idsImgDelete", deleteImgs); //agregar datos
                  formData.append("idProducto", idP);
                  $.ajax({
                      url: "mod_prod_res.php",
                      type: "post",
                      dataType: "html",
                      data: formData,
                      cache: false,
                      contentType: false,
                      processData: false
                  })
                  .done(function(res){
                    console.log("regresa");
                      if(res=="OK")
                      {
                        console.log("envia a mis_prod");
                        window.location="mis_prod.php";
                      }
                      else
                        $("#mensajes").html("<div class='page-header text-left separadorBotones'></div>"+res);
                  });
                }
            }
        });
    });


  var nImgs=new Array(0,0,0); //guarda que espacio de img ya tiene una imagen
  var idsImgs=<?php echo json_encode($idsImgs);?>;
  var deleteImgs=new Array(); //ids de imagenes a borrar

  $(document).ready(function(){
    var wrapper =$('<div/>').css({height:0,width:0,'overflow':'hidden'});
    var fileInput0=$("#file-0").wrap(wrapper),
        fileInput1=$("#file-1").wrap(wrapper),
        fileInput2=$("#file-2").wrap(wrapper);

    var n="<?php echo $nImg; ?>";
    var src=new Array();
    n=parseInt(n);
    
    var srcs=<?php echo json_encode($srcs);?>;

    for(i=0;i<n;i++){
      
        switch(i)
        {
          case 0:
              $("#photo-0").append("<img src='"+srcs[0]+"' id='thumb-0' class='thumb'/>" );
              $("#cerrar-0").show(function(){
                $("#cerrar-0").append('<a  class="btn btn-default" height="19" width="19" alt="close"><i class="fa fa-times text-danger fa-1x" ></i></a>');
              });
              nImgs[0]=1;
              break;
           case 1:
              $("#photo-1").append("<img src='"+srcs[1]+"' id='thumb-1' class='thumb'/>" );
              $("#cerrar-1").show(function(){
                $("#cerrar-1").append('<a  class="btn btn-default" height="19" width="19" alt="close"><i class="fa fa-times text-danger fa-1x" ></i></a>');
              });
              nImgs[1]=1;
              break;
           case 2:
              $("#photo-2").append("<img src='"+srcs[2]+"' id='thumb-2' class='thumb'/>" );
              $("#cerrar-2").show(function(){
                $("#cerrar-2").append('<a  class="btn btn-default" height="19" width="19" alt="close"><i class="fa fa-times text-danger fa-1x" ></i></a>');
              });
              nImgs[2]=1;
              break;
          default:console.log('default switch');
            break;
        }
      }
         /*     srcsImg[i] = "<?php echo $rowImg["+i+"]['src']; ?>" ;
              $("#photo-0").append("<img src='"+srcImg[i]+"' id='thumb-0' class='thumb'/>" );
              $("#cerrar-0").show(function(){
                $("#cerrar-0").append('<a  class="btn btn-default" height="19" width="19" alt="close"><i class="fa fa-times text-danger fa-1x" ></i></a>');
              });
          */
    $("#photo-0").on("click",function(){
      fileInput0.click();
    }).show();
    $("#photo-1").on("click",function(){
      fileInput1.click();
    }).show();
    $("#photo-2").on("click",function(){
      fileInput2.click();
    }).show();
  
    fileInput0.on("change",function(){
      var file=this.files[0],
      fileName=file.name,
      fileSize=file.size,
      fileType=file.type;
      var ruta=fileInput0.val();

      if(fileType.match("image.*"))
      {
        var reader=new FileReader();
        reader.onload=function(e){
          //$("#resultados").append("<img src='"+e.target.result+"' width='120' height='120'/>" );
          $("#photo-0").html("");
          $("#cerrar-0").html("");
          $("#photo-0").append("<img src='"+e.target.result+"' id='thumb-0' class='thumb'/>" );
          $("#cerrar-0").show(function(){
            $("#cerrar-0").append('<a  class="btn btn-default" height="19" width="19" alt="close"><i class="fa fa-times text-danger fa-1x" ></i></a>');
          });
          nImgs[0]=1;
        }
        reader.readAsDataURL(file);
        if(idsImgs[0]!="")
          //deleteImgs.push(idsImgs[0]);
          deleteImgs[0]=idsImgs[0];
      }
      else
        console.log('y');
    });
    //cerrado de imgenes
    $("#cerrar-0").on("click",function(){
      $("#thumb-0,#cerrar-0").hide();
      fileInput0.replaceWith(fileInput0=fileInput0.val('').clone(true));
      nImgs[0]=0;

      if(idsImgs[0]!="")
        deleteImgs[0]=idsImgs[0];
    });

    fileInput1.on("change",function(){
      var file=this.files[0],
      fileName=file.name,
      fileSize=file.size,
      fileType=file.type;
      var ruta=fileInput1.val();

      if(fileType.match("image.*"))
      {
        var reader=new FileReader();
        reader.onload=function(e){
          //$("#resultados").append("<img src='"+e.target.result+"' width='120' height='120'/>" );
          $("#photo-1").html("");
          $("#cerrar-1").html("");
          $("#photo-1").append("<img src='"+e.target.result+"' id='thumb-1' class='thumb'/>" );
          $("#cerrar-1").show(function(){
            $("#cerrar-1").append('<a  class="btn btn-default" height="19" width="19" alt="close"><i class="fa fa-times text-danger fa-1x" ></i></a>');
          });
          nImgs[1]=1;
        }
        reader.readAsDataURL(file);
        if(idsImgs[1]!="")
        //deleteImgs.push(idsImgs[1]);
        deleteImgs[1]=idsImgs[1];
      }
      else
        console.log('y');
    });
    //cerrado de imgenes
    $("#cerrar-1").on("click",function(){
      $("#thumb-1,#cerrar-1").hide();
      fileInput1.replaceWith(fileInput1=fileInput1.val('').clone(true));
      nImgs[1]=0;
      if(idsImgs[1]!="")
        deleteImgs[1]=idsImgs[1];
    });

    fileInput2.on("change",function(){
      var file=this.files[0],
      fileName=file.name,
      fileSize=file.size,
      fileType=file.type;
      var ruta=fileInput2.val();

      if(fileType.match("image.*"))
      {
        var reader=new FileReader();
        reader.onload=function(e){
          //$("#resultados").append("<img src='"+e.target.result+"' width='120' height='120'/>" );
          $("#photo-2").html("");
          $("#cerrar-2").html("");
          $("#photo-2").append("<img src='"+e.target.result+"' id='thumb-2' class='thumb'/>" );
          $("#cerrar-2").show(function(){
            $("#cerrar-2").append('<a  class="btn btn-default" height="19" width="19" alt="close"><i class="fa fa-times text-danger fa-1x" ></i></a>');
          });
          nImgs[2]=1;
        }
        reader.readAsDataURL(file);
        if(idsImgs[2]!="")
         deleteImgs[2]=idsImgs[2];
      }
      else
        console.log('y');
    });
    //cerrado de imgenes
    $("#cerrar-2").on("click",function(){
      $("#thumb-2,#cerrar-2").hide();
      fileInput2.replaceWith(fileInput2=fileInput2.val('').clone(true));
      nImgs[2]=0;
      if(idsImgs[2]!="")
        //deleteImgs.push(idsImgs[2]);
        deleteImgs[2]=idsImgs[2];
    });

  });

  
</script>
</body>
</html>