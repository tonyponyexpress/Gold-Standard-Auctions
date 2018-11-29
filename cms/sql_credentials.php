<?php
/**
    * SQL credentials
    *
    * Valid credentials for login to the mysql database
    *
    * @author Tritens
    * @package admin
    */

    $mysqli = new mysqli("mysql.eecs.ku.edu", "t828n219", "se4ahqu3", "t828n219");
    /* check connection */
    if ($mysqli->connect_error) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
?>
