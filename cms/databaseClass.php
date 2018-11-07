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
                    <th scope="col"> Status </th>
                    <th scope="col"> Create offer </th>
                </tr>

                <?php
                $items = "SELECT * FROM Project_Items ORDER BY item_id";
                if ($result = $mysqli->query($items)) {
                    // Get all items of the specific user
                    while ($users_row = $result->fetch_assoc()) {
                        $item_id = $users_row['item_id'];
                        $name = $users_row['name'];
                        $description = $users_row['description'];
                        $username = $users_row['username'];
                        $offer = $users_row['offer'];
                        $status = $users_row['status'];
                        ?>
                        <tr>
                            <th> <?php echo $item_id; ?> </th>
                            <th> <?php echo $name; ?> </th>
                            <th> <?php echo $description; ?> </th>
                            <th> <?php echo $username; ?> </th>
                            <th> <?php echo $offer; ?> </th>
                            <th> <?php echo $status; ?> </th>
                            <?php
                                if ($status != "accepted"){
                                    ?>
                                        <th> <a href="../admin/admin_createOffer.php?itemOffer=<?php echo $item_id?>"> X </a> </th>
                                    <?php
                                }
                                else{
                                    ?>
                                        <th> </th>
                                    <?php
                                }
                            ?>
                        </tr>
                    <?php
                    }
                    /* free result set */
                    $result->free();
                } ?>
            </table>
        <?php
        }


        public function showItemsUser($type){
           // Access database
           include ('sql_credentials.php');
           global $mysqli;


           // Type of table: get (admin panel), or session(user panel)
           if ($type == "get"){
               $username = $_GET['Username'];
           }
           else {
               $username =  $_SESSION['user_id'];
           }

            ?>
            <table class="table table-striped" >
                <tr>
                    <th scope="col"> ID </th>
                    <th scope="col"> Item </th>
                    <th scope="col"> Description </th>
                    <th scope="col"> Image </th>
                    <th scope="col"> Offer </th>
                    <?php
                        // Status column only for admin panel table. User panel has different tables according to the status
                        if ($type == "get"){
                            ?>
                            <th scope="col"> Status </th>
                            <?php
                        }
                        // Accept offer button only for table with items with an offer
                        else if ($type == "offer"){
                            ?>
                            <th scope="col"> Accept offer </th>
                            <?php
                        }

                    ?>
                </tr>

                <?php
                // Selects all the items of the user for the admin panel
                if ($type=="get"){
                    $items = "SELECT * FROM Project_Items WHERE username='$username' ORDER BY item_id ";
                }
                // Selects all the items of the user according to the status for the user panel
                else {
                    $items = "SELECT * FROM Project_Items WHERE username='$username' AND status='$type' ORDER BY item_id";
                }

                if ($result = $mysqli->query($items)) {
                    // Get all items of the specific user
                    while ($users_row = $result->fetch_assoc()) {
                        $item_id = $users_row['item_id'];
                        $name = $users_row['name'];
                        $description = $users_row['description'];
                        $image = $users_row['image'];
                        $offer = $users_row['offer'];
                        $status = $users_row['status'];
                        ?>
                        <tr>
                            <th> <?php echo $item_id; ?> </th>
                            <th> <?php echo $name; ?> </th>
                            <th> <?php echo $description; ?> </th>
                            <?php
                                echo '
                                <th> <img src="data:image/jpeg;base64,'.base64_encode($users_row['image'] ).'" height="75" width="75" class="img-thumnail" />  </th>
                                ';
                            ?>
                            <th> <?php echo $offer; ?> </th>
                            <?php
                                if ($type == "get"){
                                    ?>
                                    <th> <?php echo $status; ?> </th>
                                    <?php
                                }
                                else if ($type == "offer"){
                                    ?>
                                    <th scope="col">
                                        <form action="../users/backEnd/acceptOffer.php" method="post">
                                             <button name="accept" type="submit" value="<?php echo $item_id?>">accept</button>
                                        </form>
                                    </th>
                                    <?php
                                }

                            ?>
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
                $users = "SELECT * FROM Project_Users ORDER BY user_id";
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
