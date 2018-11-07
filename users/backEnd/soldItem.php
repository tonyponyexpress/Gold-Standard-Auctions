<?php
/**
*User soldItem
*how to store an item and tell if it is sold
*
*
*
*@author Tritens
*@package users
*
*/
    session_start();
    // Access database
    include ('../../cms/sql_credentials.php');
    global $mysqli;
    $item = $_POST["item"];
    $description = $_POST["description"];
    $username =  $_SESSION['user_id'];

    // Picture
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

    // Check if message is not empty
    if (!empty($item) && !empty($description) ){
        // Create post
        $post = "INSERT INTO  Project_Items(name, description, username, image) VALUES ('$item','$description','$username','$file');";
        if ($mysqli->query($post) === TRUE) {
            echo "New record created successfully";
        }
        else {
            echo "Error";
        }
    }
    else
    {
        echo "Input is not valid";
    }
    /* close connection */
    $mysqli->close();
?>
