

<?php

/**
    * admin_login.php
    *
    * Allows only admins to log in. If admin redirect to admin panel, else stay in the page
    *
    * @author Tritens
    * @package admin
    */

    // Access database
    include ('../../cms/sql_credentials.php');


    session_start();
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    // Global database variable
    global $mysqli;

    $admin_user = $_POST["username"];
    $admin_password = $_POST["password"];
    $hashed = hash('sha512', $admin_password); //hashing the admin password to check if this hashed password matches on in database

    $result = mysqli_query($mysqli, "SELECT * FROM Project_Admins WHERE username='$admin_user' AND password='$hashed';");

    // Login credentials are valid
    if (mysqli_num_rows($result)){
        // set session
        $_SESSION['admin_id'] = $admin_user;
        header('Location: ../admin_dashboard.php');
    }
    else{
      echo "Error: invalid admin username/password";
    }

    $mysqli->close();

?>
