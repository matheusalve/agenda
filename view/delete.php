<?php
include "/var/www/html/model/db_conn.php";
$id = $_GET["id"];
$sql = "DELETE FROM `crud` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: sistema.php?msg=Contato excluido com sucesso");
} else {
  echo "Failed: " . mysqli_error($conn);
}
