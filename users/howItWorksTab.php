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
    <!-- CSS -->
    <link rel="stylesheet" href="cssFiles/howItWorksTab.css">
    <link rel="stylesheet" href="cssFiles/homeScreen.css">
</head>
<body>

    <!-- Header -->
    <?php
    /**
    *User howItWorks
    *Shows users how the selling function works
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
      <div class="col-md-3" id="howItWorksButton">
        <h1>How it Works</h1>
      </div>
      <div class="col-md-6" onclick="location.href='sellTab';" id="sellButton" style="cursor: pointer;">
        <h1>Sell</h1>
      </div>
      <div class="col-md-3" onclick="location.href='myAccountTab';" id="myAccountButton" style="cursor: pointer;">
        <h1>My Account</h1>
      </div>
    </div>

    <div class="container-fluid" style="background-color: #F2A5CB">
      <div class="row">
        <div class="col-md-6" style="text-align: center;">
          <h1><u>1) Submit Your Item</u></h1>
          <p>
            The first step in the submission process is uploading a<br>
            picture of your item, adding a title, and a brief description<br>
            Once this is done, press the submit button to submit your item<br>
            for our team of experts to review.
          </p>
          <br>
          <br>
          <br>
          <h1><u>2) Accept Our Offer</u></h1>
          <p>
            Under the "My Account" tab, users can see any current offers<br>
            on their items. Once our experts have evaluated your item <br>
            you will be able to find their competitive offer under "Current"<br>
            in your "My Account" by pressing accept you are agreeing to the <br>
            price offered by our experts.
          </p>
          <br>
          <br>
          <br>
          <h1><u>3) Get Paid</u></h1>
          <p>
            Choose from a variety of payment methods to be paid for your item.<br>
            Here we will also ask for your current address, so that we can mail<br>
            you a prepaid shipping package. Place your item in this package and<br>
            place it back in the mailbox. Please contact our staff if your item<br>
            it too large for traditional mailing methods.
          </p>
        </div>

        <div class="col-md-6" style="text-align: center;">
           <img src="../assets/submit.jpg" alt="Tony" width="200" height="250"><br>
           <img src="../assets/accept.jpg" alt="Emilia" width="200" height="250"><br>
           <img src="../assets/collect.jpg" alt="Rob" width="200" height="250">

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
