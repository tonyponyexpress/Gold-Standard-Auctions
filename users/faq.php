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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    .accordion {
        background-color: #eee;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
    }

    .active, .accordion:hover {
        background-color: #ccc;
    }

    .panel {
        padding: 0 18px;
        display: none;
        background-color: white;
        overflow: hidden;
    }
    </style>
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


    <div class="container-fluid" >
      <div class="row">
        <div class="col-md-6">
          <div class= "center" style= "text-align: center;"><h2>Frequently Asked Questions</h2></div>

          <button class="accordion">Question 1</button>
          <div class="panel">
            <p>Answer 1</p>
          </div>

          <button class="accordion">Question 2</button>
          <div class="panel">
            <p>Answer 2</p>
          </div>

          <button class="accordion">Question 3</button>
          <div class="panel">
            <p>Answer 3</p>
          </div>

          <button class="accordion">Question 4</button>
          <div class="panel">
            <p>Answer 4</p>
          </div>

          <button class="accordion">Question 5</button>
          <div class="panel">
            <p>Answer 5</p>
          </div>

          <button class="accordion">Question 6</button>
          <div class="panel">
            <p>Answer 6</p>
          </div>

          <script>
          var acc = document.getElementsByClassName("accordion");
          var i;

          for (i = 0; i < acc.length; i++) {
              acc[i].addEventListener("click", function() {
                  this.classList.toggle("active");
                  var panel = this.nextElementSibling;
                  if (panel.style.display === "block") {
                      panel.style.display = "none";
                  } else {
                      panel.style.display = "block";
                  }
              });
          }
          </script>
        </div>
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
