<?php
    session_start();
    $mysqli = new mysqli("mysql.eecs.ku.edu", "t828n219", "se4ahqu3", "t828n219");

    /* check connection */
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_errno);
        exit();
    }

    $item = $_POST["item"];
    $description = $_POST["description"];
    $picture = $_POST["picture"];
    $username =  $_SESSION['user_id'];

    // Check if message is not empty
    if (!empty($item) && !empty($description) ){
        // Create post
        $post = "INSERT INTO  Project_Items(name, description, username) VALUES ('$item','$description','$username');";
        if ($mysqli->query($post) === TRUE) {
            echo "New record created successfully";
        }
        else {
            echo "Error";
        }
    }
    else
    {
        echo "Imput is not valid";
    }


    /* close connection */
    $mysqli->close();

?>
