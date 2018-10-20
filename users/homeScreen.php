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
    <link rel="stylesheet" href="../cssFiles/homeScreen.css">
</head>
<body>

    <!-- Header -->
    <?php
        session_start();
        include('templates/header_login.php');
    ?>

    <div class="container-fluid" style="background-color: #F2A5CB">
      <div class="row">
        <div class="col-md-1"> </div>
        <div class="col-md-2" style="text-align: center;">
          <br>
          <br>
          <br>
          <blockquote>
            <p>"Follow your passion, stay true to yourself, never follow someone else’s path unless you’re in the woods and you’re lost and you see a path then by all means you should follow that"</p>
            <footer>Ian Farris</footer>
          </blockquote>
          <img src="../HeadShots/Ian.jpg" alt="Ian's headshot" style="width:60px;height:60px;">
          <br>
          <br>
          <br>
          <blockquote>
            <p>"Follow your passion, stay true to yourself, never follow someone else’s path unless you’re in the woods and you’re lost and you see a path then by all means you should follow that"</p>
            <footer>Emilia Paz</footer>
          </blockquote>
          <img src="../HeadShots/Emilia.jpg" alt="Emilia's headshot" style="width:60px;height:60px;">
        </div>
        <div class="col-md-1"> </div>
        <div class="col-md-2" style="text-align: center;">
          <br>
          <br>
          <br>
          <blockquote>
            <p>"Follow your passion, stay true to yourself, never follow someone else’s path unless you’re in the woods and you’re lost and you see a path then by all means you should follow that"</p>
            <footer>Tony Nguyen</footer>
          </blockquote>
          <img src="../HeadShots/Tony.jpg" alt="Tony's headshot" style="width:60px;height:60px;">
          <br>
          <br>
          <br>
          <blockquote>
            <p>"Follow your passion, stay true to yourself, never follow someone else’s path unless you’re in the woods and you’re lost and you see a path then by all means you should follow that"</p>
            <footer>Rob Nickel</footer>
          </blockquote>
          <img src="../HeadShots/Rob.jpg" alt="Rob's headshot" style="width:60px;height:60px;">
          <br>
          <br>
          <br>
        </div>
        <div class="col-md-2"> </div>
        <div class="col-md-4" style="text-align: center">
          <h1>Mission Statement</h1>
          <p> Here we are going to have a long inspiring paragraph<br> about the creation of this project, at this point<br>
            I'm just continuing to type to fill in the page I will<br> insert your sign up button below this long and meaningless<br>
            quote :) <br>
            <form action="backEnd/CreateUsers.php" method="post">
            First Name:<input type="text" name="newFirst"><br><br>
            Last Name:<input type="text" name="newLast"><br><br>
            Email:<input type="email" name="newEmail"><br><br>
            Username:<input type="text" name="newUsername"><br><br>
            Password:<input type="password" name="newPassword"><br><br>
            Re-enter Password:<input type="password" name="newPassword2"><br><br>
              <input type="submit" value="Sign Up" />
            </form>
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
