<?php
  $rtn=$_GET['rtn'];
  $nombre="";
  $telefono="";
  $correo="";
  $fax="";
  $paginaweb="";
  $diascredito="";
  $limitecredito="";
  $direccion="";
  include($_SERVER['DOCUMENT_ROOT'].'/sistema/modelo/conexion.php');
  $db=conexion("root","","sistema");
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $db->prepare("SELECT *  FROM proveedor where rtn=".$rtn);
  $stmt->execute();
  $fila = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);
    do{
		$nombre=$fila[1];
        $telefono=$fila[2];
        $correo=$fila[3];
		$fax=$fila[4];
        $paginaweb=$fila[5];
        $diascredito=$fila[6];
        $limitecredito=$fila[7];
        $direccion=$fila[8];
        $estado=0;
  
    }while($fila =$stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_PRIOR))
 ?>
 <div class="container-fluid">
 	<ol class="breadcrumb">
 		<li><a href="./">Inicio</a></li>
 		<li><a class="ajax-request" href="/proveedores/proveedor/proveedor.php">Proveedor</a></li>
     <li><a class="active" href="#">Consulta De Proveedor</a></li>
 	</ol>
 </div>
<div class="container-fluid spark-screen">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Consulta Proveedor</div>
        <div class="panel-body">
          <div class="col-md-4">
          </div>
          <div class="col-md-4">
            <form method="post" action="#" id="formulario">
              <div class="col-sm-12">
			  
			  <label class='control-sidebar-subheading' for="fecha">RTN Proveedor</label>
                <input type="text" name="rtn" id="rtn" required maxlength="255" class="form-control" value="<?php echo $rtn; ?>"/>
			  
			  
                <label class='control-sidebar-subheading' for="fecha">Nombre Proveedor</label>
                <input type="text" name="nombre" id="nombre" required maxlength="255" class="form-control" value="<?php echo $nombre; ?>"/>
				
				
				<label class='control-sidebar-subheading' for="fecha">telefono</label>
                <input type="text" name="telefono" id="telefono" required maxlength="255" class="form-control" value="<?php echo $telefono; ?>"/>
				
				<label class='control-sidebar-subheading' for="fecha">Correo</label>
                <input type="text" name="correo" id="correo" required maxlength="255" class="form-control" value="<?php echo $correo; ?>"/>
				
				<label class='control-sidebar-subheading' for="fecha">fax</label>
                <input type="text" name="fax" id="fax" required maxlength="255" class="form-control" value="<?php echo $fax; ?>"/>
				
				<label class='control-sidebar-subheading' for="fecha">Pagina Web</label>
                <input type="text" name="paginaweb" id="paginaweb" required maxlength="255" class="form-control" value="<?php echo $paginaweb; ?>" />
				
				<label class='control-sidebar-subheading' for="fecha">Dias Credito</label>
                <input type="text" name="diascredito" id="diascredito" required maxlength="255" class="form-control" value="<?php echo $diascredito; ?>"/>
				
				<label class='control-sidebar-subheading' for="fecha">Limite Credito</label>
                <input type="text" name="limitecredito" id="limitecredito" required maxlength="255" class="form-control" value="<?php echo $limitecredito; ?>"/>
				
				<label class='control-sidebar-subheading' for="fecha">Direccion</label>
                <input type="text" name="direccion" id="direccion" required maxlength="255" class="form-control" value="<?php echo $direccion; ?>"/>
              
			  
			  
			  </div>


              <div class="col-sm-12">
                <br>
                
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
