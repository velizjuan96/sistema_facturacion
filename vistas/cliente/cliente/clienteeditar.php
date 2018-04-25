<?php
$id=$_GET['id'];
$nombre="";
$rtn="";
$estado=0;
include($_SERVER['DOCUMENT_ROOT'].'/sistema/modelo/conexion.php');
$db=conexion('root','');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $db->prepare("SELECT *  FROM cliente where id=".$id);
$stmt->execute();
$fila = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);
do{
  $nombre=$fila[1];
  $rtn=$fila[2];
  $diascredito=$fila[3];
  $limitecredito=$fila[4];
  $formapago=$fila[5];
  $estado=$fila[6];
  $direccion=$fila[7];
  $telefono=$fila[8];
  $correo=$fila[9];

}while($fila =$stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_PRIOR))
?>
<div class="container-fluid">
	<ol class="breadcrumb">
		<li><a href="./">Inicio</a></li>
		<li><a class="ajax-request" href="/cliente/cliente/cliente.php">Cliente</a></li>
    <li><a class="active" href="#">Editar Cliente</a></li>
	</ol>
</div>
<div class="container-fluid spark-screen">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Editar Cliente</div>
        <div class="panel-body">
          <div class="col-md-4">
          </div>
          <div class="col-md-4">
            <form method="post" action="categoriaactualizar.php" id="formulario">
              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">Id</label>
                <input type="text" name="id" id="id" required maxlength="255" class="form-control" readonly value="<?php echo $id; ?>"/>
              </div>
              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">nombre</label>
                <input type="text" name="nombre" id="nombre" required maxlength="255" class="form-control"  value="<?php echo $nombre; ?>"/>
              </div>
              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">rtn</label>
                <input type="text" name="rtn" id="rtn" required maxlength="255" class="form-control"  value="<?php echo $rtn; ?>"/>
              </div>
              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">Dias de credito</label>
                <input type="number" name="dias_credito" id="dias_credito" required maxlength="255" class="form-control"  value="<?php echo $diascredito; ?>"/>
              </div>
              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">Limite de credito</label>
                <input type="number" name="limite_credito" id="limite_credito" required maxlength="255" class="form-control"  value="<?php echo $limitecredito; ?>"/>
              </div>
              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">Forma de pago</label>
                <input type="text" name="forma_pago" id="forma_pago" required maxlength="255" class="form-control"  value="<?php echo $formapago; ?>"/>
              </div>
              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">Direccion</label>
                <input type="text" name="direccion" id="direccion" required maxlength="255" class="form-control"  value="<?php echo $direccion; ?>"/>
              </div>
              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">Telefono</label>
                <input type="text" name="telefono" id="telefono" required maxlength="255" class="form-control"  value="<?php echo $telefono; ?>"/>
              </div>
              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">correo</label>
                <input type="text" name="correo" id="correo" required maxlength="255" class="form-control"  value="<?php echo $correo; ?>"/>
              </div>
              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha" >Estado</label>
                <select name="estado" class="form-control">
                  <option value="1" <?php if($estado==1) echo "selected"; ?> >Habilitado</option>
                  <option value="0" <?php if($estado==0) echo "selected"; ?>>Deshabilitado</option>
                </select>
              </div>

              <div class="col-sm-12">
                <br>
                <input type="submit" class="btn btn-primary" value="Enviar" disabled />
              </div>
            </form>
          </div>
          <div class="col-md-4">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function(){
  $('input[type="submit"]').removeAttr('disabled');
});
$(document).submit(function( event ) {
  event.preventDefault();
  $.ajax({
    type:"POST",
    url:  './controlador/clienteactualizar.php',
    data:$("#formulario").serialize(),
    dataType: 'html',
    success: function(data){
      //var obj = jQuery.parseJSON( data);
      if(data=="Ok"){
        swal({
          title: "<small>¡Informacion!</small>",
          text: " Registro actualizado correctamente ",
          html: true,
          confirmButtonText: "Cerrar",
        });
        $('input[type="submit"]').attr("disabled", "true");
      }else{
        swal({
          title: "<small>¡Informacion!</small>",
          text: " Error ",
          html: true,
          confirmButtonText: "Cerrar",
        });
        $('input[type="submit"]').removeAttr('disabled');
      }

      //var json = $.parseJSON(data);

    },
    error: function(data){
      $('input[type="submit"]').removeAttr('disabled');
      console.log(data);
    }
  });
});
</script>
