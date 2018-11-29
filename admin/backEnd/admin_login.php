<?php

/**
    * Admin Login
    *
    * Creates a functionsAdmin object that calls the function to login to the Admin Panel by passing the username and password recieved
    *
    * @author Tritens
    * @package admin
    */

    $admin_user = $_POST["username"];
    $admin_password = $_POST["password"];
    $test="false";

    include('../functionsAdmin.php');
    $admin = new functionsAdmin();
    $admin->login($test,$admin_user,$admin_password);

?>
