<?php

/**
    * createOffer
    *
    *
    *
    * @author Tritens
    * @package admin
    */

    // Access database
    include ('../../cms/sql_credentials.php');

    // Global database variable
    global $mysqli;

    // Variables
    $item_id = $_POST["item_id"];
    $offer =  $_POST["offer"];
    $test="false";

    include('../functionsAdmin.php');
    $admin = new functionsAdmin();
    $admin->createOffer($test,$item_id,$offer);

?>
