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
<div class= "container-fluid" style="background-color: #2F2FA2">
  <div class="row">
    <div class="col-md-6" style="text-align: center">
      <br>
      <img src="../assets/fakeLogo.jpg" alt="Logo">
      <br><br>
    </div>
    <div class="col-md-6" style="text-align: center;">
      <br>
      <form action="backEnd/Logout.php" method="post">
        <input type="submit" value="Log Out" style="font-size: 20px;">
      </form>
      <br><br>
    </div>
  </div>
</div>
