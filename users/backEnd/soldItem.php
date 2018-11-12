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
    $description = str_replace("'", "''", $description);

    // Picture
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

    // Check if message is not empty
    if (!empty($item) && !empty($description) ){
        // Create item
        $post = "INSERT INTO  Project_Items(name, description, username, image) VALUES ('$item','$description','$username','$file');";
        if ($post_result = $mysqli->query($post)) {
            // Increase item counter for user
            $result = mysqli_query($mysqli, "SELECT * FROM Project_Users WHERE username='$username'");
            while ($users_row = $result->fetch_assoc()) {
                $n_items = $users_row['number_items'];
                $n_items = $n_items + 1;
                echo $n_items;
                $counter = "UPDATE Project_Users SET number_items='$n_items' WHERE username='$username';";
                if ($counter_result = $mysqli->query($counter)) {
                    echo "Item count updated succesfully";
                }
                else {
                    echo "Error";
                }
            }
            echo "New item submitted successfully";
            header('Location: ../sellTab.php');
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
