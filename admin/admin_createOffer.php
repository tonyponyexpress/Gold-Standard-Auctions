<?php
/**
    * Admin: create offer
    *
    * Creates an offer for the item
    *
    * @author Tritens
    * @package admin
    */




/**
    * Redirects to home page if user hasn't logged in
    *
    * Checks if the admin_id session variable has been set. If true it shows the page, else it redirects to the login page
    *
    */
    include('adminClass.php');
    $temp = new admin();
    $temp->header_admin_login();
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
    <link rel="stylesheet" href="adminCSS/admin_users.css">
</head>

<body>

<!-- Content -->
    <div class="wrapper">
        <!-- Sidebar  -->
        <?php
            $temp = new admin();
            $temp->tmpl_sidebar();
        ?>

        <!-- Page Content  -->
        <div id="content">
            <!-- Sidebar Toggle  -->
            <?php
                $toggle = new admin();
                $toggle->tmpl_toggle();
            ?>

            <div class="user_info">
                 <?php
                    // Access database
                    include ('../cms/sql_credentials.php');
                    global $mysqli;
                    $item_id = $_GET['itemOffer'];
                    $item = "SELECT * FROM Project_Items WHERE item_id='$item_id'";
                    if ($result = $mysqli->query($item)) {
                        // Get all users
                        while ($item_row = $result->fetch_assoc()) {
                            $name = $item_row['name'];
                            $description = $item_row['description'];
                            $username = $item_row['username'];
                        }
                    }

                  ?>

                 <h2>Create offer for item <?php echo $item_id ?></h2>

                 <form action="backEnd/createOffer.php" method="post">
                     <div class="form-group row">
                         <label class="col-sm-2 col-form-label"> ID </label>
                         <div class="col-sm-10">
                             <input class="form-control" id="disabledInput" type="text" name="item_id" placeholder="<?php echo $item_id?>" value="<?php echo $item_id?>"   readonly>
                         </div>
                     </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"> Item </label>
                        <div class="col-sm-10">
                            <input class="form-control" id="disabledInput" type="text" name="title" placeholder="<?php echo $name?>" value="<?php echo $name?>"   readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"> Description</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="disabledInput" type="text" name="description" placeholder="<?php echo $description?>" value="<?php echo $description?>"   readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"> Username </label>
                        <div class="col-sm-10">
                            <input class="form-control" id="disabledInput" type="text" name="username" placeholder="<?php echo $username?>" value="<?php echo $username?>"   readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Offer</label>
                        <div class="col-sm-10">
                            <input type="number" step="0.01" class="form-control" name="offer" placeholder="offer"> </input>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                          <button type="submit" class="btn submitAdmin float-right">Submit</button>
                        </div>
                    </div>

                </form>



                 <?php
                     // close connection
                     $mysqli->close();
                 ?>



            </div>
        </div>

     </div>

     <!-- Scripts  -->
     <?php
         $scripts = new admin();
         $toggle->scripts();
     ?>
     
</body>
</html>
