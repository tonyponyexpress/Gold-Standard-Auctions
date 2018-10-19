<?php
   //  $mysqli = new mysqli("mysql.eecs.ku.edu", "t828n219", "se4ahqu3", "t828n219");
    $mysqli = new mysqli("mysql.eecs.ku.edu", "e155p319", "eecs448", "e155p319");

    /* check connection */
    if ($mysqli->connect_error) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
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
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Admin</h3>
            </div>

            <ul class="sidebar-menu">
                <li class="active"> <a href="admin_dashboard.html">Dashboard</a> </li>
                <li> <a href="admin_users.php"> Users </a> </li>
                <li> <a href="#"> Problems </a> </li>
            </ul>

        </nav>

        <!-- Page Content  -->
        <div id="content">
             <h2>Users</h2>

             <?php
                 $mysqli = new mysqli("mysql.eecs.ku.edu", "t828n219", "se4ahqu3", "t828n219");
                 /* check connection */
                 if ($mysqli->connect_error) {
                     printf("Connect failed: %s\n", $mysqli->connect_error);
                     exit();
                 }
             ?>

             <table>
                 <tr>
                     <th> Name </th>
                     <th> Information </th>
                     <th> Items </th>
                     <th> Delete </th>
                 </tr>


             <?php
                 $users = "SELECT * FROM Project_Users";
                 if ($result = $mysqli->query($users)) {
                     // Get all users
                     while ($users_row = $result->fetch_assoc()) {
                         $ID = $users_row['user_id'];
                         $FirstName = $users_row['FirstName'];
                         $LastName = $users_row['LastName'];
                         $number_items = $users_row['number_items'];
                         ?>

                         <tr>
                             <th>
                                 <div id="table_name"> <?php echo $FirstName; ?>  </div>
                                 <div id="table_id"> <?php echo $ID; ?>  </div>
                             </th>
                             <th> <?php echo $number_items; ?> </th>
                             <th> Items </th>
                             <th> X </th>
                         </tr>
                     <?php
                     }
                     /* free result set */
                     $result->free();
                 }
                 ?>
             </table>

             <?php
             /* close connection */
             $mysqli->close();
             ?>



        </div>
     </div>


    <!-- Footer -->
    <div class= "container-fluid" style="background-color: rgba(0,87,110,0.8)">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-3">
          <br>
          <a href="faq.html">FAQ</a><br>
          <a href="contactUs.html">Contact Us</a><br>
        </div>
        <div class="col-md-3">
          <br>
          <a href="reportAnIssue.html">Report an Issue</a><br>
          <a href="returnPolicy.html">Return Policy</a><br>
        </div>
        <div class="col-md-4" style="text-align: center">
          <br>
          <img src="../assets/fakeLogo.jpg" alt="Logo">
          <br>
          <br>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
