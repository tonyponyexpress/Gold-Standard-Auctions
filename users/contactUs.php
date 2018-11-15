<!DOCTYPE html>
<html lang="en">
<head>
    <title>Get Rid of it</title>
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
    *User faq
    *Lists the faq that customers may have
    *
    *
    *
    *@author Tritens
    *@package users
    *
    */
      include('usersClass.php');
      $temp = new users();
      $temp->header_login_user();
  ?>
    <div class = "row">
      <div class ="col-md-12">
        <div class = "center" style = "text-align: center; margin-top: 25px;">
          <font color="#2F2FA2"><h1>Welcome to the Contact us page</h1></font>
        </div>
      </div>
    </div>
    <div class = "row"></div>
    <div class="col-xs-12" style="height:100px;"></div> <!--creates blank space -->

    <form class="form-contact" action="backEnd/contact.php" method="post">
      <div class = "container-fluid">
        <div class = "row">
          <div class ="col-md-3"></div>
          <div class ="col-md-6">
            <div class = "center" style = "text-align: left;">

              <p> Please select your reason for contacting us:
              <select name = "contactReason">
                <option value = "Issue with creating an account"> Issue with creating an account</option>
                <option value = "Problem logging in to existing account"> Problem logging in to existing account</option>
                <option value = "Questions about the Get Rid of It process"> Questions about the Get Rid of It process</option>
              </select>

            </p>
            <div class="col-xs-12" style="height:25px;"></div>
            <textarea rows="5" name = "description" cols="100" placeholder = "Please input the description of your issue here."></textarea>
            <div class="col-xs-12" style="height:25px;"></div>
            <p> please provide an email address we can reach you at:
            <input type = "text" name = "contactEmail"> </input>
          </p>
          </div>

          <div class="col-xs-12" style="height:25px;"></div>
          <div class = "col-md-3"></div>
        </div>
      </div>
      <div class = "row">
        <div class = "col-md-12">
          <div class = "center" style = "text-align: center">
            <input type = "submit" value = "Submit">
          </div>
      </div>
    </div>
  </form>

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
