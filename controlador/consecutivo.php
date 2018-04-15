<?php
  include('../modelo/conexion.php');

  $categoria=$_GET["categoria"];
  $filtro=str_pad($categoria,3,'0',STR_PAD_LEFT).'%';
  $consecutivo=0;
  try {
    $db=conexion("root","","sistema");
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $stmt = $db->prepare("SELECT ifnull(max(codigo),0) as codigo from producto where codigo like :filtro");
    $stmt->bindParam(":filtro",$filtro);
    $stmt->execute();

    while ($fila =$stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_PRIOR)) {
         $codigo=$fila[0];

    }
    if($codigo==0){
      $codigo=$codigo+1;
      $consecutivo=str_pad($codigo,4,'0',STR_PAD_LEFT);
      echo str_pad($categoria,3,'0',STR_PAD_LEFT).$consecutivo;
    }else{
      $codigo=$codigo*1;
      $codigo=$codigo+1;
      echo str_pad($codigo,7,'0',STR_PAD_LEFT);
    }
  } catch (\Exception $e) {
    echo -1;
  }

 ?>
