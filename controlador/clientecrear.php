<?php
  include('../modelo/conexion.php');
  $nombre=$_POST["nombre"];
  $rtn=$_POST["rtn"];
  $dcredito=$_POST["dias_credito"];
  $lcredito=$_POST["limite_credito"];
  $formapago=$_POST["forma_pago"];
  $direccion=$_POST["direccion"];
  $telefono=$_POST["telefono"];
  $correo=$_POST["correo"];
  $estado=1;
  try {
    $db=conexion("root","","sistema");
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $fecha=date('y-m-d H:i:s');
    $stmt = $db->prepare("INSERT INTO cliente(nombre,rtn,dias_credito,limite_credito,forma_pago,direccion,telefono,correo,estado,fecha_creacion,fecha_modificacion)
    VALUES (:nombre,:rtn,:dias_credito,:limite_credito,:forma_pago,:direccion,:telefono,:correo,:estado,:fecha_creacion,:fecha_modificacion)");
    $stmt->bindParam(":nombre",$nombre);
    $stmt->bindParam(":rtn",$rtn);
    $stmt->bindParam(":dias_credito",$dcredito);
    $stmt->bindParam(":limite_credito",$lcredito);
    $stmt->bindParam(":forma_pago",$formapago);
    $stmt->bindParam(":estado",$estado);
    $stmt->bindParam(":direccion",$direccion);
    $stmt->bindParam(":telefono",$telefono);
    $stmt->bindParam(":correo",$correo);
    $stmt->bindParam(":fecha_creacion",$fecha);
    $stmt->bindParam(":fecha_modificacion",$fecha);
    $stmt->execute();

    echo "Ok";
  } catch (\Exception $e) {
    echo $e->getMessage();
  }

 ?>
