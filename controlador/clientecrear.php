<?php
  include('../modelo/conexion.php');
  $nombre=$_POST["nombre"];
  $rtn=$_POST["rtn"];
  $estado=1;
  try {
    $db=conexion("root","","sistema");
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $fecha=date('y-m-d H:i:s');
    $stmt = $db->prepare("INSERT INTO cliente(nombre,rtn,estado,fecha_creacion,fecha_modificacion) VALUES (:nombre,:rtn,:estado,:fecha_creacion,:fecha_modificacion)");
    $stmt->bindParam(":nombre",$nombre);
    $stmt->bindParam(":rtn",$rtn);
    $stmt->bindParam(":estado",$estado);
    $stmt->bindParam(":fecha_creacion",$fecha);
    $stmt->bindParam(":fecha_modificacion",$fecha);
    $stmt->execute();

    echo "Ok";
  } catch (\Exception $e) {
    echo $e->getMessage();
  }

 ?>
