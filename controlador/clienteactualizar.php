<?php
  include('../modelo/conexion.php');
  $id=$_POST["id"];
  $nombre=$_POST["nombre"];
  $rtn=$_POST["rtn"];
  $estado=$_POST["estado"];
  try {
    $db=conexion("root","","sistema");
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $fecha=date('y-m-d H:i:s');
    $stmt = $db->prepare("update cliente set nombre=:nombre,rtn=:rtn,estado=:estado,fecha_modificacion=:fecha where id=:id");
    $stmt->bindParam(":nombre",$nombre);
    $stmt->bindParam(":rtn",$rtn);
    $stmt->bindParam(":estado",$estado);
    $stmt->bindParam(":fecha",$fecha);
    $stmt->bindParam(":id",$id);
    $stmt->execute();

    echo "Ok";
  } catch (\Exception $e) {
    echo $e->getMessage();
  }

 ?>
