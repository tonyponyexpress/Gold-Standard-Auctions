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
    <link rel="stylesheet" href="cssFiles/homeScreen.css">
    <link rel="stylesheet" href="cssFiles/website.css">
</head>
<body>

    <!-- Header -->
    <?php
    /**
    *User homescreen
    *Shows the homescreen and allows users to login in, as well as creating users
    *
    *
    *
    *@author Tritens
    *@package users
    *
    */
        session_start();
        include('templates/header_login.php');
    ?>

    <div class="container-fluid" style="margin-top: 3%;">
      <div class="row">
        <div class="col-md-2" style="text-align: center;">
          <div class="pad" style="margin-bottom: 30%;"><img src="../assets/guarantee.jpg" alt="Guarantee"> </div>
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                  <blockquote>
                    <p>"Very simple and helpful company. Provided me with free shipping material, high offer, and a quick process. Even though what I had was a used iPhone they still took the time to evaluate what I had and gave me a good offer and process to sell it."</p>
                    <footer>Ian Farris</footer>
                  </blockquote>
                  <img src="../HeadShots/Ian.jpg" alt="Ian's headshot" style="width:50%;height:50%;">
                </div>
                <div class="carousel-item">
                  <blockquote>
                    <p>"You can get some very impressive offers here. I would definitely recommend if you are not trying to hassle with selling things on Craigslist.  "</p>
                    <footer>Emilia Paz</footer>
                  </blockquote>
                  <img src="../HeadShots/Emilia.jpg" alt="Emilia's headshot" style="width:50%;height:50%;">
                </div>
                <div class="carousel-item">
                  <blockquote>
                    <p>"Great place quick service. Went to sell two rings cleaned and yearly inspected. While selling there we decided to sell a few odds and ends from around the house. The site offered high prices and was very easy to use. This company makes selling stuff a real pleasure. I love this company and the hospitality they give their customers."</p>
                    <footer>Tony Nguyen</footer>
                  </blockquote>
                  <img src="../HeadShots/Tony.jpg" alt="Tony's headshot" style="width:50%;height:50%;">
                </div>
                <div class="carousel-item">
                  <blockquote>
                    <p>"Always have stuff I can get rid of on here! Great pricing and friendly knowledgeable customer service! NEVER had issues doing business with them!!!"</p>
                    <footer>Rob Nickel</footer>
                  </blockquote>
                  <img src="../HeadShots/Rob.jpg" alt="Rob's headshot" style="width:50%;height:50%;">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
              </a>
          </div>
        </div>

        <div class= "col-md-6" style= "text-align: center;">
          <div class="container-fluid">
            <div class="row" style="text-align: center; padding-left: 12%; padding-right: 12%; padding-top: 3%; padding-bottom: 15%;">
                <img src="../assets/frontGraphic.png" alt="satisfaction" style="width:100%; height:80%;">
            </div>
          </div>
          <img src="../assets/satisfaction.jpeg" alt="satisfaction" style="width:21%;height:15%; margin-right: 2%; margin-left: 2%;">
          <img src="../assets/reviews.png" alt="reviews" style="width:18%;height:15%; margin-right: 2%; margin-left: 2%;">
          <img src="../assets/paidthemost.jpeg" alt="paid the most" style="width:18%;height:15%; margin-right: 2%; margin-left: 2%;">
          <img src="../assets/bestprice.jpeg" alt="best price" style="width:15%;height:15%; margin-right: 2%; margin-left: 2%;">
          <br><br>
          <h1><b>What we buy</b></h1>
          <p> Get Rid of it serves as a great outlet to turn any of your old or unused items including jewelry, coins, electronics, gaming systems, phones, laptops, furniture,
            cars, precious metals, or any other unwanted items into cash today. Submit your item to us and let our experts give you a cash quote today. No more dealing with the hassle of waiting
            on other sites to see if your items sell. If you need fast cash today then Get Rid of It is the place to be!</p>
        </div>


        <div class="col-md-4" style="text-align: center;">
          <h1>Create Account</h1>
          <p> GetRidofIt is known for creating a simple buying concept which offers the highest dollar cash payout for any collectible items, furthermore, serving our customers in a manner that will generate a referral business that money can't buy. </p>

            <form action="backEnd/CreateUsers.php" method="post">
                <div class="form-group row">
                  <label for="item" class="col-sm-3 col-form-label">First Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="newFirst">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="description" class="col-sm-3 col-form-label">Last Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="newLast">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="description" class="col-sm-3 col-form-label">Email</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" name="newEmail">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="description" class="col-sm-3 col-form-label">Username</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="newEmail">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="description" class="col-sm-3 col-form-label">Password</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" name="newPassword">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="description" class="col-sm-3 col-form-label">Re-enter Password</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" name="newPassword2">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-12">
                    <input type="submit" class="btn" name="submit" id="submitItem" label="Submit" value="Sign Up"></input>
                  </div>
                </div>
            </form>
            <?php
                session_start();
                if(isset($_SESSION["error"])){
                    $error = $_SESSION["error"];
                    echo "<p id='invalidMessage'>$error</p>";
                }
            ?>
        </div>


      </div>
    </div>


    <!-- Footer -->
    <?php
        include('usersClass.php');
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
