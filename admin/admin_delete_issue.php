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

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$id = $_GET['id'];

$query = "DELETE FROM Project_Problems WHERE problem_id='$id'";
if($mysqli->query($query)){
  header('Location: admin_problems.php');
}
else{
      echo "Post with post_id = $id could not be deleted<br>";
}
}
$mysqli->close();

?>
