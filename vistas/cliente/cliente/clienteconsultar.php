<?php
  $id=$_GET['id'];
  $nombre="";
  $rtn="";

  include($_SERVER['DOCUMENT_ROOT'].'/sistema/modelo/conexion.php');
  $db=conexion("root","","sistema");
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $db->prepare("SELECT *  FROM cliente where id=".$id);
  $stmt->execute();
  $fila = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);
    do{
      $nombre=$fila[1];
      $rtn=$fila[2];
    }while($fila =$stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_PRIOR))
 ?>
 <div class="container-fluid">
 	<ol class="breadcrumb">
 		<li><a href="./">Inicio</a></li>
 		<li><a class="ajax-request" href="/clientee/cliente/cliente.php">Cliente</a></li>
     <li><a class="active" href="#">Consultar Cliente</a></li>
 	</ol>
 </div>
<div class="container-fluid spark-screen">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Consultar Cliente</div>
        <div class="panel-body">
          <div class="col-md-4">
          </div>
          <div class="col-md-4">

              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">Id</label>
                <input type="text" name="id" id="id" required maxlength="255" class="form-control" disabled value="<?php echo $id; ?>"/>
              </div>
              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">Nombre</label>
                <input type="text" name="nombre" id="nombre" required maxlength="255" class="form-control" disabled value="<?php echo $nombre; ?>"/>
              </div>
              <div class="col-sm-12">
                <label class='control-sidebar-subheading' for="fecha">RTN</label>
                <input type="text" name="rtn" id="rtn" required maxlength="255" class="form-control" disabled value="<?php echo $rtn; ?>"/>
              </div>

          </div>
          <div class="col-md-4">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
