<?php
  include('../modelo/conexion.php');
  $descripcion=$_POST["nombre"];
  $estado=1;
  try {
    $db=conexion("root","","sistema");
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $fecha=date('y-m-d H:i:s');
    $stmt = $db->prepare("INSERT INTO marca(descripcion,estado,fecha_creacion,fecha_modificacion) VALUES (:descripcion,:estado,:fecha_creacion,:fecha_modificacion)");
    $stmt->bindParam(":descripcion",$descripcion);
    $stmt->bindParam(":estado",$estado);
    $stmt->bindParam(":fecha_creacion",$fecha);
    $stmt->bindParam(":fecha_modificacion",$fecha);
    $stmt->execute();

    echo "Ok";
  } catch (\Exception $e) {
    echo $e->getMessage();
  }

 ?>
