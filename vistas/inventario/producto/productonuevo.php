

<div class="container-fluid">
	<ol class="breadcrumb">
		<li><a href="./">Inicio</a></li>
		<li><a class="ajax-request" href="/inventario/producto/producto.php">Producto</a></li>
    <li><a class="active" href="#">Producto Nuevo</a></li>
	</ol>
</div>
<div class="container-fluid spark-screen">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Producto Nuevo</div>
        <div class="panel-body">
          <div class="col-md-4">
          </div>
          <div class="col-md-4">
            <form method="post" action="#" id="formulario">

							<div class="col-sm-12">
 							<label class='control-sidebar-subheading' for="fecha">Codigo</label>
 					    <input type="text" name="codigo" id="codigo" required maxlength="255" class="form-control " readonly="true" />
            	</div>
              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">Codigo_barra</label>
                <input type="text" name="codigo_barra" id="codigo_barra" required maxlength="255" class="form-control"/>
              </div>


							<div class="col-sm-12">
								<label class='control-sidebar-subheading' for="fecha">Descripcion</label>
								<input type="text" name="descripcion" id="descripcion" required maxlength="255" class="form-control"/>
							</div>

							<div class="col-sm-12">
								 <label class='control-sidebar-subheading' for="fecha">Proveedor</label>
								 <input type="text" name="proveedor" id="proveedor" required maxlength="255" class="form-control"/>
							 </div>


							<div class="col-sm-12">
								<label class='control-sidebar-subheading' for="fecha">Familia</label>
								<select name="familia" id="familia" class="form-control codigo">
									<option selected>Seleccione</option>
									<?php

                  include($_SERVER['DOCUMENT_ROOT'].'/sistema/modelo/conexion.php');
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

							<div class="col-sm-12">
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

							<div class="col-sm-12">
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

							<div class="col-sm-12">
								<label class='control-sidebar-subheading' for="fecha">Unidades</label>
								<input type="text" name="unidades" id="unidades" required maxlength="255" class="form-control"/>
							</div>

							<div class="col-sm-12">
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

							<div class="col-sm-12">
								<label class='control-sidebar-subheading' for="fecha">Costo_fijo</label>
								<input type="text" name="costo_fijo" id="costo_fijo" required maxlength="255" class="form-control"/>
							</div>


							<div class="col-sm-12">
								<label class='control-sidebar-subheading' for="fecha">Costo_variable</label>
								<input type="text" name="costo_variable" id="costo_variable" required maxlength="255" class="form-control"/>
							</div>


							<div class="col-sm-12">
								 <label class='control-sidebar-subheading' for="fecha">Utilidad</label>
								 <input type="text" name="utilidad" id="utilidad" required maxlength="255" class="form-control"/>
							 </div>


							 <div class="col-sm-12">
	 							<label class='control-sidebar-subheading' for="fecha">Precio</label>
	 							<input type="text" name="precio" id="precio" required maxlength="255" class="form-control"/>
	 						</div>


							<div class="col-sm-12">
								<label class='control-sidebar-subheading' for="fecha">Cantidad</label>
								<input type="text" name="cantidad" id="cantidad" required maxlength="255" class="form-control"/>
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
$("#formulario").submit(function( event ) {
  event.preventDefault();
  $.ajax({
    type:"POST",
    url:  './controlador/productocrear.php',
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
