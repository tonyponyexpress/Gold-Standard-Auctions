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

    $mysqli = new mysqli("mysql.eecs.ku.edu", "t828n219", "se4ahqu3", "t828n219");

    /* check connection */
    if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
    }
    $username = $_POST["username"];
    $password = $_POST["password"];


    $login = mysqli_query($mysqli, "SELECT * FROM Project_Users WHERE username='$username' AND password='$password';");

    // Login credentials are valid
    if (mysqli_num_rows($login)) {
        // set session
        $_SESSION['user_id'] = $username;
        header('Location: ../sellTab');
    }
    else {
      echo "error: invalid username or password.";
    }


    $mysqli->close();
?>
