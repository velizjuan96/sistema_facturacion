<?php
  include('../modelo/conexion.php');
  $id=$_POST["id"];
  $nombre=$_POST["nombre"];
  $rtn=$_POST["rtn"];
  $diascredito=$_POST["dias_credito"];
  $limitecredito=$_POST["limite_credito"];
  $formapago=$_POST["forma_pago"];
  $estado=$_POST["estado"];
  $direccion=$_POST["direccion"];
  $telefono=$_POST["telefono"];
  $correo=$_POST["correo"];
  try {
    $db=conexion("root","","sistema");
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $fecha=date('y-m-d H:i:s');
    $stmt = $db->prepare("update cliente set nombre=:nombre,rtn=:rtn,dias_credito=:dias_credito,limite_credito=:limite_credito,forma_pago=:forma_pago,estado=:estado,direccion=:direccion,telefono=:telefono,correo=:correo,fecha_modificacion=:fecha where id=:id");
    $stmt->bindParam(":nombre",$nombre);
    $stmt->bindParam(":rtn",$rtn);
    $stmt->bindParam(":dias_credito",$diascredito);
    $stmt->bindParam(":limite_credito",$limitecredito);
    $stmt->bindParam(":forma_pago",$formapago);
    $stmt->bindParam(":estado",$estado);
    $stmt->bindParam(":direccion",$direccion);
    $stmt->bindParam(":telefono",$telefono);
    $stmt->bindParam(":correo",$correo);
    $stmt->bindParam(":fecha",$fecha);
    $stmt->bindParam(":id",$id);
    $stmt->execute();

    echo "Ok";
  } catch (\Exception $e) {
    echo $e->getMessage();
  }

 ?>
