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

  public function delete_items(){
    // Credentials
    if($test=="true"){
        include ('../cms/sql_credentials.php');
    }
    else if($test == "false"){
        include ('../../cms/sql_credentials.php');
    }



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

  public function createOffer(){

  }

  public function logout(){

  }

  public function sendMessage(){

  }

}

?>
