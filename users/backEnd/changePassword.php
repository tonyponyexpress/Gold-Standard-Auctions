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
    $username =  $_SESSION['user_id'];
    $old1 = $_POST['old1'];
    $old2 =  $_POST['old2'];
    $new1 =  $_POST['new1'];
    $new2 = $_POST['new2'];

    $old_hash = hash('sha512', $old1);
    $correct_old_pass = mysqli_query($mysqli, "SELECT * FROM Project_Users WHERE username='$username' AND password='$old_hash';");


    $new_hash = hash('sha512', $new1);
    $newPass = "UPDATE Project_Users SET password='$new_hash' WHERE username='$username';";


    if (mysqli_num_rows($correct_old_pass)){
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
      else if ($pass_result = $mysqli->query($newPass)){
        echo "New password changed successfully";
      }
    }
    else{
      echo "Error: invalid old password";
    }


    // close connection
    $mysqli->close();
?>
