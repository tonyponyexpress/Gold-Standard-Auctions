<?php
include ('../cms/sql_credentials.php');
global $mysqli;

$delete_problems_ids = $_POST;
foreach($delete_problems_ids as $id => $value){
  $query = "DELETE FROM Project_Problems WHERE problem_id='{$id}';";
  if ($result = $mysqli->query($query)){
    header("Location: admin_problems.php");
  }
}


$mysqli->close();
?>
