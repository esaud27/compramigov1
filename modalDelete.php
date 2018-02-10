<div class="modal-header">
      <a data-dismiss="modal" class="close">×</a>
      <h3>Borrar producto</h3>
</div>
<div class="modal-body">
      <h4>¿Esta seguro de borrar el producto?</h4>
      <?php
      $id=$_POST['id'];
      //$nombre=$_POST['nombre'];
      //echo '<h4>'.$nombre.'</h4>';
      ?>
      <div id="modalMensaje">
      </div>
</div>
<div class="modal-footer">
      <button type="button" class="btn btn-success" id="btnAceptar">Aceptar</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
</div>

<script>
$( "#btnAceptar" ).mousedown(function() {
      var id = "<?php echo $id; ?>" ;
      /*var url = 'borrar_prod.php';
      var form = $('<form action="' + url + '" method="post">' +
                  '<input type="text" name="id" value="' + id + '" />' +
                  '</form>');
      $(form).submit();
      */
      $.ajax({
                url: "borrar_prod.php",
                type: "post",
                dataType: "html",
                data: {id:id},
            })
                .done(function(res){
                    //$("#modalMensaje").html(res);
                    //$('#myModal').modal('hide');
                    location.reload(true);
                });
});
</script>