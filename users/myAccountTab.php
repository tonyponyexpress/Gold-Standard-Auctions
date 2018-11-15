<?php
// // Redirect to home page if user hasn't logged in
include('usersClass.php');
$temp = new users();
$temp->header_homeScreen();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Get Rid of it</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="cssFiles/myAccountTab.css">
    <link rel="stylesheet" href="cssFiles/website.css">
    <script src="script.js"></script>
</head>

<body>
    <!-- Header -->
    <?php
    /**
    *User myAccountTab
    *Shows the user's account information
    *
    *
    *
    *@author Tritens
    *@package users
    *
    */
        $temp = new users();
        $temp->header_user();
    ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-3" onclick="location.href='howItWorksTab';" id="howItWorksButton" style="cursor: pointer;">
      <h1>How it Works</h1>
    </div>
    <div class="col-md-6" onclick="location.href='sellTab';" id="sellButton" style="cursor: pointer;">
      <h1>Sell</h1>
    </div>
    <div class="col-md-3" id="myAccountButton">
      <h1>My Account</h1>
    </div>
  </div>

    <br>


    <div class="row">
        <div class="col-md-8">
            <h2> Items </h2>
            <h5> Total profit: $
                <?php
                    // Access database
                    include ('../cms/sql_credentials.php');
                    global $mysqli;
                    // Start session
                    session_start();
                    // Variables
                    $username =  $_SESSION['user_id'];
                    // Query
                    $user = "SELECT total_profit FROM Project_Users WHERE username='$username' ";
                    if ($result = $mysqli->query($user)) {
                        while ($users_row = $result->fetch_assoc()) {
                            $total_profit = $users_row['total_profit'];
                            echo $total_profit;
                        }
                    }
                ?>
            </h5>

            <div class="accordion" id="accordionExample">
              <div class="card">

                <div class="card-header" id="headingOne">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Pending Offers
                    </button>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body">
                      <?php
                         include('../cms/databaseClass.php');
                         // Pending offer items table
                         $temp = new database();
                         $temp->showItemsUser("pending");
                      ?>
                  </div>
                </div>
              </div>

              <div class="card">
                <div class="card-header" id="headingTwo">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Offers
                    </button>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                  <div class="card-body">
                      <?php
                         // Offer items table
                         $temp = new database();
                         $temp->showItemsUser("offer");
                      ?>
                  </div>
                </div>
              </div>

              <div class="card">
                <div class="card-header" id="headingThree">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Accepted Offers
                    </button>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                  <div class="card-body">
                      <?php
                         // Offer items table
                         $temp = new database();
                         $temp->showItemsUser("accepted");
                      ?>
                  </div>
                </div>
              </div>

            </div>

        </div>

        <div class="col-md-4">
            <h2> Message Board </h2>
            <div id="message-board">

                <table class="table" >
                <?php
                    // Access database
                    include ('../cms/sql_credentials.php');
                    global $mysqli;

                    // Get username
                    session_start();
                    $username =  $_SESSION['user_id'];

                    $messages = "SELECT * FROM Project_Messages WHERE username='$username' ORDER BY message_id ";

                    if ($result = $mysqli->query($messages)) {
                        // Get all users
                        while ($message_row = $result->fetch_assoc()) {
                            $ID = $message_row['message_id'];
                            $message = $message_row['message'];
                            $admin = $message_row['admin'];

                            if ($admin == 1){
                                ?>
                                <tr>
                                    <th id="message-admin"> admin: <?php echo $message; ?> </th>
                                </tr>
                                <?php
                            }
                            else{
                                ?>
                                <tr>
                                    <th id="message-user"> user: <?php echo $message; ?> </th>
                                </tr>
                                <?php
                            }
                        }
                        /* free result set */
                        $result->free();
                    }
                    ?>
                </table>

            </div>
            </br>
            <div id="message-submission">
                <form action="backEnd/sendMessage.php" method="post">
                    <textarea id="message-box" type="text" name="message" placeholder="Message" required=""> </textarea>
                    <button class="btn btn-sml btn-block btnsubmit" type="submit">Submit message</button>
                </form>
                <!-- <a class="btn btn-secondary btn-block" href="sendMessage.php" role="button">Submit message</a> -->
            </div>

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
