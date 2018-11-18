<?php
/**
    * Admin users
    *
    * Shows all the messages by order
    *
    * @author Tritens
    * @package admin
    */

/**
    * Redirects to home page if user hasn't logged in
    *
    * Checks if the admin_id session variable has been set. If true it shows the page, else it redirects to the login page
    *
    */
    include('adminClass.php');
    $temp = new admin();
    $temp->header_admin_login();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Get Rid of it</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../cssFiles/homeScreen.css">
    <link rel="stylesheet" href="adminCSS/admin.css">
    <link rel="stylesheet" href="adminCSS/admin_users.css">
</head>

<body>

<!-- Content -->
    <div class="wrapper">
        <!-- Sidebar  -->
        <?php
            $temp = new admin();
            $temp->tmpl_sidebar();
        ?>

        <!-- Page Content  -->
        <div id="content">
            <!-- Sidebar Toggle  -->
            <?php
                $toggle = new admin();
                $toggle->tmpl_toggle();
            ?>


             <h2> Message Board</h2>

             <?php
                // Access database
                include ('../cms/sql_credentials.php');
                global $mysqli;
             ?>

             <table class="table table-striped" >
                 <tr>
                     <th scope="col"> ID </th>
                     <th scope="col"> Message </th>
                     <th scope="col"> Username </th>
                     <th scope="col"> Answer </th>
                 </tr>


             <?php
                 $users = "SELECT * FROM Project_Messages";
                 if ($result = $mysqli->query($users)) {
                     // Get all users
                     while ($message_row = $result->fetch_assoc()) {
                         $ID = $message_row['message_id'];
                         $message = $message_row['message'];
                         $username = $message_row['username'];
                         ?>

                         <tr>
                             <th> <?php echo $ID; ?> </th>
                             <th> <?php echo $message; ?> </th>
                             <th> <a href="admin_users_profile.php?Username=<?php echo $username?>"> <?php echo $username; ?>  </a> </th>
                             <th> <a href="admin_answer.php?Username=<?php echo $username?>"> X </th>
                         </tr>
                     <?php
                     }
                     /* free result set */
                     $result->free();
                 }
                 ?>
             </table>

             <?php
             /* close connection */
             $mysqli->close();
             ?>
        </div>
     </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="style.js"></script>
</body>
</html>
