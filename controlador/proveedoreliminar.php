<?php
  include('../modelo/conexion.php');
   $rtn=$_POST["rtn"];
  $nombre=$_POST["nombre"];
  $telefono=$_POST["telefono"];
  $correo=$_POST["correo"];
  $fax=$_POST["fax"];
  $paginaweb=$_POST["paginaweb"];
  $diascredito=$_POST["diascredito"];
  $limitecredito=$_POST["limitecredito"];
  $direccion=$_POST["direccion"];
  try {
    $db=conexion("root","","sistema");
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $fecha=date('y-m-d H:i:s');
    $stmt = $db->prepare("delete from  proveedor  where rtn=:rtn");
    $stmt->bindParam(":rtn",$rtn);
    $stmt->execute();

    echo "Ok";
  } catch (\Exception $e) {
    echo $e->getMessage();
  }

 ?>
