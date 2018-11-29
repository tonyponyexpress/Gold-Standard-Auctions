<?php
/**
    * Admin: class with admin panel functions for displaying templates
    *
    * Holds different functions used in the admin panel for displaying templates
    *
    * @author Tritens
    * @package admin
    */

class admin{

     /**
        * Admin login session
        *
        * Redirect to home page if admin hasn't logged in
        *
        * @return void
        */
        public function header_admin_login(){
            session_start();
            if ( ! isset( $_SESSION['admin_id'] ) ) {
                header("Location: admin.php");
            }
        }

    /**
        * Admin template sidebar
        *
        * Displays the template sidebar in the admin panel
        *
        * @return void
        */
        public function tmpl_sidebar(){
            session_start();
            include('templates/sidebar.php');
        }

    /**
        * Admin template sidebar toggle button
        *
        * Displays the template sidebar toggle button in the admin panel
        *
        * @return void
        */
        public function tmpl_toggle(){
            include('templates/toggleSideba r.php');
        }

    /**
        * Admin template scripts
        *
        * Includes the scripts used in the admin files
        *
        * @return void
        */
        public function scripts(){
            include('templates/scripts.html');
        }

    }
?>
