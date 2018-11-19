<?php
/**
*User CreateUsers
*This file is in charge of creating users and storing them in a databse
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

    // Start session
    session_start();

    //statements
    $stmt2 = $mysqli->prepare("SELECT * FROM Project_Users WHERE username = ? ;");
    $stmt2->bind_param("s", $username);
    $stmt3 = $mysqli->prepare("SELECT * FROM Project_Users WHERE email = ? ;");
    $stmt3->bind_param("s", $email);
    $stmt = $mysqli->prepare("INSERT INTO Project_Users (FirstName, LastName, username, email, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $firstName, $lastName, $username, $email, $hashed);
    // Variables
    // Variables
    $username = $_POST["newUsername"];
    $password = $_POST["newPassword"];
    $password2 = $_POST["newPassword2"];
    $firstName = $_POST["newFirst"];
    $lastName = $_POST["newLast"];
    $email = $_POST["newEmail"];

    $hashed = hash('sha512', $password); //hash the created user's password that will be stored in the database

    $stmt3->execute();
    $stmt3->store_result();
    $stmt3->bind_result($result);
    $result2 = $stmt2->execute();
    echo "$result";

      if ($stmt2->fetch()){
          $error = "Username already exists";
      }
      elseif ($stmt3->fetch()){
          $error = "Email already exists";
      }
      else{

          if ($username == ''){
              $error = "Error: cannot have blank username";
          }
          else if ($email == ''){
              $error = "Error: cannot have blank email";
          }
          else if ($password == ''){
              $error = "Error: cannot have blank password";
          }
          else if ($password != $password2){
              $error = "Error: Passwords do not match up";
          }
          else if ($firstName == ''){
              $error = "Error: cannot have blank first name";
          }
          else if ($lastName == ''){
              $error = "Error: cannot have blank last name";
          }
          else if (strlen($password) < 8){
              $error = "Error: password must be 8 characters or longer";
          }
          else if($stmt->execute()){
              $error = "New user created successfully";
          }
          else{
              echo "Error: " . $mysqli->error;
          }
          $_SESSION['error'] = $error;
          header('Location: ../homeScreen.php');
      }

    $stmt2 ->close();
    $stmt3->close();
    $stmt ->close();
    $mysqli->close();
?>
