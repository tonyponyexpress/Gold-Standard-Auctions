<?php

    class database
    {
        public function showItems(){
           // Access database
           include ('sql_credentials.php');
           global $mysqli;

            ?>
            <table class="table table-striped" >
                <tr>
                    <th scope="col"> ID </th>
                    <th scope="col"> Item </th>
                    <th scope="col"> Description </th>
                    <th scope="col"> Username </th>
                    <th scope="col"> Offer </th>
                </tr>

                <?php
                $items = "SELECT * FROM Project_Items";
                if ($result = $mysqli->query($items)) {
                    // Get all items of the specific user
                    while ($users_row = $result->fetch_assoc()) {
                        $item_id = $users_row['item_id'];
                        $name = $users_row['name'];
                        $description = $users_row['description'];
                        $username = $users_row['username'];
                        $offer = $users_row['offer'];
                        ?>
                        <tr>
                            <th> <?php echo $item_id; ?> </th>
                            <th> <?php echo $name; ?> </th>
                            <th> <?php echo $description; ?> </th>
                            <th> <?php echo $username; ?> </th>
                            <th> <?php echo $offer; ?> </th>
                        </tr>
                    <?php
                    }
                    /* free result set */
                    $result->free();
                } ?>
            </table>
        <?php
        }



        public function showItemsUser(){
           // Access database
           include ('sql_credentials.php');
           global $mysqli;

            ?>
            <table class="table table-striped" >
                <tr>
                    <th scope="col"> ID </th>
                    <th scope="col"> Item </th>
                    <th scope="col"> Description </th>
                    <th scope="col"> Offer </th>
                </tr>

                <?php
                $username = $_GET['Username'];
                $items = "SELECT * FROM Project_Items WHERE username='$username'";
                if ($result = $mysqli->query($items)) {
                    // Get all items of the specific user
                    while ($users_row = $result->fetch_assoc()) {
                        $item_id = $users_row['item_id'];
                        $name = $users_row['name'];
                        $description = $users_row['description'];
                        $offer = $users_row['offer'];
                        ?>
                        <tr>
                            <th> <?php echo $item_id; ?> </th>
                            <th> <?php echo $name; ?> </th>
                            <th> <?php echo $description; ?> </th>
                            <th> <?php echo $offer; ?> </th>
                        </tr>
                    <?php
                    }
                    /* free result set */
                    $result->free();
                } ?>
            </table>
        <?php
        }

        public function showUsers(){
           // Access database
           include ('../cms/sql_credentials.php');
           global $mysqli;
           ?>

            <table class="table table-striped" >
                <tr>
                    <th scope="col"> Name </th>
                    <th scope="col"> # of items </th>
                    <th scope="col"> Profile </th>
                </tr>

            <?php
                $users = "SELECT * FROM Project_Users";
                if ($result = $mysqli->query($users)) {
                    // Get all users
                    while ($users_row = $result->fetch_assoc()) {
                        $ID = $users_row['user_id'];
                        $FirstName = $users_row['FirstName'];
                        $LastName = $users_row['LastName'];
                        $number_items = $users_row['number_items'];
                        $username = $users_row['username'];
                        ?>

                        <tr>
                            <th>
                                <div id="table_name"> <?php echo $FirstName; echo " "; echo $LastName ?>  </div>
                                <div id="table_id"> ID: <?php echo $ID; ?>  </div>
                            </th>
                            <th> <?php echo $number_items; ?> </th>
                            <th> <a href="admin_users_profile.php?Username=<?php echo $username?>"> X </a> </th>
                        </tr>

                    <?php
                    }
                    /* free result set */
                    $result->free();
                } ?>
            </table>

        <?php
        }



    }

?>
