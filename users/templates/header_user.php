<?php
/**
    *User header_user
    *handles the header for user logout
    *
    *
    *
    *@author Tritens
    *@package users
    *
    */

?>

<?php
    // Access database
    include ('../../cms/sql_credentials.php');
    global $mysqli;

    // Get username
    session_start();

    // Variable
    $username =  $_SESSION['user_id'];
?>

<div id="header-userpanel">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" role="navigation">
        <div class="container">
            <a href="userPanel.php"> <img src="../assets/fakeLogo.jpg" alt="Logo"> </a>

            <li class="dropdown order-1">
                <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-light dropdown-toggle"> Hello <?php echo $username ?>  </button>
                <ul class="dropdown-menu dropdown-menu-right mt-2">
                    <li class="px-3 py-2">
                        <form action="userPanel.php" method="post">
                            <input type="submit" value="Home"  class="btn btn-light">
                        </form>
                    </li>
                    <li class="px-3 py-2">
                        <form action="settings.php" method="post">
                            <input type="submit" value="Settings"  class="btn btn-light">
                        </form>
                    </li>

                    <li class="px-3 py-2">
                        <form action="backEnd/Logout.php" method="post">
                            <input type="submit" value="Log Out"  class="btn btn-light">
                        </form>
                    </li>

                </ul>
            </li>



        </div>
    </nav>
</div>
