<?php

/**
    * Admin Delete User
    *
    * Creates a functionsAdmin object that calls the function to delete an user by passing the user id and false for the testSuite.
    *
    * @author Tritens
    * @package admin
    */

    include ('../../cms/sql_credentials.php');
    global $mysqli;
    include('../functionsAdmin.php');
    $admin = new functionsAdmin();

    $delete_ids = $_POST;
    foreach($delete_ids as $id => $value){
      $admin->delete_user("false",$id);
    }

    $mysqli->close();
?>
