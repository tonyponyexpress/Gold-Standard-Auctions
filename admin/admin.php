<?php
    $mysqli = new mysqli("database_URL", "t828n219", "se4ahqu3", "t828n219");

    /* check connection */
    if ($mysqli->connect_error) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
?>

<table>
    <tr>
        <th> Name </th>
        <th> Information </th>
        <th> Items </th>
        <th> Delete </th>
    </tr>


<?php
    $users = "SELECT * FROM Project_Users";
    if ($result = $mysqli->query($users)) {
        // Get all users
        while ($users_row = $result->fetch_assoc()) {
            $ID = $row['user_ID'];
            $FirstName = $row['FirstName'];
            $LastName = $row['LastName'];
            $number_items = $row['number_items'];
            ?>

            <tr>
                <th> <?php echo $FirstName; ?> </th>
                <th> <?php echo $number_items; ?> </th>
                <th> Items </th>
                <th> X </th>
            </tr>
        <?php
        }
        /* free result set */
        $result->free();
    }
    ?>
</table>

<?php
/* close connection */
$mysqli->close();
?>
