<?php
/**
    * Admin Delete Issue
    *
    * Creates a functionsAdmin object that calls the function to delete an issue by passing the issue id 
    *
    * @author Tritens
    * @package admin
    */


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