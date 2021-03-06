<div class="container-fluid">
	<ol class="breadcrumb">
		<li><a href="./">Inicio</a></li>
		<li><a class="active" href="#">Marca</a></li>
	</ol>
</div>
<div class="container-fluid spark-screen">
  <div class="row">
    <div class="col-md-12">
      <h3 class="page-header">
        <a class="btn btn-primary ajax-request" href="/inventario/marca/marcanuevo.php">
          <i class="fa fa-plus"></i> Nueva Marca
        </a>
      </h3>
    </div>
  </div>
</div>

<div class="container-fluid spark-screen">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Listado de Marca</div>
        <div class="panel-body">
          <div class="col-md-12 ">
            <table class="table table-striped table-condensed" id="datos">
              <thead>
                <th>Id</th>
                <th>Descripcion</th>
                <th>Estado</th>
                <th>Opciones</th>
              </thead>
              <tbody>
                <?php
                include($_SERVER['DOCUMENT_ROOT'].'/sistema/modelo/conexion.php');
                $db=conexion('root','');
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $db->prepare("SELECT *  FROM marca");
                $stmt->execute();
                $fila = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);
                do{
                  echo "<tr>";
                  echo "<td>".$fila[0]."</td>";
                  echo "<td>".$fila[1]."</td>";
                  echo "<td>".($fila[2]==0?'Deshabilitado':'Habilitado')."</td>";
                  echo '<td>
                  <a class="btn btn-primary ajax-request" href="/inventario/marca/marcaeditar.php?id='.$fila[0].'">
                  <i class="fa fa-pencil"></i>
                  </a>
                  <a class="btn btn-success ajax-request" href="/inventario/marca/marcaconsultar.php?id='.$fila[0].'">
                  <i class="fa fa-search"></i>
                  </a>
                  <a class="btn btn-danger ajax-request" href="/inventario/marca/marcaeliminar.php?id='.$fila[0].'">
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
