<?php

class admin{

  public function header_admin_login(){
    session_start();
    // Redirect to home page if user hasn't logged in
    if ( ! isset( $_SESSION['admin_id'] ) ) {
        header("Location: admin.php");
    }
  }

  public function tmpl_sidebar(){
    session_start();
    include('templates/sidebar.php');
  }

  public function tmpl_toggle(){
    include('templates/toggleSidebar.php');
  }

  public function scripts(){
    include('templates/scripts.html');
  }

}
?>
