<?php
    include ('../../cms/sql_credentials.php');
    global $mysqli;

    include('../functionsAdmin.php');
    $admin = new functionsAdmin();

    $delete_problems_ids = $_POST;
    foreach($delete_problems_ids as $id => $value){
      $admin->delete_issue("false",$id);
    }

    $mysqli->close();
?>
