<?php
$id=$_GET['id'];
$cliente="";
$producto="";
$unidades=0;
$precio=0;
$impuesto=0;
$descuento=0;
$subtotal=0;
$total=0;
$estado=0;
include($_SERVER['DOCUMENT_ROOT'].'/sistema/modelo/conexion.php');
$db=conexion("root","","sistema");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $db->prepare("SELECT *  FROM ventas where id=".$id);
$stmt->execute();
$fila = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);
do{
  $cliente=$fila[1];
  $producto=$fila[2];
  $unidades=$fila[3];
  $precio=$fila[4];
  $impuesto=$fila[5];
  $descuento=$fila[6];
  $subtotal=$fila[7];
  $total=$fila[8];
  $estado=$fila[9];
}while($fila =$stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_PRIOR))
?>
<div class="container-fluid">
	<ol class="breadcrumb">
		<li><a href="./">Inicio</a></li>
		<li><a class="ajax-request" href="/inventario/ventas/ventas.php">Ventas</a></li>
    <li><a class="active" href="#">Ventas Eliminar</a></li>
	</ol>
</div>
<div class="container-fluid spark-screen">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Ventas Eliminar</div>
        <div class="panel-body">
          <div class="col-md-4">
          </div>
          <div class="col-md-4">
            <form method="post" action="ventaseliminar.php" id="formulario">

              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">Id</label>
                <input type="text" name="id" id="id" required maxlength="255" class="form-control"  readonly value="<?php echo $id; ?>"/>
              </div>

              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">Cliente</label>
                <input type="text" name="cliente" id="nombre" required maxlength="255" class="form-control" disabled value="<?php echo $cliente; ?>"/>
              </div>

              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">Producto</label>
                <input type="text" name="producto"  required maxlength="255" class="form-control" disabled value="<?php echo $producto; ?>"/>
              </div>


              <div class="col-sm-6">
                <label class='control-sidebar-subheading' for="fecha">Unidades</label>
                <input type="number" name="unidades"  required step="any" class="form-control" disabled value="<?php echo $unidades; ?>" />
              </div>

              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">Precio</label>
                <input type="text" name="precio" id="precio" required maxlength="255" class="form-control" disabled value="<?php echo $precio; ?>"/>
              </div>

              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">Descuento</label>
                <input type="text" name="descuento" required maxlength="255" class="form-control" disabled value="<?php echo $descuento; ?>"/>
              </div>


              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">Impuesto</label>
                <input type="text" name="impuesto" required maxlength="255" class="form-control" disabled value="<?php echo $impuesto; ?>"/>
              </div>

              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">Subtotal</label>
                <input type="text" name="subtotal" required maxlength="255" class="form-control" disabled value="<?php echo $subtotal; ?>"/>
              </div>


              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">Total</label>
                <input type="text" name="total" required maxlength="255" class="form-control" disabled value="<?php echo $total; ?>"/>
              </div>

              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha" >Estado</label>
                <select name="estado" class="form-control" disabled>
                  <option value="1" <?php if($estado==1) echo "selected"; ?> >Habilitado</option>
                  <option value="0" <?php if($estado==0) echo "selected"; ?>>Deshabilitado</option>
                </select>
              </div>
              <div class="col-sm-12">
                <br>
                <input type="submit" class="btn btn-danger" value="Enviar" disabled />
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
    url:  './controlador/ventaseliminar.php',
    data:$("#formulario").serialize(),
    dataType: 'html',
    success: function(data){
      //var obj = jQuery.parseJSON( data);
      if(data=="Ok"){
        swal({
          title: "<small>¡Informacion!</small>",
          text: " Registro eliminado correctamente ",
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
