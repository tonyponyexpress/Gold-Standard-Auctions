<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$mysqli = new mysqli("mysql.eecs.ku.edu", "t828n219", "se4ahqu3", "t828n219");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$admin_user = $_POST["username"];
$admin_password = $_POST["password"];
$query = "SELECT * FROM Project_Admins WHERE username = '$admin_user';";
$query2 = "SELECT * FROM Project_Admins WHERE password = '$admin_password';";
$result = $mysqli->query($query);
$result2 = $mysqli->query($query2);

if (mysqli_num_rows($result) == 0{
  echo "Error: Admin username does not exist";
}
else{
  if (mysqli_num_rows($result2 == 0)){
    echo "Error: invalid password";
  }
  else{
    header('Location: admin_dashboard.html');
  }
}

$mysqli->close();

?>
