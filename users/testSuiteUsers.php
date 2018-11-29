<?php
global $mysqli;

/**
    * TestSuiteUsers: class with admin functions
    *
    * Holds different functions used in the user panel that works with the database information
    *
    * @author Tritens
    * @package admin
    */
class TestSuiteUsers{

    /**
       * Constructor
       *
       * Empty constructor
       *
       * @return void
       */
    public function TestSuite(){
        //empty constructor
    }

    /**
       * Create Users
       *
       * Creates an user given its username, password, password2, first name, last name and email
       * Stays on the page if its called in the admin panel or echo's the result if its called in the test suite
       *
       * @param string $test
       * @param string $username
       * @param string $password
       * @param string $password2
       * @param string $firstName
       * @param string $lastName
       * @param string $email
       *
       * @return void
       */
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


  /**
     * Login User
     *
     * Login to the user panel if given the correct password for the admin username
     * Moves to the user panel if its succesfully called in the home screen, stays in the home screen panel if its unsuccesfully called in the home screen panel or echo's the result if its called in the test suite
     *
     * @param string $test
     * @param string $username
     * @param string $password
     *
     * @return void
     */
  public function login($test, $username, $password){

    if($test=="true"){
        //echo "true cms";
        include ('cms/sql_credentials.php');

    }
    else if($test== "false"){
        //echo "false cms";
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
          header('Location: ../homeScreen.php');
        }
    }
    echo "<br>";
    $stmt->close();
    $mysqli->close();
  }


  /**
     * Contact form
     *
     * Creates an issue given its title, description and email
     * Stays on the page if its called in the admin panel or echo's the result if its called in the test suite
     *
     * @param string $test
     * @param string $title
     * @param string $description
     * @param string $email
     *
     * @return void
     */
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

  /**
     * Contact form
     *
     * Creates an message given its content and username
     * Stays on the page if its called in the admin panel or echo's the result if its called in the test suite
     *
     * @param string $test
     * @param string $message
     * @param string $username
     *
     * @return void
     */
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
            echo "message was submitted successfully.";
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
    echo "<br>";
    // Close database
    $stmt->close();
    $mysqli->close();
  }

  /**
     * Contact form
     *
     * Changes the email given a username and the newemail
     * Stays on the page if its called in the admin panel or echo's the result if its called in the test suite
     *
     * @param string $test
     * @param string $username
     * @param string $newEmail
     *
     * @return void
     */
  public function changeEmail($test, $username, $newEmail){

      if($test=="true"){
          include ('cms/sql_credentials.php');
      }
      else if($test== "false"){
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

  /**
     * Contact form
     *
     * Changes the password give the username, old password 1, old password 2, new password 1 and new password 2
     * Stays on the page if its called in the admin panel or echo's the result if its called in the test suite
     *
     * @param string $test
     * @param string $username
     * @param string $old1
     * @param string $old2
     * @param string $new1
     * @param string $new2
     *
     * @return void
     */
  public function changePassword($test, $username, $old1, $old2, $new1, $new2){
    if($test=="true"){
        //echo "true cms";
        include ('cms/sql_credentials.php');

    }
    else if($test== "false"){
        echo "false cms";
        include ('../../cms/sql_credentials.php');
    }

    $stmt = $mysqli->prepare("SELECT * FROM Project_Users WHERE username= ? AND password = ? ;");
    $stmt->bind_param("ss", $username, $old_hash);
    $stmt2 = $mysqli->prepare("UPDATE Project_Users SET password= ? WHERE username= ? ;");
    $stmt2->bind_param("ss", $new_hash, $username);

    $old_hash = hash('sha512', $old1);
    $new_hash = hash('sha512', $new1);

    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($result);

    if ($stmt->fetch()){
      //echo "Correct old password";
      if (($old1 == '') || ($old2 == '') || ($new1 == '') || ($new2 == '')){
        echo "Error: cannot have blank input for passwords";
      }
      else if ($old1 != $old2){
        echo "Error: old password inputs does not match up";
      }
      else if ($new1 != $new2){
        echo "Error: new password inputs do not match up";
      }
      else if(strlen($new1) < 8){
        echo "new password must be 8 characters or longer.";
      }
      else if ($stmt2->execute()){
        echo "New password changed successfully";
      }
    }
    else{
      echo "Error: invalid old password";
    }

    if($test == "false"){
      header('Location: ../settings.php');
    }
    echo "<br>";
    // close connection
    $mysqli->close();
  }
}
