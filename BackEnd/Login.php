<?php
  $mysqli = new mysqli("mysql.eecs.ku.edu", "t828n219", "se4ahqu3", "t828n219");

  /* check connection */
  if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }
  $username = $_POST["username"];
  $password = $_POST["password"];

  $query = "SELECT * FROM Project_Users WHERE username = '$username';";
  $query2 = "SELECT * FROM Project_Users WHERE email = '$username';";
  $query3 = "SELECT * FROM Project_Users WHERE password = '$password';";

  $result = $mysqli->query($query);
  $result2 = $mysqli->query($query2);
  $result3 = $mysqli->query($query3);

  if (($row = $result->fetch_assoc() || $row = $result2->fetch_assoc()) && $row = $result3->fetch_assoc()){
    header('Location: ../htmlFiles/sellTab');
  }
  else{
    echo "error: invalid username or password.";
  }
  $mysqli->close();
?>
