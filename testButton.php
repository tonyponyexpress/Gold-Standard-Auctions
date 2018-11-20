<?php
    // error_reporting(E_ALL);
    // ini_set("display_errors", 1);
    //
    include('users/testSuiteUsers.php');
    $homeScreen = new TestSuiteUsers();

    echo "<b>Create User Tests: </b><br>";
    // Test #1: createUsers
    // 1.1 valid
    echo "1.1 Valid <br>";
    $homeScreen->createUsers("true","1.1","123456789","123456789","First","Last","1.1@email.com");
    // 1.2 Username already exists
    echo " <br>1.2 Username already exists <br>";
    $homeScreen->createUsers("true","1.1","123456789","123456789","First","Last","1.2@email.com");
    // 1.3 First name Empty
    echo " <br>1.3 First Name empty <br>";
    $homeScreen->createUsers("true","1.3","123456789","123456789","","Last","1.3@email.com");
    // 1.4 Last name Empty
    echo " <br>1.4 Last Name empty <br>";
    $homeScreen->createUsers("true","1.4","123456789","123456789","First","","1.4@email.com");
    // 1.5 email Empty
    echo " <br>1.5 Email empty <br>";
    $homeScreen->createUsers("true","1.5","123456789","123456789","First","Last","");
    // 1.6 email not valid email
    echo " <br>1.6 Email not a valid email <br>";
    $homeScreen->createUsers("true","1.6","123456789","123456789","First","Last","notAnEmail");
    // 1.7 username empty
    echo " <br>1.7 Username empty <br>";
    $homeScreen->createUsers("true","","123456789","123456789","First","Last","1.7@email.com");
    // 1.8 password Empty
    echo " <br>1.8 Password empty <br>";
    $homeScreen->createUsers("true","1.8","","123456789","First","Last","1.8@email.com");
    // 1.9 re-enter password Empty
    echo " <br>1.9 Re-Enter Password empty <br>";
    $homeScreen->createUsers("true","1.9","123456789","","First","Last","1.9@email.com");
    // 1.10 passwords do not match
    echo " <br>1.10 Passwords do not match <br>";
    $homeScreen->createUsers("true","1.10","123456789","987654321","First","Last","1.10@email.com");
    // 1.11 Email already exists
    echo " <br>1.11 Email already exists <br>";
    $homeScreen->createUsers("true","1.11","123456789","123456789","First","Last","1.1@email.com");
    // 1.12 password less than 8 characters
    echo " <br>1.12 Password too short <br>";
    $homeScreen->createUsers("true","1.12","123456","123456","First","Last","1.12@email.com");

    echo "<br> <br>";

    echo "<b>Login Tests: </b><br>";
    // Test #2: login
    // 2.1 valid
    echo "2.1 Valid <br>";
    $homeScreen->login("true","1.1","123456789");
    // 2.2 unknown username
    echo " <br>2.2 Unregistered Username <br>";
    $homeScreen->login("true","2.2","123456789");
    // 2.3 empty username
    echo " <br>2.3 Username empty <br>";
    $homeScreen->login("true","","123456789");
    // 2.4 valid username, invalid password
    echo " <br>2.4 Valid Username, Invalid Password <br>";
    $homeScreen->login("true","1.1","111111111");
    // 2.5 valid username, empty password
    echo " <br>2.5 Valid Username, Empty Password <br>";
    $homeScreen->login("true","1.1","");

echo "<br><br>";

    echo "<b>Contact Tests: </b><br>";
    // Test #3 contact
    // 3.1 valid
    echo "3.1 Valid <br>";
    $homeScreen->contact("true","TestTitle","TestDescription","test@email.com");
    // 3.2 title Empty
    echo "3.2 Title empty <br>";
    $homeScreen->contact("true","","TestDescription","test@email.com");
    // 3.3 description empty
    echo "3.3 Description empty <br>";
    $homeScreen->contact("true","TestTitle","","test@email.com");
    // 3.4 email empty
    echo "3.4 Email empty <br>";
    $homeScreen->contact("true","TestTitle","TestDescription","");

?>
