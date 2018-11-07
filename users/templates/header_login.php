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
<div class= "container-fluid" style="background-color: #2F2FA2">
  <div class="row">
    <div class="col-md-6" style="text-align: center">
      <br>
      <a href="homeScreen.php"> <img src="../assets/fakeLogo.jpg" alt="Logo"> </a>
      <br>
      <br>
    </div>
    <div class="col-md-1"> </div>

    <!-- login -->
    <div class="col-md-2" style="text-align: center;">
      <form action="backEnd/Login.php" method="post">
        <br><font color="white"> Username:</font><br>
        <input type="text" name="username"><br><br>
    </div>

    <div class="col-md-2" style="text-align: center;">
        <br><font color="white"> Password:</font><br>
        <input type="password" name="password"><br><br>
    </div>

    <div class="col-md-1">
      <br><br>
        <input type="submit" value="Log In" />
      </form>
      <br><br>
    </div>
  </div>
</div>
