<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
global $mysqli;

class TestSuite{

  public function TestSuite(){
    //empty constructor
  }

  /*Runs every single test*/
  public function runTests(){

  }

  /*Test for creating users with good input*/
  public function test01(){
    include ('cms/sql_credentials.php');

    // Start session
    session_start();

    $username = "Test";
    $password1 = "Thisiseight";
    $password2 = "Thisiseight";
    $firstName = "first";
    $lastName = "last";
    $email = "TestSuite@gmail.com";

    $query = "SELECT * FROM Project_Users WHERE username = '$username';";
    $query2 = "SELECT * FROM Project_Users WHERE email = '$email';";
    $hashed = hash('sha512', $password1); //hash the created user's password that will be stored in the database
    $result = $mysqli->query($query);
    $result2 = $mysqli->query($query2);

    if ($row = $result->fetch_assoc() || $row = $result2->fetch_assoc()){
      echo "Test#01: Creating User FAILED<br>";
    }
    else{
      $add_user = "INSERT INTO Project_Users (FirstName, LastName, username, email, password) VALUES ('$firstName','$lastName','$username','$email','$hashed');";
      if ($username == ''){
        echo "Test#01: Creating User FAILED<br>";
      }
      else if ($email == ''){
        echo "Test#01: Creating User FAILED<br>";
      }
      else if ($password1 == ''){
        echo "Test#01: Creating User FAILED<br>";
      }
      else if ($password1 != $password2){
        echo "Test#01: Creating User FAILED<br>";
      }
      else if ($firstName == ''){
        echo "Test#01: Creating User FAILED<br>";
      }
      else if ($lastName == ''){
        echo "Test#01: Creating User FAILED<br>";
      }
      else if (strlen($password1) < 8){
        echo "Test#01: Creating User FAILED<br>";
      }
      else if ($user_result = $mysqli->query($add_user)){
        echo "Test#01: Creating User PASSED<br>";
      }
      else{
        echo "Test#01: Creating User FAILED<br>";
      }
    }

    $mysqli->close();
  }

}

?>
