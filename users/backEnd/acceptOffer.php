<?php
/**
*accept offers
*This file changes the status of an offer to accepted
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

    // Start session
    session_start();

    // Variables
    $item_id = $_POST['accept'];
    $username =  $_SESSION['user_id'];

    $entry = "UPDATE Project_Items SET status='accepted' WHERE item_id='$item_id';";
    if ($mysqli->query($entry) === TRUE) {
        // Get actual profit
        $result = mysqli_query($mysqli, "SELECT * FROM Project_Users WHERE username='$username'");
        while ($users_row = $result->fetch_assoc()) {
            $profit = $users_row['total_profit'];
            // Get offer
            $result2 = mysqli_query($mysqli, "SELECT * FROM Project_Items WHERE item_id='$item_id'");
            while ($item_row = $result2->fetch_assoc()) {
                $offer = $item_row['offer'];
                $profit = $profit + $offer;
                // Update total profit
                $total = "UPDATE Project_Users SET total_profit='$profit' WHERE username='$username';";
                if ($total_result = $mysqli->query($total)) {
                    header('Location: ../myAccountTab.php');
                    echo "Offer accepted succesfully";
                }
                else {
                    echo "Offer accepted, total profit not updated";
                }
            }
        }
    }
    else {
        echo "Offer could not proceed";
    }

    // close connection
    $mysqli->close();

?>
