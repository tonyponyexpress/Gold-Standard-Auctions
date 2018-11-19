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
                include('../cms/databaseClass.php');
                global $mysqli;
                // Messages for message table
                $temp = new database();
                $temp->showMessages();
             ?>

             <?php
             /* close connection */
             $mysqli->close();
             ?>
        </div>
     </div>


     <!-- Scripts  -->
     <?php
         $scripts = new admin();
         $toggle->scripts();
     ?>
     
</body>
</html>
