<?php
/**
    * User Change Email
    *
    * Destroys the session variable and logs the user out. Redirects to the login panel.
    *
    * @author Tritens
    * @package user
    */

    // Always start this first
    session_start();

    // Destroying the session clears the $_SESSION variable, thus "logging" the user
    // out. This also happens automatically when the browser is closed
    session_destroy();

    header('Location: ../homeScreen.php');
?>
