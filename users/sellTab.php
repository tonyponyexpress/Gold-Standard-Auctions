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
    <link rel="stylesheet" href="cssFiles/website.css">
</head>
<body>


    <!-- Header -->
    <?php
        $temp = new users();
        $temp->header_user();
    ?>


    <div class="row">
      <div class="col-md-3" onclick="location.href='howItWorksTab';" id="howItWorksButton" style="cursor: pointer;">
        <h1>How it Works</h1>
      </div>
      <div class="col-md-6" id="sellButton">
        <h1>Sell</h1>
      </div>
      <div class="col-md-3" onclick="location.href='myAccountTab';" id="myAccountButton" style="cursor: pointer;">
        <h1>My Account</h1>
      </div>
    </div>


  <form class="form-sell" action="backEnd/soldItem.php" method="post" enctype="multipart/form-data">
      <div class="form-signing form-group row">
        <label for="item" class="col-sm-2 col-form-label">Item</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="item" placeholder="Item">
        </div>
      </div>

      <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
          <textarea type="text" class="form-control" name="description" placeholder="Description"> </textarea>
        </div>
      </div>

      <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label">Picture</label>
        <div class="col-sm-10">
          <input type="file" class="form-control" name="image" id="image" placeholder="Browse">
        </div>
      </div>

      <div class="form-group row">
        <div class="col-sm-12">
          <input type="submit" class="btn" name="submit" id="submit" label="Submit" value="Submit"></input>
        </div>
      </div>
  </form>

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


<script>
 // Only accepts gif, png, jpg, jpeg files
 $(document).ready(function(){
      $('#submit').click(function(){
           var image_name = $('#image').val();
           if(image_name == '')
           {
                alert("Please Select Image");
                return false;
           }
           else
           {
                var extension = $('#image').val().split('.').pop().toLowerCase();
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                {
                     alert('Invalid Image File');
                     $('#image').val('');
                     return false;
                }
           }
      });
 });
 </script>
