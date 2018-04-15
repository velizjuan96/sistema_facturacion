<?php
include('../modelo/conexion.php');
$id=$_POST["id"];
$cliente=$_POST["cliente"];
$producto=$_POST["producto"];
$unidades=$_POST["unidades"];
$precio=$_POST["precio"];
$descuento=$_POST["descuento"];
$impuesto=$_POST["impuesto"];
$subtotal=$_POST["subtotal"];
$total=$_POST["total"];
$estado=$_POST["estado"];

try {
  $db=conexion("root","","sistema");
  $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  $fecha=date('y-m-d H:i:s');
  $stmt = $db->prepare("update ventas set cliente=:cliente,producto=:producto,unidades=:unidades,precio=:precio,
  descuento=:descuento,impuesto=:impuesto,subtotal=:subtotal,total=:total,estado=:estado,fecha_modificacion=:fecha  where id=:id");

  $stmt->bindParam(":cliente",$cliente);
  $stmt->bindParam(":producto",$producto);
  $stmt->bindParam(":unidades",$unidades);
  $stmt->bindParam(":precio",$precio);
  $stmt->bindParam(":descuento",$descuento);
  $stmt->bindParam(":impuesto",$impuesto);
  $stmt->bindParam(":descuento",$descuento);
  $stmt->bindParam(":subtotal",$subtotal);
  $stmt->bindParam(":total",$total);
  $stmt->bindParam(":estado",$estado);
  $stmt->bindParam(":fecha",$fecha);
  $stmt->bindParam(":id",$id);
  $stmt->execute();

  echo "Ok";
} catch (\Exception $e) {
  echo $e->getMessage();
}

 ?>
