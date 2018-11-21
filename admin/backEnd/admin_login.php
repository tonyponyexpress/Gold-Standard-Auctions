

<?php

/**
    * admin_login.php
    *
    * Allows only admins to log in. If admin redirect to admin panel, else stay in the page
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
