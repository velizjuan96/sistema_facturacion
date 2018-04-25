<div class="container-fluid">
	<ol class="breadcrumb">
		<li><a href="./">Inicio</a></li>
		<li><a class="active" href="#">Proveedor</a></li>
	</ol>
</div>
<div class="container-fluid spark-screen">
  <div class="row">
    <div class="col-md-12">
      <h3 class="page-header">
        <a class="btn btn-primary ajax-request" href="/proveedores/proveedor/proveedornuevo.php">
          <i class="fa fa-plus"></i> Nuevo Proveedor
        </a>
      </h3>
    </div>
  </div>
</div>

<div class="container-fluid spark-screen">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Listado de Proveedor</div>
        <div class="panel-body">
          <div class="col-md-12 ">
            <table class="table table-striped table-condensed" id="datos">
              <thead>
                <th>RTN</th>
                <th>Nombre</th>
				<th>Correo</th>
				<th>Telefono</th>
				<th>Fax</th>
				<th>Pagina Web</th>
				<th>Dias Credito</th>
				<th>Limite Credito</th>
				<th>Direccion</th>
                <th>Estado</th>
                <th>Opciones</th>
              </thead>
              <tbody>
                <?php
                include($_SERVER['DOCUMENT_ROOT'].'/sistema/modelo/conexion.php');
                $db=conexion('root','');
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $db->prepare("SELECT *  FROM proveedor");
                $stmt->execute();
                $fila = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);
                do{
                  echo "<tr>";
                  echo "<td>".$fila[0]."</td>";
                  echo "<td>".$fila[1]."</td>";
				  echo "<td>".$fila[2]."</td>";
				  echo "<td>".$fila[3]."</td>";
				  echo "<td>".$fila[4]."</td>";
				  echo "<td>".$fila[5]."</td>";
				  echo "<td>".$fila[6]."</td>";
				  echo "<td>".$fila[7]."</td>";
				  echo "<td>".$fila[8]."</td>";
                  echo "<td>".($fila[9]==0?'Deshabilitado':'Habilitado')."</td>";
                  echo '<td>
                  <a class="btn btn-primary ajax-request" href="/proveedores/proveedor/proveedoreditar.php?rtn='.$fila[0].'">
                  <i class="fa fa-pencil"></i>
                  </a>
                  <a class="btn btn-success ajax-request" href="/proveedores/proveedor/proveedorconsultar.php?rtn='.$fila[0].'">
                  <i class="fa fa-search"></i>
                  </a>
                  <a class="btn btn-danger ajax-request" href="/proveedores/proveedor/proveedoreliminar.php?rtn='.$fila[0].'">
                  <i class="fa fa-trash"></i>
                  </a>
                  </td>';
                  echo "</tr>";
                }while($fila =$stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_PRIOR))
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function(){
  $('#datos').DataTable();
});
</script>
