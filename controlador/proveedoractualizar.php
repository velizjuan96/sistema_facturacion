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
  $estado=$_POST["estado"];
  try {
    $db=conexion("root","","sistema");
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $fecha=date('y-m-d H:i:s');
    $stmt = $db->prepare("update proveedor set nombre=:nombre,telefono=:telefono,correo=:correo,fax=:fax,paginaweb=:paginaweb,diascredito=:diascredito,
	limitecredito=:limitecredito,direccion=:direccion,estado=:estado,fecha_modificacion=:fecha where rtn=:rtn");
    $stmt->bindParam(":nombre",$nombre);
	$stmt->bindParam(":telefono",$telefono);
	$stmt->bindParam(":correo",$correo);
    $stmt->bindParam(":estado",$estado);
    $stmt->bindParam(":fecha",$fecha);
    $stmt->bindParam(":rtn",$rtn);
	$stmt->bindParam(":fax",$fax);
	$stmt->bindParam(":paginaweb",$paginaweb);
	$stmt->bindParam(":diascredito",$diascredito);
	$stmt->bindParam(":limitecredito",$limitecredito);
	$stmt->bindParam(":direccion",$direccion);
    $stmt->execute();

    echo "Ok";
  } catch (\Exception $e) {
    echo $e->getMessage();
  }

 ?>
