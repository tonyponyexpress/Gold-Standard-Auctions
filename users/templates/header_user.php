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

<div id="header-userpanel">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" role="navigation">
        <div class="container">
            <a href="homeScreen.php"> <img src="../assets/fakeLogo.jpg" alt="Logo"> </a>
            <form action="backEnd/Logout.php" method="post">
              <input type="submit" value="Log Out"  class="btn btn-outline-secondary" id="logout-button">
            </form>
        </div>
    </nav>
</div>
