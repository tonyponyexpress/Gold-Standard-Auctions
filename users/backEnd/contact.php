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

$title = $_POST["contactReason"];
$description = $_POST["description"];
$email = $_POST["contactEmail"];


$add_contact = "INSERT INTO Project_Problems (title, description, email) VALUES ('$title', '$description', '$email');";
if($user_result = $mysqli->query($add_contact)){
  //echo "New user created successfully.<br>";
  header('Location: ../contactUs.php');
}
$mysqli->close();

?>
