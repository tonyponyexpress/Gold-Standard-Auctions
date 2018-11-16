<?php
/**
* User settings: change password
* Changes the user password
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

    $stmt = $mysqli->prepare("SELECT * FROM Project_Users WHERE username= ? AND password = ? ;");
    $stmt->bind_param("ss", $username, $old_hash);
    $stmt2 = $mysqli->prepare("UPDATE Project_Users SET password= ? WHERE username= ? ;");
    $stmt2->bind_param("ss", $new_hash, $username);

    $username =  $_SESSION['user_id'];
    $old1 = $_POST['old1'];
    $old2 =  $_POST['old2'];
    $new1 =  $_POST['new1'];
    $new2 = $_POST['new2'];

    $old_hash = hash('sha512', $old1);
    $new_hash = hash('sha512', $new1);

    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($result);

    if ($stmt->fetch()){
      //echo "Correct old password";
      if (($old1 == '') || ($old2 == '') || ($new1 == '') || ($new2 == '')){
        echo "Error: cannot have blank input for passwords";
      }
      else if ($old1 != $old2){
        echo "Error: old password inputs does not match up";
      }
      else if ($new1 != $new2){
        echo "Error: new password inputs do not match up";
      }
      else if(strlen($new1) < 8){
        echo "new password must be 8 characters or longer.";
      }
      else if ($stmt2->execute()){
        echo "New password changed successfully";
        header('Location: ../settings.php');
      }
    }
    else{
      echo "Error: invalid old password";
    }


    // close connection
    $mysqli->close();
?>
