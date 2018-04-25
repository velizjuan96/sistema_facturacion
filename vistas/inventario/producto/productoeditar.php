<?php
$id=$_GET['id'];
$codigo="";
$codigo_barra="";
$descripcion="";
$proveedor="";
$familia="";
$marca="";
$impuesto=0;
$unidades=0;
$descuento=0;
$costo_fijo=0;
$costo_variable=0;
$utilidad=0;
$precio=0;
$cantidad=0;


include($_SERVER['DOCUMENT_ROOT'].'/sistema/modelo/conexion.php');
$db=conexion("root","","sistema");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $db->prepare("SELECT *  FROM producto where id=".$id);
$stmt->execute();
$fila = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);
do{
  $codigo=$fila[1];
  $codigo_barra=$fila[2];
  $descripcion=$fila[3];
  $proveedor=$fila[4];
  $familia=$fila[5];
  $marca=$fila[6];
  $impuesto=$fila[7];
  $unidades=$fila[8];
  $descuento=$fila[9];
  $costo_fijo=$fila[10];
  $costo_variable=$fila[11];
  $utilidad=$fila[12];
  $precio=$fila[13];
  $cantidad=$fila[14];
  $estado=0;

}while($fila =$stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_PRIOR))
?>
<div class="container-fluid">
	<ol class="breadcrumb">
		<li><a href="./">Inicio</a></li>
		<li><a class="ajax-request" href="/inventario/producto/producto.php">Producto</a></li>
    <li><a class="active" href="#">Producto Editar</a></li>
	</ol>
</div>
<div class="container-fluid spark-screen">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Producto Editar</div>
        <div class="panel-body">
          <div class="col-md-4">
          </div>
          <div class="col-md-4">
            <form method="post" action="productoactualizar.php" id="formulario">
              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">Id</label>
                <input type="text" name="id" id="id" required maxlength="255" class="form-control" readonly value="<?php echo $id; ?>"/>
              </div>

              <div class="col-sm-12">
 							<label class='control-sidebar-subheading' for="fecha">Codigo</label>
 					    <input type="text" name="codigo" id="codigo" required maxlength="255" class="form-control" readonly="true" />
            	</div>



              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">Codigo_barra</label>
                <input type="text" name="codigo_barra"  required maxlength="255" class="form-control"  value="<?php echo $codigo_barra; ?>"/>
              </div>

              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">Descripcion</label>
                <input type="text" name="descripcion" required maxlength="255" class="form-control"  value="<?php echo $descripcion; ?>"/>
              </div>


              <div class="col-sm-6">
                <label class='control-sidebar-subheading' for="fecha">Proveedor</label>
                <input type="text" name="proveedor"  required step="any" class="form-control"  value="<?php echo $proveedor; ?>" />
              </div>

              <div class="col-sm-6">
                <label class='control-sidebar-subheading' for="fecha">Familia</label>
                <select  type="text" name="familia" id="familia" class="form-control  codigo">
                  <option selected>Seleccione</option>
                  <?php
                    $db=conexion("root","","sistema");
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $db->prepare("SELECT * FROM categoria" );
                    $stmt->execute();
                    $fila = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);
                      do{
                        echo "<option value='$fila[0]'>".$fila[1]."</option>";
                      }while($fila =$stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_PRIOR))
                   ?>
                  </select>
              </div>

              <div class="col-sm-6">
                <label class='control-sidebar-subheading' for="fecha">Marca</label>
                <select name="marca" id="marca" class="form-control" id="inputGroupSelect">
                  <option selected>Seleccione</option>
                  <?php

                   $db=conexion("root","","sistema");
                   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                   $stmt = $db->prepare("SELECT * FROM marca" );
                   $stmt->execute();
                   $fila = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);
                     do{
                       echo "<option value='$fila[0]'>".$fila[1]."</option>";
                     }while($fila =$stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_PRIOR))
                  ?>

              </select>
              </div>


              <div class="col-sm-6">
                <label class='control-sidebar-subheading' for="fecha">Impuesto</label>
								<select name="impuesto" id="impuesto" class="form-control" id="inputGroupSelect">
									<option selected>Seleccione</option>
									<?php

										$db=conexion("root","","sistema");
										$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
										$stmt = $db->prepare("SELECT * FROM impuesto" );
										$stmt->execute();
										$fila = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);
											do{
												echo "<option value='$fila[0]'>".$fila[2]."</option>";
											}while($fila =$stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_PRIOR))
									 ?>

									</select>
              </div>

              <div class="col-sm-6">
                <label class='control-sidebar-subheading' for="fecha">unidades</label>
                <input type="number" name="unidades"  required step="any" class="form-control"  value="<?php echo $unidades; ?>" />
              </div>

              <div class="col-sm-6">
                <label class='control-sidebar-subheading' for="fecha">Descuento</label>
								<select name="descuento" id="descuento" class="form-control" id="inputGroupSelect">
									<option selected>Seleccione</option>
									<?php


									  $db=conexion("root","","sistema");
									  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									  $stmt = $db->prepare("SELECT * FROM descuento" );
									  $stmt->execute();
									  $fila = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);
									    do{
									      echo "<option value='$fila[0]'>".$fila[2]."</option>";
									    }while($fila =$stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_PRIOR))
									 ?>

									</select>
              </div>

              <div class="col-sm-6">
                <label class='control-sidebar-subheading' for="fecha">Costo_fijo</label>
                <input type="number" name="costo_fijo"  required step="any" class="form-control"  value="<?php echo $costo_fijo; ?>" />
              </div>

              <div class="col-sm-6">
                <label class='control-sidebar-subheading' for="fecha">Costo_variable</label>
                <input type="number" name="costo_variable"  required step="any" class="form-control"  value="<?php echo $costo_variable; ?>" />
              </div>

              <div class="col-sm-6">
                <label class='control-sidebar-subheading' for="fecha">Utilidad</label>
                <input type="number" name="utilidad"  required step="any" class="form-control"  value="<?php echo $utilidad; ?>" />
              </div>

              <div class="col-sm-6">
                <label class='control-sidebar-subheading' for="fecha">Precio</label>
                <input type="number" name="precio"  required step="any" class="form-control"  value="<?php echo $precio; ?>" />
              </div>

              <div class="col-sm-6">
                <label class='control-sidebar-subheading' for="fecha">Cantidad</label>
                <input type="number" name="cantidad"  required step="any" class="form-control"  value="<?php echo $cantidad; ?>" />
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
    url:  './controlador/productoactualizar.php',
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
