<?php
session_start();
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
        	<a href="reg_prod.php" class="list-group-item active" id="btnPublicacionesCliente">
          	Registrar Producto
        	</a>
        	
      		</div>
    	</div>

      <div class="col-md-6">  <!-- Publicacion central -->
        <div class="row">
          <div class="panel panel-default text-left">
            <div class="panel-body" id="subContenedor">

              <form method="post" id="formulario" enctype="multipart/form-data"> <!-- FORMULARIO -->

                <div class="form-group">
                  <label for="ejemplo_password_1">Nombre del producto</label>
                  <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" required>
                </div>
                <div class="form-group">
                  <label for="ejemplo_password_1">Precio</label>
                  <input type="text" class="form-control" name="precio" id="precio" placeholder="Precio" required>
                </div>
                <div class="form-group">
                  <label for="ejemplo_password_1">Descuento (%)</label>
                  <input type="text" class="form-control" name="descuento" id="descuento" placeholder="Descuento" required>
                </div>
                <div class="form-group">
                  <label for="ejemplo_password_1">Cantidad</label>
                  <input type="text" class="form-control" name="cantidad" id="cantidad" placeholder="Cantidad" required>
                </div>
                <div class="form-group">
                  <label for="ejemplo_password_1">Categor&iacute;a/Tag</label>
                  <select class="form-control" name="categoria" id="categoria">
                  <option value="1">Electr&oacute;nico</option>
                  <option value="2">Hogar</option>
                  <option value="3">Libros</option>
                  <option value="4">C&oacute;mputo</option>
                  <option value="5">Otros</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="ejemplo_password_1">Caracter&iacute;sticas</label>
                  <textarea wrap="soft" class="form-control" rows="7" name="caracteristicas" id="caracteristicas" required></textarea>
                </div>
                <div class="form-group">
                  <label for="ejemplo_password_1">Descripci&oacute;n T&eacute;cnica</label>
                  <textarea wrap="soft" class="form-control" rows="7" name="descripcion" id="descripcion" required></textarea>
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
               
                <button type="submit" class="btn btn-success" id="btnAceptar">Aceptar</button>
              
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
                  // formData.append("dato", "valor"); //agregar datos
                  $.ajax({
                      url: "reg_prod_res.php",
                      type: "post",
                      dataType: "html",
                      data: formData,
                      cache: false,
                      contentType: false,
                      processData: false
                  })
                  .done(function(res){
                    console.log("entra");
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


  var nImgs=new Array(0,0,0);
  $(document).ready(function(){
    var wrapper =$('<div/>').css({height:0,width:0,'overflow':'hidden'});
    var fileInput0=$("#file-0").wrap(wrapper),
        fileInput1=$("#file-1").wrap(wrapper),
        fileInput2=$("#file-2").wrap(wrapper);

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

      }
      else
        console.log('y');
    });
    //cerrado de imgenes
    $("#cerrar-0").on("click",function(){
      $("#thumb-0,#cerrar-0").hide();
      fileInput0.replaceWith(fileInput0=fileInput0.val('').clone(true));
      nImgs[0]=0;
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

      }
      else
        console.log('y');
    });
    //cerrado de imgenes
    $("#cerrar-1").on("click",function(){
      $("#thumb-1,#cerrar-1").hide();
      fileInput1.replaceWith(fileInput1=fileInput1.val('').clone(true));
      nImgs[1]=0;
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

      }
      else
        console.log('y');
    });
    //cerrado de imgenes
    $("#cerrar-2").on("click",function(){
      $("#thumb-2,#cerrar-2").hide();
      fileInput2.replaceWith(fileInput2=fileInput2.val('').clone(true));
      nImgs[2]=0;
    });

  });

  
</script>
</body>
</html>