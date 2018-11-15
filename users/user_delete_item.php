<?php
include ('../cms/sql_credentials.php');
global $mysqli;

$delete_items_ids = $_POST;
foreach($delete_items_ids as $id => $value){
  $query = "DELETE FROM Project_Items WHERE item_id='{$id}';";
  if ($result = $mysqli->query($query)){
    header("Location: myAccountTab.php");
  }
}

$mysqli->close();
?>
