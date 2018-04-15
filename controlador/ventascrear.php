<?php

  include('../modelo/conexion.php');
  $cliente=$_POST["cliente"];
  $producto=$_POST["producto"];
  $unidades=$_POST["unidades"];
  $precio=$_POST["precio"];
  $descuento=$_POST["descuento"];
  $impuesto=$_POST["impuesto"];
  $subtotal=$_POST["subtotal"];
  $total=$_POST["total"];

  $estado=1;
  try {
    $db=conexion("root","","sistema");
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $fecha=date('y-m-d H:i:s');
    $stmt = $db->prepare("INSERT INTO ventas(cliente,producto,unidades,precio,descuento,impuesto,subtotal,total,estado,fecha_creacion,fecha_modificacion)
       VALUES(:cliente,:producto,:unidades,:precio,:descuento,:impuesto,:subtotal,:total,:estado,:fecha_creacion,:fecha_modificacion)");
    $stmt->bindParam(":cliente",$cliente);
    $stmt->bindParam(":producto",$producto);
    $stmt->bindParam(":unidades",$unidades);
    $stmt->bindParam(":precio",$precio);
    $stmt->bindParam(":descuento",$descuento);
    $stmt->bindParam(":impuesto",$impuesto);
    $stmt->bindParam(":subtotal",$subtotal);
    $stmt->bindParam(":total",$total);
    $stmt->bindParam(":estado",$estado);
    $stmt->bindParam(":fecha_creacion",$fecha);
    $stmt->bindParam(":fecha_modificacion",$fecha);
    $stmt->execute();

    echo "Ok";
  } catch (\Exception $e) {
    echo $e->getMessage();
  }

 ?>
