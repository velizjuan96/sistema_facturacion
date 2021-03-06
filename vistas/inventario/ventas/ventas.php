<div class="container-fluid">
	<ol class="breadcrumb">
		<li><a href="./">Inicio</a></li>
		<li><a class="active" href="#">Ventas</a></li>
	</ol>
</div>
<div class="container-fluid spark-screen">
  <div class="row">
    <div class="col-md-12">
      <h3 class="page-header">
        <a class="btn btn-primary ajax-request" href="/inventario/ventas/ventasnuevo.php">
          <i class="fa fa-plus"></i> Nueva Venta
        </a>
      </h3>
    </div>
  </div>
</div>

<div class="container-fluid spark-screen">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Listado de Venta</div>
        <div class="panel-body">
          <div class="col-md-12 ">
            <table class="table table-striped table-condensed" id="datos">
              <thead>
                <th>Id</th>
								<th>Cliente</th>
								<th>Producto</th>
								<th>Precio</th>
								<th>Total</th>
								<th>Estado</th>
								<th>Opciones</th>

              </thead>
              <tbody>
                <?php
                include($_SERVER['DOCUMENT_ROOT'].'/sistema/modelo/conexion.php');
                $db=conexion("root","","sistema");
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $db->prepare("SELECT *  FROM ventas");
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
								  echo "<td>".($fila[6]==0?'Deshabilitado':'Habilitado')."</td>";


                  echo '<td>
                  <a class="btn btn-primary ajax-request" href="/inventario/ventas/ventaseditar.php?id='.$fila[0].'">
                  <i class="fa fa-pencil"></i>
                  </a>
                  <a class="btn btn-success ajax-request" href="/inventario/ventas/ventasconsultar.php?id='.$fila[0].'">
                  <i class="fa fa-search"></i>
                  </a>
                  <a class="btn btn-danger ajax-request" href="/inventario/ventas/ventaseliminar.php?id='.$fila[0].'">
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
// $(document).ready(function(){
//   $('#datos').DataTable();
// });
// </script>
