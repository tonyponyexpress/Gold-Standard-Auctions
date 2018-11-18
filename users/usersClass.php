<?php

class users{

    /* ----------------------------- Header ----------------------------- */

    public function header_user(){
        session_start();
        include('templates/header_user.php');
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

    /* ----------------------------- Footer ----------------------------- */
    public function tmpl_footer(){
        session_start();
        include('templates/footer.php');
    }

    /* ----------------------------- User Panel ----------------------------- */
    public function tab_howItWorks(){
        include('templates/howItWorksTab.php');
    }

    public function tab_sell(){
        include('templates/sellTab.php');
    }

    // not working, problem when objects being created
    public function tab_myAccount(){
        include('templates/myAccountTab.php');
    }


}

?>
