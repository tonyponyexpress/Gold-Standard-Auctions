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
    echo "Username already exists";

    //header('Location: ../homeScreen.php');
  }
  elseif ($stmt3->fetch()){
    echo "Email already exists";
  }
  else{

    if ($username == ''){
      echo "Error: cannot have blank username";
    }
    else if ($email == ''){
      echo "Error: cannot have blank email";
    }
    else if ($password == ''){
      echo "Error: cannot have blank password";
    }
    else if ($password != $password2){
      echo "Error: Passwords do not match up";
    }
    else if ($firstName == ''){
      echo "Error: cannot have blank first name";
    }
    else if ($lastName == ''){
      echo "Error: cannot have blank last name";
    }
    else if (strlen($password) < 8){
      echo "Error: password must be 8 characters or longer";
    }
    else if($stmt->execute()){
      //echo "New user created successfully.<br>";
      header('Location: ../homeScreen.php');
    }
    else{
      echo "Error: " . $mysqli->error;
    }
  }

  $stmt2 ->close();
  $stmt3->close();
  $stmt ->close();
$mysqli->close();
?>
