<?php

$cliente=($_GET["cliente"]);

include($_SERVER['DOCUMENT_ROOT'].'/sistema/modelo/conexion.php');
$db=conexion("root","","sistema");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $db->prepare("SELECT * FROM ventas where cliente like '%".$cliente."%'");
$stmt->execute();
$fila = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);
do{

  $arraycliente = array("$fila[0]" =>"$fila[1]",);

  // echo "<tr>";
  // echo "<td>".$fila[0]."</td>";
  // echo "<td>".$fila[1]."</td>";
  // echo '<td>
  // <a class="btn btn-primary ajax-request" href="/inventario/ventas/ventasagregar.php?id='.$fila[0].'">
  // <i class="fa fa-pencil"></i>
  // </a>
  // </td>';
  // echo "</tr>";

}while($fila =$stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_PRIOR))

  echo json_decode($arraycliente);



?>
