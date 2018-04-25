<?php
  include('../modelo/conexion.php');
  $nombre=$_POST["nombre"];
  $estado=1;
  try {
      $db=conexion("root","","sistema");
      $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
      $fecha=date('y-m-d H:i:s');
      $stmt = $db->prepare("INSERT INTO vendedores(nombre) VALUES (:nombre)");
      $stmt->bindParam(":nombre",$nombre);
      $stmt->execute();

      echo "Ok";
  } catch (\Exception $e) {
      echo $e->getMessage();
  }

 ?>
