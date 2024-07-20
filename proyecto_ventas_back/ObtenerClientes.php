<?php

require("conexion.php"); // Importa el archivo de conexión a la base de datos

$sql = "SELECT * FROM clientes ORDER BY ID DESC";

if ($query = mysqli_query($con, $sql)) { 
  $datos = [];
  while ($resultado = mysqli_fetch_assoc($query)) {
    $datos[] = $resultado;        
  }  

  echo json_encode(array("status" => "success", "code" => 1, "document" => $datos));

} else {
  // Si hay un error en la consulta
  $error_msg = mysqli_error($con); // Obtener el mensaje de error de MySQL

  echo json_encode(array("status" => "error", "code" => 0, "message" => $error_msg));
}

?>
