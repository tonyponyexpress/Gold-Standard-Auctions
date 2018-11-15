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

$stmt = $mysqli->prepare("INSERT INTO Project_Problems (title, description, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $title, $description, $email);

$title = $_POST["contactReason"];
$description = $_POST["description"];
$email = $_POST["contactEmail"];
$description = str_replace("'", "''", $description);
$email = filter_var($email, FILTER_SANITIZE_EMAIL);



if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //$add_contact = "INSERT INTO Project_Problems (title, description, email) VALUES ('$title', '$description', '$email');";
    $stmt->execute();
    header('Location: ../contactUs.php');
} else {

}

$stmt->close();
$mysqli->close();

?>
