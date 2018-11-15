<?php
/**
    * User settings
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
    <title>Get Rid of it: User Settings</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="cssFiles/website.css">
    <link rel="stylesheet" href="cssFiles/settings.css">
</head>
<body>


    <!-- Header -->
    <?php
        $temp = new users();
        $temp->header_user();
    ?>

    <!-- Settings -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1">
            </div>

            <div class="col-md-6 settings_box">
                <div class="settings_box_title">
                    <h4> User Account </h4>
                </div>
                <div class="settings_box_content">
                    <?php
                        // Access database
                        include ('../cms/sql_credentials.php');
                        global $mysqli;
                        // Start session
                        session_start();
                        // Variables
                        $username =  $_SESSION['user_id'];
                        $result = mysqli_query($mysqli, "SELECT * FROM Project_Users WHERE username='$username'");
                        while ($users_row = $result->fetch_assoc()) {
                            $firstName = $users_row['FirstName'];
                            $lastName = $users_row['LastName'];
                            $email = $users_row['email'];
                            $numberItems = $users_row['number_items'];
                            $totalProfit = $users_row['total_profit'];
                        }
                    ?>
                    <p> <span> First Name: </span> <?php echo $firstName ?> </p>
                    <p> Last Name: <?php echo $lastName ?> </p>
                    <p> Email: <?php echo $email ?> </p>
                    <p> Username: <?php echo $username ?> </p>
                    <p> Password: ********** </p>

                </div>
            </div>

            <div class="col-md-1">
            </div>

            <div class="col-md-3 settings_box">
                <div class="settings_box_title">
                    <h4> User Information </h4>
                </div>
                <div class="settings_box_content">
                    <p> Total # items: <?php echo $numberItems ?> </p>
                    <p> Total profit: <?php echo $totalProfit ?> </p>
                </div>
            </div>

            <div class="col-md-1">
            </div>

        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1">
            </div>

            <div class="col-md-10 settings_box">
                <div class="settings_box_title">
                    <h4> Settings </h4>
                </div>

                <div class="settings_box_content">
                    <div class="accordion">
                        <?php
                            // Variables
                            $result = mysqli_query($mysqli, "SELECT email FROM Project_Users WHERE username='$username'");
                            while ($users_row = $result->fetch_assoc()) {
                                $email = $users_row['email'];
                            }
                          ?>

                          <div class="card">
                            <div class="card-header" id="headingOne">
                              <h5 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  Change email
                                </button>
                              </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="card-body">
                                        <form class="form-sell" action="backEnd/changeEmail.php" method="post">
                                            <div class="form-group row">
                                              <label for="item" class="col-sm-2 col-form-label">Old email</label>
                                              <div class="col-sm-10">
                                                <input type="email" class="form-control" id="oldEmail1" name="oldEmail1" value="<?php echo $email ?>"   readonly>
                                              </div>
                                            </div>

                                            <div class="form-group row">
                                              <label for="item" class="col-sm-2 col-form-label">Repeat old email</label>
                                              <div class="col-sm-10">
                                                <input type="email" class="form-control" id="oldEmail2" name="oldEmail">
                                              </div>
                                            </div>

                                            <div class="form-group row">
                                              <label for="description" class="col-sm-2 col-form-label">New email</label>
                                              <div class="col-sm-10">
                                                <input type="email" class="form-control" id="newEmail1" name="newEmail1">
                                              </div>
                                            </div>

                                            <div class="form-group row">
                                              <label for="description" class="col-sm-2 col-form-label">Repeat new email</label>
                                              <div class="col-sm-10">
                                                <input type="email" class="form-control" id="newEmail2" name="newEmail2">
                                              </div>
                                            </div>

                                            <div class="form-group row">
                                              <div class="col-sm-12">
                                                <input type="submit" class="btn btn-submitSettings" name="submitChangeEmail" label="Submit" id="submitChangeEmail" value="Submit"></input>
                                              </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                          </div>

                          <div class="card">
                            <div class="card-header" id="headingTwo">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                  Change password
                                </button>
                              </h5>
                            </div>

                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                              <div class="card-body">
                                  <div class="card-body">
                                      <form class="form-sell" action="backEnd/changePassword.php" method="post">
                                          <div class="form-group row">
                                            <label for="item" class="col-sm-2 col-form-label">Repeat old password</label>
                                            <div class="col-sm-10">
                                              <input type="password" class="form-control" id="old" name="old">
                                            </div>
                                          </div>

                                          <div class="form-group row">
                                            <label for="description" class="col-sm-2 col-form-label">New password</label>
                                            <div class="col-sm-10">
                                              <input type="password" class="form-control" id="new1" name="new1">
                                            </div>
                                          </div>

                                          <div class="form-group row">
                                            <label for="description" class="col-sm-2 col-form-label">Repeat new password</label>
                                            <div class="col-sm-10">
                                              <input type="password" class="form-control" id="new2" name="new2">
                                            </div>
                                          </div>

                                          <div class="form-group row">
                                            <div class="col-sm-12">
                                              <input type="submit" class="btn btn-submitSettings" name="submitChangePassword" label="Submit" id="submitChangePassword" value="Submit"></input>
                                            </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                            </div>
                          </div>
                      </div> <!-- card !-->
                </div> <!-- accordion !-->
            </div>

            <!-- <div class="col-md-1"> -->
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
    <script src="js/effects.js"></script>

</body>
</html>
