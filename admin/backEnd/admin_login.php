

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

    $stmt = $mysqli->prepare("SELECT * FROM Project_Admins WHERE username= ? AND password= ?");
    $stmt->bind_param("ss", $admin_user, $hashed);
    $admin_user = $_POST["username"];
    $admin_password = $_POST["password"];
    $hashed = hash('sha512', $admin_password); //hashing the admin password to check if this hashed password matches on in database

    //$result = mysqli_query($mysqli, "SELECT * FROM Project_Admins WHERE username='$admin_user' AND password='$hashed';");

    // Login credentials are valid
    if ($stmt->execute()){
        // set session
        $_SESSION['admin_id'] = $admin_user;
        header('Location: ../admin_dashboard.php');
    }
    else{
        $adminError = "username/password incorrect";
        $_SESSION['adminError'] = $adminError;
        header('Location: ../admin.php');
    }

    $mysqli->close();

?>
