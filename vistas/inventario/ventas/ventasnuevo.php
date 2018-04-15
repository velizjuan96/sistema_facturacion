

<div class="container-fluid">
	<ol class="breadcrumb">
		<li><a href="./">Inicio</a></li>
		<li><a class="ajax-request" href="/inventario/ventas/ventas.php">Ventas</a></li>
    <li><a class="active" href="#">Ventas Nuevas</a></li>
	</ol>
</div>
<div class="container-fluid spark-screen">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Ventas Nuevas</div>
        <div class="panel-body">
          <div class="col-md-4">
          </div>
          <div class="col-md-4">
            <form method="post" action="#" id="formulario">


              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">Cliente</label>
                <input type="text" name="cliente" required maxlength="255" class="form-control"/>
              </div>


							<div class="col-sm-12">
							 <label class='control-sidebar-subheading' for="fecha">Producto</label>
							 <select name="producto"  class="form-control" id="inputGroupSelect">
								 <option selected>Seleccione</option>
								 <?php
									include($_SERVER['DOCUMENT_ROOT'].'/sistema/modelo/conexion.php');
									 $db=conexion("root","","sistema");
									 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									 $stmt = $db->prepare("SELECT * FROM producto" );
									 $stmt->execute();
									 $fila = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);
										 do{
											 echo "<option value='$fila[6]'>".$fila[6]."</option>";
										 }while($fila =$stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_PRIOR))
									?>

								 </select>
							</div>

							<div class="col-sm-12">
								 <label class='control-sidebar-subheading' for="fecha">Unidades</label>
								 <input type="text" name="unidades"  required maxlength="255" class="form-control"/>
							 </div>

							 <div class="col-sm-12">
 								 <label class='control-sidebar-subheading' for="fecha">Precio</label>
 								 <input type="number" name="precio"  required maxlength="255" class="form-control"/>
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
								<label class='control-sidebar-subheading' for="fecha">Subtotal</label>
								<input type="number" name="subtotal"  required maxlength="255" class="form-control"/>
							</div>

							<div class="col-sm-12">
								<label class='control-sidebar-subheading' for="fecha">Total</label>
								<input type="number" name="total"  required maxlength="255" class="form-control"/>
                 <<?php
                $cantidad=0;


								$precio=$_POST["precio"];
                		$descuento=$_POST["descuento"];

                    ?>



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
    url:  './controlador/ventascrear.php',
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

</script>
