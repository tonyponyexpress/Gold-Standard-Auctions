<?php
session_start();
// Redirect to home page if user hasn't logged in
if ( ! isset( $_SESSION['user_id'] ) ) {
    header("Location: homeScreen.php");
}
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
    <link rel="stylesheet" href="cssFiles/homeScreen.css">
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
        session_start();
        include('templates/header_user.php');
    ?>

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

  <!-- <div class="row">
    <div class="col-md-6" style="text-align: center">
      <div style="border: 5px solid blue;">
        <h1>Current</h1>
      </div>
        <p>
          <table class="table table-striped" >
            <tr>
            <th scope="col"> Item </th>
            <th scope="col"> Current Offer </th>
            </tr>
          </table>
        </p>
    </div>
  </div>


  <div class="row">
    <div class="col-md-6" style="text-align: center">
      <div style="border: 5px solid blue;">
        <h1>Past</h1>
      </div>
        <p>
          <table class="table table-striped" >
            <tr>
            <th scope="col"> Item </th>
            <th scope="col"> Sold Price </th>
            <th scope="col"> Profit to Date </th>
            </tr>
          </table>
        </p>
    </div>
  </div> -->


  <div class="row">
    <div class="col-md-8">
      <h2>Offers</h2>
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

                $messages = "SELECT * FROM Project_Messages WHERE username='$username' ";

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



  <!-- Footer -->
  <?php
      session_start();
      include('templates/footer.php');
  ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
