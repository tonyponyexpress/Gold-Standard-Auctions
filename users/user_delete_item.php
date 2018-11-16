<?php
include ('../cms/sql_credentials.php');
global $mysqli;

    // Access database
    include ('../../cms/sql_credentials.php');
    global $mysqli;

    // Start session
    session_start();

    // Variables
    $item_id = $_POST['accept'];
    $username =  $_SESSION['user_id'];
    $delete =  $_POST['delete'];

    echo $item_id ;
    echo $username ;
    echo $delete ;

    if (!isset($item_id){
        echo "isset item id";
        // $entry = "UPDATE Project_Items SET status='accepted' WHERE item_id='$item_id';";
        // if ($mysqli->query($entry) === TRUE) {
        //     // Get actual profit
        //     $result = mysqli_query($mysqli, "SELECT * FROM Project_Users WHERE username='$username'");
        //     while ($users_row = $result->fetch_assoc()) {
        //         $profit = $users_row['total_profit'];
        //         // Get offer
        //         $result2 = mysqli_query($mysqli, "SELECT * FROM Project_Items WHERE item_id='$item_id'");
        //         while ($item_row = $result2->fetch_assoc()) {
        //             $offer = $item_row['offer'];
        //             $profit = $profit + $offer;
        //             // Update total profit
        //             $total = "UPDATE Project_Users SET total_profit='$profit' WHERE username='$username';";
        //             if ($total_result = $mysqli->query($total)) {
        //                 // header('Location: ../myAccountTab.php');
        //                 echo "Offer accepted succesfully";
        //             }
        //             else {
        //                 echo "Offer accepted, total profit not updated";
        //             }
        //         }
        //     }
        // }
        // else {
        //     echo "Offer could not proceed";
        // }
    }
    // else if (isset($delete)){
    //
    //     echo "isset delete";
    //     // $delete_items_ids = $_POST;
    //     // foreach($delete_items_ids as $id => $value){
    //     //   $query = "DELETE FROM Project_Items WHERE item_id='{$id}';";
    //     //   if ($result = $mysqli->query($query)){
    //     //     header("Location: myAccountTab.php");
    //     //   }
    //     // }
    //
    // }


$mysqli->close();
?>
