<?php

class TestSuite{

  public function TestSuite(){
    //empty constructor
  }

  /*Runs every single test*/
  public function runTests(){
    test01();
  }

  /*Test for creating users*/
  private function test01(){
    include ('cms/sql_credentials.php');
    global $mysqli;

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
    $hashed = hash('sha512', $password); //hash the created user's password that will be stored in the database
    $result = $mysqli->query($query);
    $result2 = $mysqli->query($query2);

    echo "start";
    
    if ($row = $result->fetch_assoc() || $row = $result2->fetch_assoc()){
      echo "Test#01: Creating User FAILED<b>";
    }
    else{
      $add_user = "INSERT INTO Project_Users (FirstName, LastName, username, email, password) VALUES ('$firstName','$lastName','$username','$email','$hashed');";
      if ($username == ''){
        echo "Test#01: Creating User FAILED<b>";
      }
      else if ($email == ''){
        echo "Test#01: Creating User FAILED<b>";
      }
      else if ($password1 == ''){
        echo "Test#01: Creating User FAILED<b>";
      }
      else if ($password1 != $password2){
        echo "Test#01: Creating User FAILED<b>";
      }
      else if ($firstName == ''){
        echo "Test#01: Creating User FAILED<b>";
      }
      else if ($lastName == ''){
        echo "Test#01: Creating User FAILED<b>";
      }
      else if (strlen($password1) < 8){
        echo "Test#01: Creating User FAILED<b>";
      }
      else if ($user_result = $mysqli->query($add_user)){
        echo "Test#01: Creating User PASSED<b>";
      }
      else{
        echo "Test#01: Creating User FAILED<b>";
      }
    }
    echo "end";

    $mysqli->close();
  }



}

?>
