<?php
/**
*User Login
*Basic functionality of how user login works
*
*
*
*@author Tritens
*@package users
*
*/
    session_start();

    // Access database
    include ('../../cms/sql_credentials.php');
    global $mysqli;

    $username = $_POST["username"];
    $password = $_POST["password"];


    $login = mysqli_query($mysqli, "SELECT * FROM Project_Users WHERE username='$username' AND password='$password';");

    // Login credentials are valid
    if (mysqli_num_rows($login)) {
        // set session
        $_SESSION['user_id'] = $username;
        header('Location: ../sellTab.php');
    }
    else {
      echo "error: invalid username or password.";
    }


    $mysqli->close();
?>
