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
  $descuento=$fila[5];
  $impuesto=$fila[6];
  $subtotal=$fila[7];
  $total=$fila[8];

  $estado=0;

}while($fila =$stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_PRIOR))
?>
<div class="container-fluid">
	<ol class="breadcrumb">
		<li><a href="./">Inicio</a></li>
		<li><a class="ajax-request" href="/inventario/ventas/ventas.php">Ventas</a></li>
    <li><a class="active" href="#">Ventas Editar</a></li>
	</ol>
</div>
<div class="container-fluid spark-screen">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Ventas Editar</div>
        <div class="panel-body">
          <div class="col-md-4">
          </div>
          <div class="col-md-4">
            <form method="post" action="productoactualizar.php" id="formulario">
              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">Id</label>
                <input type="text" name="id"  required maxlength="255" class="form-control" readonly value="<?php echo $id; ?>"/>
              </div>

              <div class="col-sm-12">
 							<label class='control-sidebar-subheading' for="fecha">Cliente</label>
 					    <input type="text" name="cliente"  required maxlength="255" class="form-control" value="<?php echo $cliente; ?>" />
            	</div>



              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">Producto</label>
                <input type="text" name="producto"  required maxlength="255" class="form-control"  value="<?php echo $producto; ?>"/>
              </div>

              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">Unidades</label>
                <input type="text" name="unidades" required maxlength="255" class="form-control"  value="<?php echo $unidades; ?>"/>
              </div>


              <div class="col-sm-6">
                <label class='control-sidebar-subheading' for="fecha">Precio</label>
                <input type="text" name="precio"  required step="any" class="form-control"  value="<?php echo $precio; ?>" />
              </div>

              <div class="col-sm-6">
                <label class='control-sidebar-subheading' for="fecha">Descuento</label>
                <input type="text" name="descuento"  required step="any" class="form-control"  value="<?php echo $descuento; ?>" />
              </div>

              <div class="col-sm-6">
                <label class='control-sidebar-subheading' for="fecha">Impuesto</label>
                <input type="number" name="impuesto"  required step="any" class="form-control"  value="<?php echo $impuesto; ?>" />
              </div>


              <div class="col-sm-6">
                <label class='control-sidebar-subheading' for="fecha">Subtotal</label>
                <input type="number" name="subtotal"  required step="any" class="form-control"  value="<?php echo $subtotal; ?>" />
              </div>

              <div class="col-sm-6">
                <label class='control-sidebar-subheading' for="fecha">Total</label>
                <input type="number" name="total"  required step="any" class="form-control"  value="<?php echo $total; ?>" />
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
    url:  './controlador/ventasactualizar.php',
    data:$("#formulario").serialize(),
    dataType: 'html',
    success: function(data){
      //var obj = jQuery.parseJSON( data);
      if(data=="Ok"){
        swal({
          title: "<small>¡Informacion!</small>",
          text: " Registro creado correctamente ",
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


$(document).on('change','.codigo',function(){
	 var categoria=$(this).val();
   var url=   './controlador/consecutivo.php?categoria='+categoria;
   $.get(url,function(data){
		 $('#codigo').val(data);
	 });
});
</script>
