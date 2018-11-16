
<?php
/**
* User settings: change Email
* Changes the user email
*
*
*
*@author Tritens
*@package users
*
*/
    // Access database
    include ('../../cms/sql_credentials.php');
    global $mysqli;
    // Start user session
    session_start();
    // Variables
    $stmt = $mysqli->prepare("UPDATE Project_Users SET email= ? WHERE username= ? ;");
    $stmt->bind_param("ss", $newEmail, $username);

    $username =  $_SESSION['user_id'];
    $newEmail =  $_POST['newEmail1'];
    $user = "UPDATE Project_Users SET email='$newEmail' WHERE username='$username';";

    if ($stmt->execute()) {
        echo "Email updated succesfully";
        header('Location: ../settings.php');
    }
    else {
        echo "Error";
    }
    // close connection
    $stmt->close();
    $mysqli->close();
?>
