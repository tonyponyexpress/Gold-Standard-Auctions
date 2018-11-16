<?php

    class database
    {
        public function showItems(){
           // Access database
           include ('sql_credentials.php');
           global $mysqli;

            ?>
          <form action="admin_delete_items.php" method="post">
            <table class="table table-striped" >
                <tr>
                    <th scope="col"> ID </th>
                    <th scope="col"> Item </th>
                    <th scope="col"> Description </th>
                    <th scope="col"> Username </th>
                    <th scope="col"> Offer </th>
                    <th scope="col"> Status </th>
                    <th scope="col"> Create offer </th>
                    <th scope="col"> Delete </th>
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
                            <th><?php $Admin_ID = $users_row['item_id']; echo"<input type=checkbox name=$Admin_ID>"; ?> </th>
                        </tr>
                    <?php
                    }
                    /* free result set */
                    $result->free();
                } ?>
            </table>
            <input type="submit" value="Delete selected item(s)">
          </form>
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
          <form action="backEnd/user_delete_item.php" method="post">
            <table class="table table-striped" >
                <tr>
                    <th scope="col"> ID </th>
                    <th scope="col"> Item </th>
                    <th scope="col"> Description </th>
                    <th scope="col"> Image </th>
                    <th scope="col"> Offer </th>
                    <?php
                        // Admin panel: Status column only for admin panel table. User panel has different tables according to the status
                        if ($type == "get"){
                            ?>
                            <th scope="col"> Status </th>
                            <?php
                        }
                        // Pending Offers Items:
                        else if ($type == "pending"){
                          ?>
                          <th scope="col"> Delete </th>
                          <?php
                        }
                        // Offers:
                        else if ($type == "offer"){
                            ?>
                            <th scope="col"> Accept offer </th>
                            <th scope="col"> Delete </th>
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
                                             <button class="btn btn-sml" id="acceptOffer" name="accept" type="submit" value="<?php echo $item_id?>">accept</button>

                                    </th>
                                    <th><?php $User_ID = $users_row['item_id']; echo"<input type=checkbox name=$User_ID>"; ?> </th>
                                    <?php
                                }
                                else if ($type == "pending"){
                                    ?>
                                    <th><?php $User_ID = $users_row['item_id']; echo"<input type=checkbox name=$User_ID>"; ?> </th>
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
            if ($type == "offer" || $type == "pending"  ){
                ?>
                 <button class="btn btn-sml float-right" id="submitDelete" name="delete" value="deleteItems" type="submit"> Delete selected item(s) </button>
            <?php
            }
            ?>

          </form>
        <?php
        }


        public function showUsers(){
           // Access database
           include ('../cms/sql_credentials.php');
           global $mysqli;
           ?>
           <form action="admin_delete_user.php" method="post">
            <table class="table table-striped" >
                <tr>
                    <th scope="col"> Name </th>
                    <th scope="col"> # of items </th>
                    <th scope="col"> Profile </th>
                    <th scope="col"> Delete </th>
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
                            <th> <?php $Admin_ID = $users_row['user_id']; echo"<input type=checkbox name=$Admin_ID>"; ?> </th>
                        </tr>

                    <?php
                    }
                    /* free result set */
                    $result->free();
                } ?>
            </table>
            <input type="submit" value="Delete selected user(s)">
          </form>
        <?php
        }
    }

?>
