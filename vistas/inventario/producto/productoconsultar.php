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
   $proveedor=$fila[3];
  $descripcion=$fila[4];
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

}while($fila =$stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_PRIOR))
?>
 <div class="container-fluid">
 	<ol class="breadcrumb">
 		<li><a href="./">Inicio</a></li>
 		<li><a class="ajax-request" href="/inventario/producto/producto.php">Producto</a></li>
     <li><a class="active" href="#">Producto Consultar</a></li>
 	</ol>
 </div>
<div class="container-fluid spark-screen">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Producto Consultar</div>
        <div class="panel-body">
          <div class="col-md-4">
          </div>
          <div class="col-md-4">

              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">Id</label>
                <input type="text" name="id" id="id" required maxlength="255" class="form-control" disabled value="<?php echo $id; ?>"/>
              </div>

              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">Codigo</label>
                <input type="text" name="codigo" id="codigo" required maxlength="255" class="form-control" disabled value="<?php echo $codigo; ?>"/>
              </div>

              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">Codigo_barra</label>
                <input type="text" name="codigo_barra" id="codigo_barra" required maxlength="255" class="form-control" disabled value="<?php echo $codigo_barra; ?>"/>
              </div>

              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">Descripcion</label>
                <input type="text" name="descripcion" id="descripcion" required maxlength="255" class="form-control" disabled value="<?php echo $descripcion; ?>"/>
              </div>

              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">Proveedor</label>
                <input type="text" name="proveedor" id="proveedor" required maxlength="255" class="form-control" disabled value="<?php echo $proveedor; ?>"/>
              </div>

              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">Familia</label>
                <input type="text" name="familia" id="familia" required maxlength="255" class="form-control" disabled value="<?php echo $familia; ?>"/>
              </div>

              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">Marca</label>
                <input type="text" name="marca" id="marca" required maxlength="255" class="form-control" disabled value="<?php echo $marca; ?>"/>
              </div>


              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">Impuesto</label>
                <input type="text" name="impuesto" id="impuesto" required maxlength="255" class="form-control" disabled value="<?php echo $impuesto; ?>"/>
              </div>

              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">Unidades</label>
                <input type="text" name="unidades" id="unidades" required maxlength="255" class="form-control" disabled value="<?php echo $unidades; ?>"/>
              </div>


              <div class="col-sm-6">
                <label class='control-sidebar-subheading' for="fecha">Descuento</label>
                <input type="number" name="descuento" id="descuento" required step="any" class="form-control" disabled value="<?php echo $descuento; ?>" />
              </div>

              <div class="col-sm-6">
                <label class='control-sidebar-subheading' for="fecha">Costo_fijo</label>
                <input type="number" name="costo_fijo" id="costo_fijo" required step="any" class="form-control" disabled value="<?php echo $costo_fijo; ?>" />
              </div>

              <div class="col-sm-6">
                <label class='control-sidebar-subheading' for="fecha">Costo_variable</label>
                <input type="number" name="costo_variable" id="costo_variable" required step="any" class="form-control" disabled value="<?php echo $costo_variable; ?>" />
              </div>


              <div class="col-sm-6">
              <label class='control-sidebar-subheading' for="fecha">Utilidad</label>
              <input type="number" name="utilidad" id="utilidad" required step="any" class="form-control" disabled value="<?php echo $utilidad; ?>" />
              </div>

              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">Precio</label>
                <input type="text" name="precio" id="precio" required maxlength="255" class="form-control" disabled value="<?php echo $precio; ?>"/>
              </div>


             <div class="col-sm-6">
             <label class='control-sidebar-subheading' for="fecha">Cantidad</label>
             <input type="number" name="cantidad" id="cantidad" required step="any" class="form-control" disabled value="<?php echo $cantidad; ?>" />
            </div>


          </div>
          <div class="col-md-4">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
