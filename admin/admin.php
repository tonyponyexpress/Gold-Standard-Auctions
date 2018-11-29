<?php
/**
    * Admin: login
    *
    * Login page for the admin
    *
    * @author Tritens
    * @package admin
    */
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
    <link rel="stylesheet" href="adminCSS/admin_login.css">
</head>

<body>


    <div class="wrapper">
      <form class="form-signin" action="backEnd/admin_login.php" method="post">
        <h2>Admin login</h2>
        <input type="text" class="form-control" name="username" placeholder="Username" required=""/>
        <p> </p>
        <input type="password" class="form-control" name="password" placeholder="Password" required=""/>
        <p> </p>
        <button class="btn btn-block" id="adminLogin" type="submit" onclick="showDiv()">Login</button>

        <?php
            session_start();
            // Shows an error message if the login credentials are invalid
            if(isset($_SESSION["adminError"])){
                $adminError = $_SESSION["adminError"];
                echo "<p id='invalidMessage'>$adminError</p>";
            }
            // Destroys the adminError session and its message if the page is refreshed
            session_destroy();
        ?>

      </form>

    </div>

    <!-- Test suite -->
    <form action="testButtonAdmin.php" method="post">
        <input type="submit"  class="btn btn-lg" id="testButton" name="testSuite" id="testSuite" label="Submit" value="Test Suite"></input>
    </form>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
