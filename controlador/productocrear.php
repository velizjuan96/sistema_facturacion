<?php

  include('../modelo/conexion.php');
  $codigo=$_POST["codigo"];
  $codigo_barra=$_POST["codigo_barra"];
  $descripcion=$_POST["descripcion"];
  $proveedor=$_POST["proveedor"];
  $familia=$_POST["familia"];
  $marca=$_POST["marca"];
  $impuesto=$_POST["impuesto"];
  $unidades=$_POST["unidades"];
  $descuento=$_POST["descuento"];
  $costo_fijo=$_POST["costo_fijo"];
  $costo_variable=$_POST["costo_variable"];
  $utilidad=$_POST["utilidad"];
  $precio=$_POST["precio"];
  $cantidad=$_POST["cantidad"];

  $estado=1;
  try {
    $db=conexion("root","","sistema");
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $fecha=date('y-m-d H:i:s');
    $stmt = $db->prepare("INSERT INTO producto(codigo,codigo_barra,descripcion,proveedor,familia,marca,impuesto,unidades,descuento,costo_fijo,
      costo_variable,utilidad,precio,cantidad,estado,fecha_creacion,fecha_modificacion)
       VALUES(:codigo,:codigo_barra,:descripcion,:proveedor,:familia,:marca,:impuesto,:unidades,
         :descuento,:costo_fijo,:costo_variable,:utilidad,:precio,:cantidad,:estado,:fecha_creacion,:fecha_modificacion)");
    $stmt->bindParam(":codigo",$codigo);
    $stmt->bindParam(":codigo_barra",$codigo_barra);
    $stmt->bindParam(":descripcion",$descripcion);
    $stmt->bindParam(":proveedor",$proveedor);
    $stmt->bindParam(":familia",$familia);
    $stmt->bindParam(":marca",$marca);
    $stmt->bindParam(":impuesto",$impuesto);
    $stmt->bindParam(":unidades",$unidades);
    $stmt->bindParam(":descuento",$descuento);
    $stmt->bindParam(":costo_fijo",$costo_fijo);
    $stmt->bindParam(":costo_variable",$costo_variable);
    $stmt->bindParam(":utilidad",$utilidad);
    $stmt->bindParam(":precio",$precio);
    $stmt->bindParam(":cantidad",$cantidad);
    $stmt->bindParam(":estado",$estado);
    $stmt->bindParam(":fecha_creacion",$fecha);
    $stmt->bindParam(":fecha_modificacion",$fecha);
    $stmt->execute();

    echo "Ok";
  } catch (\Exception $e) {
    echo $e->getMessage();
  }

 ?>
