

<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "t828n219", "se4ahqu3", "t828n219");

    /* check connection */
    if ($mysqli->connect_error) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $item = $_POST["item"];
    $description = $_POST["description"];
    $picture = $_POST["picture"];

    // create entry
    $entry = "INSERT INTO Project_Items(name,description) VALUES ('$item','$description')";

    if ($mysqli->query($entry) === TRUE) {
        echo "New record created successfully";
    }
    else {
        echo "Error: ";
    }

    // Was working, but it doesn't create the entry anymore. Will review tomorrow what is happening
    // Missing the user!!! We need to find a way to pass the username or userid based on who sends the form

    /* close connection */
    $mysqli->close();

?>
