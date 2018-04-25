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
  $estado=1;
  try {
    $db=conexion("root","","sistema");
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $fecha=date('y-m-d H:i:s');
    $stmt = $db->prepare("INSERT INTO proveedor(rtn,nombre,telefono,correo,fax,paginaweb,diascredito,limitecredito,direccion,estado,fecha_creacion,fecha_modificacion) 
	VALUES (:rtn,:nombre,:telefono,:correo,:fax,:paginaweb,:diascredito,:limitecredito,:direccion,:estado,:fecha_creacion,:fecha_modificacion)");
    $stmt->bindParam(":rtn",$rtn);
	$stmt->bindParam(":nombre",$nombre);
    $stmt->bindParam(":telefono",$telefono);
    $stmt->bindParam(":correo",$correo);
	$stmt->bindParam(":fax",$fax);
	$stmt->bindParam(":paginaweb",$paginaweb);
	$stmt->bindParam(":diascredito",$diascredito);
	$stmt->bindParam(":limitecredito",$limitecredito);
	$stmt->bindParam(":direccion",$direccion);
	$stmt->bindParam(":estado",$estado);
	$stmt->bindParam(":fecha_creacion",$fecha);
    $stmt->bindParam(":fecha_modificacion",$fecha);
    $stmt->execute();

    echo "Ok";
  } catch (\Exception $e) {
    echo $e->getMessage();
  }

 ?>
