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

    $stmt = $mysqli->prepare("SELECT * FROM Project_Users WHERE username = ? AND password = ? ;");
    $stmt->bind_param("ss", $username, $hashed);
    $username = $_POST["username"];
    $password = $_POST["password"];

    $hashed = hash('sha512', $password); //hash the created user's password that will be stored in the database


    $stmt->execute();
    // Login credentials are valid
    if ($stmt->fetch()) {
        // set session
        $_SESSION['user_id'] = $username;
        header('Location: ../userPanel.php');
    }
    else {
      echo "error: invalid username or password.";
      header('Location: ../homeScreenInvalidLogin.php');
    }


    $mysqli->close();
?>
