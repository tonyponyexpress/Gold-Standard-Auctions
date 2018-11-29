<?php
/**
    * My Account Tab
    *
    * My Account Tab with the items status (pending offers, offers and accepted offers) and message board
    *
    * @author Tritens
    * @package user
    */
?>


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
            <?php
                $messages = new database();
                $messages->showMessagesUser();
            ?>
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
