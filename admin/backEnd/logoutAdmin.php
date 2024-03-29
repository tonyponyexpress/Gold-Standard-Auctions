<?php
/**
    * logoutAdmin
    *
    * Logs out the user and redirects to admin.php (login screen)
    *
    * @author Tritens
    * @package admin
    */


// Always start this first
session_start();

// Destroying the session clears the $_SESSION variable, thus "logging" the user
// out. This also happens automatically when the browser is closed
session_destroy();

header('Location: ../admin.php');
?>
