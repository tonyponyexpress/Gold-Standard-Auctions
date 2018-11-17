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
    <style>
    .accordion {
        background-color: #2F2FA2;
        color: white;
        cursor: pointer;
        padding: 4%;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 100%;
        transition: 0.4s;
        border-bottom: 6px solid #F64C72;
    }

    .active, .accordion:hover {
        background-color: #1a75ff;
    }

    .panel {
        padding: 2%;
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


    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6" style= "margin-top: 2%;">
          <div class= "center" style= "text-align: center; margin-bottom: 3%;"><font color="#2F2FA2"><h2>Frequently Asked Questions</h2></font></div>

          <button class="accordion">How will my items be evaluated?</button>
          <div class="panel">
            <p>Our team of experts will take an in depth look at your item, considering its condition, age, and current value.<br>
            After coming to a price, our experts will do research to make sure their offer is fair. Once a fair price has been<br>
            determined, our team will make you an offer which will appear under the "current offer" heading on your account page.</p>
          </div>

          <button class="accordion">How soon can I expect an offer?</button>
          <div class="panel">
            <p>You can expect an offer on your item within 1 business day.</p>
          </div>

          <button class="accordion">How will I send my items to you?</button>
          <div class="panel">
            <p>After excepting our offer, we will ship you a prepaid envelope in which to place your items. Simply place<br>
            your item(s) in the provided envelope and mail it back to us. Once your item has been recieved you will be paid<br>
            for your item via your chosen method.</p>
          </div>

          <button class="accordion">Can I sell multiple items at once?</button>
          <div class="panel">
            <p>Of course! Just make sure to specify in your description which items you intend to sell, and make sure that<br>
            all items which you wish to sell are visible in the pictures you upload.</p>
          </div>

          <button class="accordion">How will I be compensated for my items?</button>
          <div class="panel">
            <p>You may choose from a variety of options including check, wire transfer, paypal, and money order. Just let our<br>
            team know upon checkout which option works best for you!</p>
          </div>

          <button class="accordion">What to do if I would like my item back?</button>
          <div class="panel">
            <p>We will hold you item with us for 5 business days. If during that time you wish to reclaim your item, simply <br>
            return the form of payment which you recieved and we will mail back your item, shipping on us!</p>
          </div>

          <button class="accordion">What to do if I don't see my question answered here?</button>
          <div class="panel">
            <p>Follow the Contact Us link at the bottom of the page to submit your own questions!</p>
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
