<?php
// error_reporting(E_ALL);
// ini_set("display_errors",1);
global $mysqli;

class functionsAdmin{

  public function functionsAdmin(){
    //empty constructor
  }

  public function delete_issue($test,$id){
      // Credentials
      if($test=="true"){
          include ('../cms/sql_credentials.php');

      }
      else if($test== "false"){
          include ('../../cms/sql_credentials.php');
      }

      $query = "DELETE FROM Project_Problems WHERE problem_id='$id';";

      // Echo errors
      if ($result = $mysqli->query($query)){
          echo $id . " deleted";
      }
      else{
          echo "item doesn't exist";
      }

      // Return to page if it is not a test
      if($test=="false"){
          header("Location: ../admin_problems.php");
      }


  }

  public function delete_items(){

  }

  public function delete_user(){

  }

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
          echo "Succesful login </br>";
          if($test== "false"){
              header('Location: ../admin_dashboard.php');
          }
      }
      else{
          $adminError = "username/password incorrect";
          $_SESSION['adminError'] = $adminError;
          echo $adminError . "</br>";
          if($test== "false"){
              header('Location: ../admin.php');
          }
      }

      $mysqli->close();

  }

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

  public function sendMessage($test, $message, $username, $date, $admin)){
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
