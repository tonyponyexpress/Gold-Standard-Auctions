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
        // Create post
        $post = "INSERT INTO  Project_Items(name, description, username, image) VALUES ('$item','$description','$username','$file');";
        if ($post_result = $mysqli->query($post)) {
            echo "New record created successfully";
            // header('Location: ../sellTab.php');
            $query = "SELECT * FROM Project_Items";
                $result = mysqli_query($mysqli, $query);
                while($row = mysqli_fetch_array($result))
                {
                     echo '
                          <tr>
                               <td>
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="200" width="200" class="img-thumnail" />
                               </td>
                          </tr>
                     ';
                }
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
