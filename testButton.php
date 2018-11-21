<?php
    // error_reporting(E_ALL);
    // ini_set("display_errors", 1);
    //
    include('users/testSuiteUsers.php');
    $homeScreen = new TestSuiteUsers();

    echo "<b><u>USER SIDE TESTS</u></b> <br><br>";

    echo "<b>Create User Tests: </b><br>";
    // Test #1: createUsers
    // 1.1 valid
    echo "<br>1.1 Valid <br>";
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

echo "<br>";

    echo "<b>Login Tests: </b><br>";
    // Test #2: login
    // 2.1 valid
    echo "<br>2.1 Valid <br>";
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

echo "<br>";

    echo "<b>Contact Tests: </b><br>";
    // Test #3 contact
    // 3.1 valid
    echo "<br>3.1 Valid <br>";
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

echo "<br>";

    echo "<b>Send Message Tests: </b><br>";
    // Test #4 send message
    // 4.1 valid
    echo "<br>4.1 Valid <br>";
    $homeScreen->sendMessage("true","TestMessage","1.1");
    // 4.2 message Empty
    echo "<br>4.2 message empty <br>";
    $homeScreen->sendMessage("true","","1.1");
    // 4.3 username empty
    echo "<br>4.3 username empty <br>";
    $homeScreen->sendMessage("true","TestMessage","");
    // 4.4 username wrong
    echo "<br>4.4 username wrong <br>";
    $homeScreen->sendMessage("true","TestMessage","4.4");

echo "<br>";

    echo "<b>Change Email Tests: </b><br>";
    // Test #5 change email

    //create users for tests
    echo "<br>Create Users for Tests <br>";
    $homeScreen->createUsers("true","5.1","123456789","123456789","First","Last","5.1@email.com");
    $homeScreen->createUsers("true","5.2","123456789","123456789","First","Last","5.2@email.com");
    $homeScreen->createUsers("true","5.3","123456789","123456789","First","Last","5.3@email.com");
    $homeScreen->createUsers("true","5.4","123456789","123456789","First","Last","5.4@email.com");

    // 5.1 valid
    echo "<br>5.1 Valid <br>";
    $homeScreen->changeEmail("true","5.1","changed5.1@email.com");
    // 5.2 email Empty
    echo "<br>5.2 Email empty <br>";
    $homeScreen->changeEmail("true","5.2","");
    // 5.3 username empty
    echo "<br>5.3 Username empty <br>";
    $homeScreen->changeEmail("true","","changed5.3@email.com");
    // 5.4 username wrong
    echo "<br>5.4 Username wrong <br>";
    $homeScreen->changeEmail("true","5.40","changed5.4@email.com");

echo "<br>";

    echo "<b>Change Password Tests: </b><br>";
    // Test #6 change password

    //create users for tests
    echo "<br>Create Users for Tests <br>";
    $homeScreen->createUsers("true","6.1","123456789","123456789","First","Last","6.1@email.com");
    $homeScreen->createUsers("true","6.2","123456789","123456789","First","Last","6.2@email.com");
    $homeScreen->createUsers("true","6.3","123456789","123456789","First","Last","6.3@email.com");
    $homeScreen->createUsers("true","6.4","123456789","123456789","First","Last","6.4@email.com");
    $homeScreen->createUsers("true","6.5","123456789","123456789","First","Last","6.5@email.com");
    $homeScreen->createUsers("true","6.6","123456789","123456789","First","Last","6.6@email.com");
    $homeScreen->createUsers("true","6.7","123456789","123456789","First","Last","6.7@email.com");
    $homeScreen->createUsers("true","6.8","123456789","123456789","First","Last","6.8@email.com");
    $homeScreen->createUsers("true","6.9","123456789","123456789","First","Last","6.9@email.com");
    $homeScreen->createUsers("true","6.10","123456789","123456789","First","Last","6.10@email.com");
    $homeScreen->createUsers("true","6.11","123456789","123456789","First","Last","6.11@email.com");

    // 6.1 valid
    echo "<br>6.1 Valid <br>";
    $homeScreen->changePassword("true","6.1","123456789","123456789","987654321","987654321");
    // 6.2 username not exist
    echo "<br>6.2 Username Not Exist <br>";
    $homeScreen->changePassword("true","6.20","123456789","123456789","987654321","987654321");
    // 6.3 username empty
    echo "<br>6.3 Username Empty <br>";
    $homeScreen->changePassword("true","","123456789","123456789","987654321","987654321");
    // 6.4 old password 1 not correct
    echo "<br>6.4 Old Pass 1 wrong <br>";
    $homeScreen->changePassword("true","6.4","111111111","123456789","987654321","987654321");
    // 6.5 old password 2 not Correct
    echo "<br>6.5 Old Pass 2 wrong <br>";
    $homeScreen->changePassword("true","6.5","123456789","111111111","987654321","987654321");
    // 6.6 old password 1 Empty
    echo "<br>6.6 Old Pass 1 Empty <br>";
    $homeScreen->changePassword("true","6.6","","123456789","987654321","987654321");
    // 6.7 old password 2 empty
    echo "<br>6.7 Old Pass 2 Empty <br>";
    $homeScreen->changePassword("true","6.7","123456789","","987654321","987654321");
    // 6.8 new password not long enough
    echo "<br>6.8 New Pass Too Short <br>";
    $homeScreen->changePassword("true","6.8","123456789","123456789","123456","123456");
    // 6.9 new password Empty
    echo "<br>6.9 New Pass Empty <br>";
    $homeScreen->changePassword("true","6.9","123456789","123456789","","");
    // 6.10 new passwords not the same
    echo "<br>6.10 New Passes Not the Same <br>";
    $homeScreen->changePassword("true","6.10","123456789","123456789","987654321","111111111");
    // 6.11 new passwords equal old passwords
    echo "<br>6.11 New Passes equal Old Passes<br>";
    $homeScreen->changePassword("true","6.11","123456789","123456789","123456789","123456789");
    // 6.12 both old passwords wrong
    echo "<br>6.12 Both Old Passwords wrong <br>";
    $homeScreen->changePassword("true","6.12","111111111","111111111","987654321","987654321");

?>
