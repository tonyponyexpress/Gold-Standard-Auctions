<?php
/**
    *User header_login
    *Handles the header for user log in
    *
    *
    *
    *@author Tritens
    *@package users
    *
    */
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" role="navigation">
    <div class="container">
        <a href="homeScreen.php"> <img src="../assets/fakeLogo.jpg" alt="Logo"> </a>

        <li class="dropdown order-1">
            <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-light dropdown-toggle">Login <span class="caret"></span></button>
            <ul class="dropdown-menu dropdown-menu-right mt-2">
               <li class="px-3 py-2">
                   <form action="backEnd/Login.php" method="post">
                        <div class="form-group">
                            <input type="text" name="username" placeholder="Username" class="form-control form-control-sm" required="" >
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Password" class="form-control form-control-sm" required="">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Log in" class="btn btn-secondary btn-block" >
                        </div>
                    </form>
                </li>
            </ul>
        </li>
    </div>
</nav>
