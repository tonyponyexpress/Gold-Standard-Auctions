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
    <link rel="stylesheet" href="cssFiles/website.css">

</head>
<body>

    <?php
    /**
        * User Return Policy
        *
        * Shows the return policy 
        *
        * @author Tritens
        * @package user
        */
        include('usersClass.php');
        $temp = new users();
        $temp->header_login_user();
    ?>


    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <div class= "center" style= "text-align: center; margin-top: 2%;"><font color="#2F2FA2"><h1>Return Policy</h1></font>
          </div>
          <div class= "center" style= "text-align: center;">
            <p>
              We will hold you item with us for 5 business days. If during that time you wish to reclaim your item, simply<br>
              return the form of payment which you recieved and we will mail back your item, shipping on us!
            </p>
          </div>


        </div>
        <div class="col-md-3"></div>
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
