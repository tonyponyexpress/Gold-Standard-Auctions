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
$mysqli = new mysqli("mysql.eecs.ku.edu", "t828n219", "se4ahqu3", "t828n219");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$username = $_POST["newUsername"];
$password = $_POST["newPassword"];
$password2 = $_POST["newPassword2"];
$firstName = $_POST["newFirst"];
$lastName = $_POST["newLast"];
$email = $_POST["newEmail"];
$query = "SELECT * FROM Project_Users WHERE username = '$username';";
$query2 = "SELECT * FROM Project_Users WHERE email = '$email';";

$result = $mysqli->query($query);
$result2 = $mysqli->query($query2);

  if ($row = $result->fetch_assoc() || $row = $result2->fetch_assoc()){
    echo "Username/Email already exists";
  }
  else{
    $add_user = "INSERT INTO Project_Users (FirstName, LastName, username, email, password) VALUES ('$firstName','$lastName','$username','$email','$password');";
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
    else if($user_result = $mysqli->query($add_user)){
      //echo "New user created successfully.<br>";
      header('Location: ../sellTab.php');
    }
    else{
      echo "Error: " . $mysqli->error;
    }
  }

$mysqli->close();

?>
