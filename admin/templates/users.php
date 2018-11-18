<?php
/**
    *
    *
    *
    *
    * @author Tritens
    * @package admin
    */
?>
<h2>Users</h2>

<?php
   // Access database
   include ('../cms/sql_credentials.php');
   include('../cms/databaseClass.php');
   global $mysqli;
   // Items for user table
   $temp = new database();
   $temp->showUsers();
?>

<?php
/* close connection */
$mysqli->close();
?>
