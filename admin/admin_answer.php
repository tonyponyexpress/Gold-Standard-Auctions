<?php
/**
    * Admin: answer message
    *
    * Allows the admin to answer a message from the user
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
    session_start();
    // Redirect to home page if user hasn't logged in
    if ( ! isset( $_SESSION['admin_id'] ) ) {
        header("Location: admin_login.html");
    }
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

                 <h2>Answer message</h2>

                 <?php
                    // Access database
                    include ('../cms/sql_credentials.php');
                    global $mysqli;
                    $username = $_GET['Username'];
                 ?>

                 <form class="form-signin" action="backEnd/admin_answer_be.php" method="post">
                   <label> Answer to: </label>
                   <input class="form-control" id="disabledInput" type="text" name="username" placeholder="<?php echo $_GET['Username'] ?>" value="<?php echo $_GET['Username'] ?>"   readonly>
                   <label> Message </label>
                   <textarea type="text" class="form-control" name="message" required="" cols="32"/> </textarea>
                   <button class="btn submitAdmin float-right" type="submit">Submit</button>
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
