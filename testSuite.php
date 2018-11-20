<?php
// error_reporting(E_ALL);
// ini_set("display_errors",1);
global $mysqli;

class TestSuite{

  public function TestSuite(){
    //empty constructor
  }

  /*Runs every single test*/
  public function runTests(){

  }

  /*Test for creating users*/
  public function createUsers($test,$username,$password,$password2,$firstName,$lastName,$email){

    include ('cms/sql_credentials.php');


    // Start session
    session_start();

    //statements
    $stmt2 = $mysqli->prepare("SELECT * FROM Project_Users WHERE username = ? ;");
    $stmt2->bind_param("s", $username);
    $stmt3 = $mysqli->prepare("SELECT * FROM Project_Users WHERE email = ? ;");
    $stmt3->bind_param("s", $email);
    $stmt = $mysqli->prepare("INSERT INTO Project_Users (FirstName, LastName, username, email, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $firstName, $lastName, $username, $email, $hashed);


    $query = "SELECT * FROM Project_Users WHERE username = '$username'";
    $query2 = "SELECT * FROM Project_Users WHERE email = '$email'";
    $hashed = hash('sha512', $password); //hash the created user's password that will be stored in the database
    $result = $mysqli->query($query);
    $result2 = $mysqli->query($query2);

    $stmt3->execute();
    $stmt3->store_result();
    $stmt3->bind_result($result);
    $result2 = $stmt2->execute();


    if ($stmt2->fetch()){
        echo "Username already exists";
    }
    elseif ($stmt3->fetch()){
        echo "Email already exists";
    }
    else{

        if ($username == ''){
            echo "Error: cannot have blank username <br>";
        }
        else if ($email == ''){
            echo "Error: cannot have blank email <br>";
        }
        else if ($password == ''){
            echo "Error: cannot have blank password <br>";
        }
        else if ($password != $password2){
            echo "Error: Passwords do not match up <br>";
        }
        else if ($firstName == ''){
            echo "Error: cannot have blank first name <br>";
        }
        else if ($lastName == ''){
            echo "Error: cannot have blank last name <br>";
        }
        else if (strlen($password) < 8){
            echo "Error: password must be 8 characters or longer <br>";
        }
        else if($stmt->execute()){
            echo "New user created successfully <br>";
        }
        else{
            echo "Error: " . $mysqli->error;
        }
        $_SESSION['error'] = $error;
        if($test="false"){
            header('Location: ../homeScreen.php');
        }

    }

    $stmt2 ->close();
    $stmt3->close();
    $stmt ->close();
    $mysqli->close();


  }



}

?>
