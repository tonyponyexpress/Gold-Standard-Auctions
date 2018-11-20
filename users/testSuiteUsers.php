<?php
// error_reporting(E_ALL);
// ini_set("display_errors",1);
global $mysqli;

class TestSuiteUsers{

  public function TestSuite(){
    //empty constructor
  }

  /*Test for creating users*/
  public function createUsers($test,$username,$password,$password2,$firstName,$lastName,$email){


      if($test=="true"){
          //echo "true cms";
          include ('cms/sql_credentials.php');

      }
      else if($test== "false"){
          echo "false cms";
          include ('../../cms/sql_credentials.php');
      }

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
        $error = "Username already exists";
        echo nl2br("Error: Username already exists \n");
    }
    elseif ($stmt3->fetch()){
        $error = "Email already exists";
        echo nl2br("Error: Email already exists \n");
    }
    else{

        if ($username == ''){
             $error = "Error: cannot have blank username";
            echo "Error: cannot have blank username <br>";
        }
        else if ($email == ''){
            $error = "Error: cannot have blank email";
            echo "Error: cannot have blank email <br>";
        }
        else if ($password == ''){
            $error = "Error: cannot have blank password";
            echo "Error: cannot have blank password <br>";
        }
        else if ($password != $password2){
            $error = "Error: Passwords do not match up";
            echo "Error: Passwords do not match up <br>";
        }
        else if ($firstName == ''){
            $error = "Error: cannot have blank first name";
            echo "Error: cannot have blank first name <br>";
        }
        else if ($lastName == ''){
            $error = "Error: cannot have blank last name";
            echo "Error: cannot have blank last name <br>";
        }
        else if (strlen($password) < 8){
            $error = "Error: password must be 8 characters or longer";
            echo "Error: password must be 8 characters or longer <br>";
        }
        else if($stmt->execute()){
            $error = "New user created successfully";
            echo "New user created successfully <br>";
        }
        else{
            echo "Error: " . $mysqli->error;
        }


        if($test=="true"){
            //echo "true";
        }
        else if($test=="false"){
            $_SESSION['error'] = $error;
            header('Location: ../homeScreen.php');
        }

    }

    $stmt2 ->close();
    $stmt3->close();
    $stmt ->close();
    $mysqli->close();


  }


  /*Test for creating users*/
  public function login($test, $username, $password){

    if($test=="true"){
        //echo "true cms";
        include ('cms/sql_credentials.php');

    }
    else if($test== "false"){
        echo "false cms";
        include ('../../cms/sql_credentials.php');
    }

  // Start session
  session_start();


    $stmt = $mysqli->prepare("SELECT * FROM Project_Users WHERE username = ? AND password = ? ;");
    $stmt->bind_param("ss", $username, $hashed);

    $hashed = hash('sha512', $password); //hash the created user's password that will be stored in the database


    $stmt->execute();
    // Login credentials are valid
    $valid_login = false;
    if ($stmt->fetch()) {
        // set session
        echo "successful login";
        $valid_login = true;
        $_SESSION['user_id'] = $username;
    }
    else {
        echo "Error: failed login";
        $errorLogin = "username/password incorrect";
        $_SESSION['errorLogin'] = $errorLogin;
    }

    if($test=="true"){
        //echo "true";
    }
    else if($test=="false"){
        $_SESSION['error'] = $error;
        if($valid_login == true){
          header('Location: ../userPanel.php');
        }
        else{
          header('Location: users/homeScreen.php');
        }
    }
    echo "<br>";
    $stmt->close();
    $mysqli->close();
  }


  public function contact($test, $title, $description, $email){

    if($test=="true"){
        //echo "true cms";
        include ('cms/sql_credentials.php');

    }
    else if($test== "false"){
        echo "false cms";
        include ('../../cms/sql_credentials.php');
    }

    $stmt = $mysqli->prepare("INSERT INTO Project_Problems (title, description, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $description, $email);

    $description = str_replace("'", "''", $description);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    //echo "$test";

    $success = false;
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $stmt->execute();
        $success = true;
        echo "successfully submitted issue <br>";
    }
    else{
        echo "issue submission failed. <br>";
    }
    if($test == "false"){
      if($success == true){
        header('Location: ../contactUs.php');
      }
      else{
        //need to add some sort of error reporting on what went wrong to the user.
        header('Location: ../contactUs.php');
      }
    }
    echo "<br>";
    $stmt->close();
    $mysqli->close();
  }

  public function sendMessage($test, $message, $username){
    if($test=="true"){
        echo "true cms";
        include ('cms/sql_credentials.php');

    }
    else if($test== "false"){
        echo "false cms";
        include ('../../cms/sql_credentials.php');
    }

    $stmt = $mysqli->prepare("INSERT INTO Project_Messages (message, username, m_date) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $message, $username, $date);
    date_default_timezone_set("America/Chicago");
    $timestamp = time();
    $date = date("h:i:s A. M d, Y", $timestamp);
    $success = false;

    // Check if message is not empty
    if ($message != ""){
        // Create post
        if ($stmt->execute()) {
            $success = true;
            echo "message was submitted successfully.<br>";
        }
        else {
            echo "Failed: message submission failed";
        }
    }
    else
    {
        echo "Failed: Message is empty";
    }

    if($test=="false"){
        $_SESSION['error'] = $error;
        header('Location: ../userPanel.php');
    }
    // Close database
    $stmt->close();
    $mysqli->close();
  }

  public function changeEmail($test, $username, $newEmail){

    if($test=="true"){
        echo "true cms";
        include ('cms/sql_credentials.php');

    }
    else if($test== "false"){
        echo "false cms";
        include ('../../cms/sql_credentials.php');
    }
    $testUser = mysqli_query($mysqli, "SELECT username FROM Project_Users WHERE username = '$username' ;");
    if(mysqli_num_rows($testUser)){
      $stmt = $mysqli->prepare("UPDATE Project_Users SET email= ? WHERE username= ? ;");
      $stmt->bind_param("ss", $newEmail, $username);

      $user = "UPDATE Project_Users SET email='$newEmail' WHERE username='$username';";

      if ($stmt->execute()) {
          echo "Email updated succesfully";
      }
      else {
          echo "Failed: Email not updated";
      }

      if($test == "false"){
          header('Location: ../settings.php');
      }
    }
    else{
      echo "this failed.";
    }

    // close connection
    $stmt->close();
    $mysqli->close();
  }
