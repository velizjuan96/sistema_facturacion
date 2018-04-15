<?php
  include('../modelo/conexion.php');
  $id=$_POST["id"];
  $descripcion=$_POST["nombre"];
  $estado=$_POST["estado"];
  try {
    $db=conexion("root","","sistema");
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $fecha=date('y-m-d H:i:s');
    $stmt = $db->prepare("update categoria set descripcion=:descripcion,estado=:estado,fecha_modificacion=:fecha where id=:id");
    $stmt->bindParam(":descripcion",$descripcion);
    $stmt->bindParam(":estado",$estado);
    $stmt->bindParam(":fecha",$fecha);
    $stmt->bindParam(":id",$id);
    $stmt->execute();

    echo "Ok";
  } catch (\Exception $e) {
    echo $e->getMessage();
  }

 ?>
