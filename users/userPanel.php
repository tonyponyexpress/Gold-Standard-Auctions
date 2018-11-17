<?php
/**
    * Sell title
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
    <title>Get Rid of it</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="cssFiles/sellTab.css">
    <link rel="stylesheet" href="cssFiles/myAccountTab.css">
    <link rel="stylesheet" href="cssFiles/howItWorks.css">
    <link rel="stylesheet" href="cssFiles/website.css">
</head>
<body>


    <!-- Header -->
    <?php
        $temp = new users();
        $temp->header_user();
    ?>

<div class="container-fluid">
    <!-- <form class="userBar" action="backEnd/userPanel.php" method="post">
        <div class="row">
                <div class="col-md-3">
                    <input type="submit" class="btn btn-lg .btn-block userNavbar" name="option" label="howItWorks" value="howItWorks"></input>
                </div>
                <div class="col-md-6">
                    <input type="submit" class="btn btn-lg .btn-block userNavbar" name="option" label="sell" value="sell"></input>
                </div>
                <div class="col-md-3">
                    <input type="submit" class="btn btn-lg .btn-block userNavbar" name="option" label="myAccount" value="myAccount"></input>
                </div>
        </div>
    </form> -->

    <div class="row">
        <div class="col-md-3">
            <input type="button" class="btn btn-lg .btn-block userNavbar" id="howItWorksButton" value="howItWorks" onclick="showHowItWorks()"></input>
            <!-- <a class="btn btn-lg .btn-block userNavbar" data-toggle="collapse" href="#howItWorks" role="button" aria-expanded="false" aria-controls="collapseExample" data-parent="#userBar"> How It Works </a> -->
        </div>
        <div class="col-md-6">
            <input type="button" class="btn btn-lg .btn-block userNavbar" id="sellButton" value="Sell" onclick="showSell()"></input>
            <!-- <a class="btn btn-lg .btn-block userNavbar" data-toggle="collapse" href="#sell" role="button" aria-expanded="false" aria-controls="collapseExample" data-parent="#userBar" > Sell </a> -->
        </div>
        <div class="col-md-3">
            <input type="button" class="btn btn-lg .btn-block userNavbar" id="myAccountButton" value="My Account" onclick="showMyAccount()"></input>
            <!-- <a class="btn btn-lg .btn-block userNavbar" data-toggle="collapse" href="#myAccount" role="button" aria-expanded="false" aria-controls="collapseExample"  > My Account </a> -->
        </div>
    </div>


    <div id="userTabs">
        <div id="howItWorks" style="display:none;">
            <div class="row">
              <div class="col-md-6" style="text-align: center; margin-top: 50px;">
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
        </div>

        <div id="sell" style="display:none;" >
            <div class="row">
              <div class="card card-body">
                  <form class="form-sell" action="backEnd/soldItem.php" method="post" enctype="multipart/form-data">
                      <div class="form-signing form-group row">
                        <label for="item" class="col-sm-2 col-form-label">Item</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="item" id="item" placeholder="Item">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                          <textarea type="text" class="form-control" name="description" id="descriptionItem" placeholder="Description"> </textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Picture</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" name="image" id="imageItem" placeholder="Browse">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-12">
                          <input type="submit" class="btn" name="submit" id="submitItem" label="Submit" value="Submit"></input>
                        </div>
                      </div>
                  </form>
              </div>
          </div>
        </div>

        <div id="myAccount" style="display:none;" >
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
                                // free result set
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
                    </div>

                </div>
            </div>
        </div>
    </div>



  <!-- Footer -->
  <?php
      $temp = new users();
      $temp->tmpl_footer();
  ?>

  <script>
      function showHowItWorks() {
          document.getElementById('howItWorks').style.display = "block";
          document.getElementById('sell').style.display = "none";
          document.getElementById('myAccount').style.display = "none";
          document.getElementById('howItWorksButton').style.backgroundColor="#474a4b";
          document.getElementById('sellButton').style.backgroundColor="#797d7f";
          document.getElementById('myAccountButton').style.backgroundColor="#797d7f";
      }
      function showSell() {
          document.getElementById('howItWorks').style.display = "none";
          document.getElementById('sell').style.display = "block";
          document.getElementById('myAccount').style.display = "none";
          document.getElementById('howItWorksButton').style.backgroundColor="#797d7f";
          document.getElementById('sellButton').style.backgroundColor="#474a4b";
          document.getElementById('myAccountButton').style.backgroundColor="#797d7f";
      }
      function showMyAccount() {
          document.getElementById('howItWorks').style.display = "none";
          document.getElementById('sell').style.display = "none";
          document.getElementById('myAccount').style.display = "block";
          document.getElementById('howItWorksButton').style.backgroundColor="#797d7f";
          document.getElementById('sellButton').style.backgroundColor="#797d7f";
          document.getElementById('myAccountButton').style.backgroundColor="#474a4b";
      }
  </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/effects.js"></script>
</body>
</html>
