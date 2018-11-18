<?php
include ('../../cms/sql_credentials.php');
global $mysqli;

$delete_ids = $_POST;
foreach($delete_ids as $id => $value){
  $query = "DELETE FROM Project_Users WHERE user_id='{$id}';";
  if ($result = $mysqli->query($query)){
    header("Location: ../admin_users.php");
  }
}

$mysqli->close();
?>
