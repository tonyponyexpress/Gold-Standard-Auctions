<?php
/**
    * User settings
    *
    * Description goes here
    * @author Tritens
    * @package user
    */
// // Redirect to home page if user hasn't logged in
include('usersClass.php');
$temp = new users();
$temp->header_homeScreen();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Get Rid of it: User Settings</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="cssFiles/website.css">
    <link rel="stylesheet" href="cssFiles/settings.css">
</head>
<body>


    <!-- Header -->
    <?php
        $temp = new users();
        $temp->header_user();
    ?>

    <!-- Settings -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1">
            </div>

            <div class="col-md-6 settings_box">
                <div class="settings_box_title">
                    <h4> User Account </h4>
                </div>
                <div class="settings_box_content">
                    <?php
                        // Access database
                        include ('../cms/sql_credentials.php');
                        global $mysqli;
                        // Start session
                        session_start();
                        // Variables
                        $username =  $_SESSION['user_id'];
                        $result = mysqli_query($mysqli, "SELECT * FROM Project_Users WHERE username='$username'");
                        while ($users_row = $result->fetch_assoc()) {
                            $firstName = $users_row['FirstName'];
                            $lastName = $users_row['LastName'];
                            $email = $users_row['email'];
                            $numberItems = $users_row['number_items'];
                            $totalProfit = $users_row['total_profit'];
                        }
                    ?>
                    <p> <span> First Name: </span> <?php echo $firstName ?> </p>
                    <p> Last Name: <?php echo $lastName ?> </p>
                    <p> Email: <?php echo $email ?> </p>
                    <p> Username: <?php echo $username ?> </p>
                    <p> Password: ********** </p>

                </div>
            </div>

            <div class="col-md-1">
            </div>

            <div class="col-md-3 settings_box">
                <div class="settings_box_title">
                    <h4> User Information </h4>
                </div>
                <div class="settings_box_content">
                    <p> Total # items: <?php echo $numberItems ?> </p>
                    <p> Total profit: <?php echo $totalProfit ?> </p>
                </div>
            </div>

            <div class="col-md-1">
            </div>

        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1">
            </div>

            <div class="col-md-10 settings_box">
                <div class="settings_box_title">
                    <h4> Settings </h4>
                </div>
                <div class="settings_box_content">
                    <p> Change email </p>
                    <p> Change password</p>
                </div>
            </div>

            <div class="col-md-1">
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php
        $temp = new users();
        $temp->tmpl_footer();
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
