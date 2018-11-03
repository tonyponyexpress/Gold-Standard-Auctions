<!DOCTYPE html>
<html lang="en">
<head>
    <title>Get Rid of it</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="cssFiles/homeScreen.css">
</head>
<body>

    <div class= "container-fluid" style="background-color: rgba(0,87,110,0.8)">
      <div class="row">
        <div class="col-md-6" style="text-align: center">
          <br>
          <img src="../assets/fakeLogo.jpg" alt="Logo">
          <br>
          <br>
        </div>
        <div class="col-md-1"> </div>
        <div class="col-md-2" style="text-align: center;">
          <form>
            <br>
            Username:<br>
            <input type="text" name="username"><br><br>
          </form>
        </div>
        <div class="col-md-2" style="text-align: center;">
          <form>
            <br>
            Password:<br>
            <input type="text" name="password"><br><br>
          </form>
        </div>
        <div class="col-md-1"> <br><br><input type="submit" value="Log In"><br><br></div>
      </div>
    </div>

    <h1>This will be the Contact Us page, Contact info will be uploaded later</h1>


    <!-- Footer -->
    <?php
    /**
    *User contactUs
    *Lists the contact information of the possible managers/owners
    *
    *
    *
    *@author Tritens
    *@package users
    *
    */
        // session_start();
        // include('templates/footer.php');
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
