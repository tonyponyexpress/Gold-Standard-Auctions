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
