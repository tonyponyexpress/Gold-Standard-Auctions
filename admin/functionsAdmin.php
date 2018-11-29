<?php
global $mysqli;

/**
    * FunctionAdmin: class with admin functions
    *
    * Holds different functions used in the admin panel that works with the database information
    *
    * @author Tritens
    * @package admin
    */
class functionsAdmin{

    /**
       * Constructor
       *
       * Empty constructor
       *
       * @return void
       */
    public function functionsAdmin(){
        //empty constructor
    }

    /**
       * Delete issue
       *
       * Deletes an issue given its id.
       * Stays on the page if its called in the admin panel or echo's the result if its called in the test suite
       *
       * @param string $test
       * @param int $id
       *
       * @return void
       */
    public function delete_issue($test,$id){
        // Credentials
        if($test=="true"){
          include ('../cms/sql_credentials.php');
        }
        else if($test == "false"){
          include ('../../cms/sql_credentials.php');
        }
        $query = "SELECT * FROM Project_Problems WHERE problem_id='$id'";
        // Echo errors
        if ($result = $mysqli->query($query)){
          if(mysqli_num_rows($result) == 0){
            echo "Issue ID#" . $id . " does not exist";
          }
          else{
            $query2 = "DELETE FROM Project_Problems WHERE problem_id='$id'";
            if ($result2 = $mysqli->query($query2)){
              echo $id . " deleted";
            }
          }
        }
        // Return to page if it is not a test
        if($test=="false"){
          header("Location: ../admin_problems.php");
        }
    }

    /**
       * Delete items
       *
       * Deletes an item given its id.
       * Stays on the page if its called in the admin panel or echo's the result if its called in the test suite
       *
       * @param string $test
       * @param int $id
       *
       * @return void
       */
    public function delete_items($test, $id){
        // Credentials
        if($test=="true"){
            include ('../cms/sql_credentials.php');
        }
        else if($test == "false"){
            include ('../../cms/sql_credentials.php');
        }
        $result = mysqli_query($mysqli, "SELECT * FROM Project_Items WHERE item_id='$id'");
        while ($item_row = $result->fetch_assoc()) {
            $username = $item_row['username'];
            $offer = $item_row['offer'];
            // Decrease item counter and total profit for user
            $result = mysqli_query($mysqli, "SELECT * FROM Project_Users WHERE username='$username'");
            while ($users_row = $result->fetch_assoc()) {
                $n_items = $users_row['number_items'];
                $profit = $users_row['total_profit'];
                $n_items = $n_items - 1;
                $profit = $profit - $offer;
                $counter = "UPDATE Project_Users SET number_items='$n_items', total_profit='$profit' WHERE username='$username';";
                if ($counter_result = $mysqli->query($counter)) {
                    echo "Item count updated succesfully for " . $username . " to " . $n_items;
                    echo "Total profit updated succesfully for " . $username . " to " . $profit;
                }
                else {
                    echo "Error";
                }
            }
        }
        $query2 = "SELECT * FROM Project_Items WHERE item_id='$id'";
        // Echo errors
        if ($result2 = $mysqli->query($query2)){
            if(mysqli_num_rows($result2) == 0){
              echo "Item ID#" . $id . " does not exist";
            }
            else{
              $query3 = "DELETE FROM Project_Items WHERE item_id='$id'";
              if ($result3 = $mysqli->query($query3)){
                echo $id . " deleted";
              }
            }
        }
        // Return to page if it is not a test
        if($test=="false"){
            header("Location: ../admin_items.php");
        }
  }

  /**
     * Delete user
     *
     * Deletes an user given its id.
     * Stays on the page if its called in the admin panel or echo's the result if its called in the test suite
     *
     * @param string $test
     * @param int $id
     *
     * @return void
     */
    public function delete_user($test, $id){
        // Credentials
        if($test=="true"){
            include ('../cms/sql_credentials.php');
        }
        else if($test == "false"){
            include ('../../cms/sql_credentials.php');
        }
        $query = "SELECT * FROM Project_Users WHERE user_id='$id'";
        // Echo errors
        if ($result = $mysqli->query($query)){
            if(mysqli_num_rows($result) == 0){
              echo "User ID#" . $id . " does not exist";
            }
            else{
              $query2 = "DELETE FROM Project_Users WHERE user_id='$id'";
              if ($result2 = $mysqli->query($query2)){
                echo $id . " deleted";
              }
            }
        }
        // Return to page if it is not a test
        if($test=="false"){
            header("Location: ../admin_users.php");
        }
    }

    /**
       * Login admin
       *
       * Login to the admin panel if given the correct password for the admin username
       * Moves to the admin panel if its succesfully called in the login panel, stays in the login panel if its unsuccesfully called in the login panel or echo's the result if its called in the test suite
       *
       * @param string $test
       * @param string $admin_user
       * @param string $admin_password
       *
       * @return void
       */
    public function login($test,$admin_user,$admin_password){
          // Database credentials
          if($test=="true"){
              include ('../cms/sql_credentials.php');
          }
          else if($test== "false"){
              include ('../../cms/sql_credentials.php');
          }
          // Start session
          session_start();
          $stmt = $mysqli->prepare("SELECT * FROM Project_Admins WHERE username= ? AND password= ?");
          $stmt->bind_param("ss", $admin_user, $hashed);
          $hashed = hash('sha512', $admin_password); //hashing the admin password to check if this hashed password matches on in database
          $stmt->execute();
          // Login credentials are valid
          if ($stmt->fetch()){
              $_SESSION['admin_id'] = $admin_user;
              echo "Succesful login";
              if($test== "false"){
                  header('Location: ../admin_dashboard.php');
              }
          }
          else{
              $adminError = "username/password incorrect";
              $_SESSION['adminError'] = $adminError;
              echo $adminError ;
              if($test== "false"){
                  header('Location: ../admin.php');
              }
          }
          $mysqli->close();
    }

    /**
        * Create offer for item
        *
        * Creates an offer for an item given its id and an offer.
        * Stays in the same page if its called in the admin panel or echo's the result if its called in the test suite
        *
        * @param string $test
        * @param int $item_id
        * @param float $offer
        *
        * @return void
        */
    public function createOffer($test,$item_id,$offer){
        // Database credentials
        if($test=="true"){
          include ('../cms/sql_credentials.php');
        }
        else if($test== "false"){
          include ('../../cms/sql_credentials.php');
        }
        // Start session
        session_start();
        // Check if message is not empty
        if(is_numeric($offer) && $offer > 0){
          // Create offer
          $entry = "UPDATE Project_Items SET offer='$offer', status='offer' WHERE item_id='$item_id';";
          if ($mysqli->query($entry) === TRUE) {
              if($test== "false"){
                  header('Location: ../admin_items.php');
              }
              echo "Offer created successfully";
          }
          else {
              echo "Error in creating offer";
          }
        }
        else
        {
          echo "Input is not valid";
        }
        $mysqli->close();
    }

  /**
      * Create offer for item
      *
      * Creates an offer for an item given its id and an offer.
      * Stays in the same page if its called in the admin panel or echo's the result if its called in the test suite
      *
      * @param string $test
      * @param string $message
      * @param string $username
      * @param string $date
      * @param string $admin
      *
      * @return void
      */
    public function sendMessage($test, $message, $username, $date, $admin){
        // Credentials
        if($test=="true"){
            include ('../cms/sql_credentials.php');

        }
        else if($test== "false"){
            include ('../../cms/sql_credentials.php');
        }

        // Start session
        session_start();

        $stmt = $mysqli->prepare("INSERT INTO Project_Messages (message, username, m_date, admin) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $message, $username, $date, $admin);

        // Check if message is not empty
        if ($message != ""){
            // Create post
            //$entry = "INSERT INTO  Project_Messages(message, username) VALUES ('$message','$username');";
            if ($stmt->execute()) {
                echo "Message sent successfully";
                if($test== "false"){
                    header('Location: ../admin_users_profile.php?Username='.$username);
                }
            }
            else {
                echo "Error";
            }
        }
        else
        {
            echo "Message is empty";
        }

        // Close database
        $stmt->close();
        $mysqli->close();

    }


}
?>
