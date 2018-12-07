<?php

/**
    * Admin Delete Item
    *
    * Creates a functionsAdmin object that calls the function to delete an item by passing the item id and false for the testSuite.
    *
    * @author Tritens
    * @package admin
    */

    include ('../../cms/sql_credentials.php');
    global $mysqli;

    $delete_items_ids = $_POST;

    include('../functionsAdmin.php');
    $admin = new functionsAdmin();

    foreach($delete_items_ids as $id => $value){

        $result = mysqli_query($mysqli, "SELECT * FROM Project_Items WHERE item_id='$id'");
        while ($item_row = $result->fetch_assoc()) {
            $username = $item_row['username'];
            $offer = $item_row['offer'];
            // Decrease item counter and total profit for user
            $result = mysqli_query($mysqli, "SELECT * FROM Project_Users WHERE username='$username'");
            while ($users_row = $result->fetch_assoc()) {
                $n_items = $users_row['number_items'];
                $profit = $users_row['total_profit'];
                $n_items = $n_items - 1;
                $profit = $profit - $offer;
                $counter = "UPDATE Project_Users SET number_items='$n_items', total_profit='$profit' WHERE username='$username';";
                if ($counter_result = $mysqli->query($counter)) {
                    echo "Item count updated succesfully for " . $username . " to " . $n_items;
                    echo "Total profit updated succesfully for " . $username . " to " . $profit;
                }
                else {
                    echo "Error";
                }
            }
        }
        $admin->delete_items("false",$id);

    }


    $mysqli->close();
?>