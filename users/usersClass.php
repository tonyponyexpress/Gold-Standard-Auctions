<?php

class users{

  public function header_user(){
    session_start();
    include('templates/header_user.php');
  }

  public function tmpl_footer(){
    session_start();
    include('templates/footer.php');
  }

  public function header_login_user(){
    session_start();
    // Login header
    if ( ! isset( $_SESSION['user_id'] ) ) {
        include('templates/header_login.php');
    }
    // User header
    else {
        include('templates/header_user.php');
    }
  }

  public function header_homeScreen(){
    session_start();
    // Redirect to home page if user hasn't logged in
    if ( ! isset( $_SESSION['user_id'] ) ) {
        header("Location: homeScreen.php");
    }
  }
  
}

?>
