<?php
/**
    * User: class with user panel functions for displaying templates
    *
    * Holds different functions used in the user panel for displaying templates
    *
    * @author Tritens
    * @package user
    */
class users{

    /* ----------------------------- Header ----------------------------- */

    /**
       * Logged in user header
       *
       * Displays the template logged in user header
       *
       * @return void
       */
    public function header_user(){
        session_start();
        include('templates/header_user.php');
    }

    /**
       * Log in user header
       *
       * Displays the template login header, asks for credentials. If the user has logged in, shows header_user
       *
       * @return void
       */
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

    /**
       * Header home screen
       *
       * Redirects to home page if user hasn't logged in
       *
       * @return void
       */
    public function header_homeScreen(){
        session_start();
        // Redirect to home page if user hasn't logged in
        if ( ! isset( $_SESSION['user_id'] ) ) {
            header("Location: homeScreen.php");
        }
    }

    /* ----------------------------- Footer ----------------------------- */

    /**
       * Footer
       *
       * Displays the template footer for user and visitor of website
       *
       * @return void
       */
    public function tmpl_footer(){
        session_start();
        include('templates/footer.php');
    }

    /* ----------------------------- User Panel ----------------------------- */
    /**
       * How It Works Tab
       *
       * Displays the template for the howItWorksTab
       *
       * @return void
       */
    public function tab_howItWorks(){
        include('templates/howItWorksTab.php');
    }

    /**
       * How It Works Tab
       *
       * Displays the template for the sellTab
       *
       * @return void
       */
    public function tab_sell(){
        include('templates/sellTab.php');
    }

    // not working, problem when objects being created
    /**
       * How It Works Tab
       *
       * Displays the template for the myAccountTab
       *
       * @return void
       */
    public function tab_myAccount(){
        include('templates/myAccountTab.php');
    }


}

?>
