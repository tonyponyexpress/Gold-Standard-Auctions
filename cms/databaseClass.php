<?php
/**
    * Database: class with database functions
    *
    * Holds different functions used in the user and admin panel that displays the database information
    *
    * @author Tritens
    * @package cms
    */

    class database
    {

        /**
           * Show Items
           *
           * Creates an table with the items in the database
           *
           * @return void
           */
        public function showItems(){
           // Access database
           include ('sql_credentials.php');
           global $mysqli;

            ?>
          <form action="backEnd/admin_delete_items.php" method="post">
            <table class="table thead-light table-hover" >
                <thead class="thead-light">
                    <th scope="col"> ID </th>
                    <th scope="col"> Item </th>
                    <th scope="col"> Description </th>
                    <th scope="col"> Username </th>
                    <th scope="col"> Offer </th>
                    <th scope="col"> Status </th>
                    <th scope="col"> Create offer </th>
                    <th scope="col"> Delete </th>
                </thead>

                <?php
                $items = "SELECT * FROM Project_Items ORDER BY item_id DESC";
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
                            <td> <?php echo $item_id; ?> </td>
                            <td> <?php echo $name; ?> </td>
                            <td> <?php echo $description; ?> </td>
                            <td> <?php echo $username; ?> </td>
                            <td> <?php echo $offer; ?> </td>
                            <td> <?php echo $status; ?> </td>
                            <?php
                                if ($status != "accepted"){
                                    ?>
                                        <td> <a href="../admin/admin_createOffer.php?itemOffer=<?php echo $item_id?>"> X </a> </td>
                                    <?php
                                }
                                else{
                                    ?>
                                        <td> </td>
                                    <?php
                                }
                            ?>
                            <td><?php $Admin_ID = $users_row['item_id']; echo"<input type=checkbox name=$Admin_ID>"; ?> </td>
                        </tr>
                    <?php
                    }
                    // free result set
                    $result->free();
                } ?>
            </table>

            <input type="submit" class="btn float-right deleteAdmin" value="Delete selected item(s)">
          </form>
        <?php
        }


        /**
           * Show Items of a user
           *
           * Creates an table with the items of a specific user. Table differs in the user and admin panel
           *
           * @param string $type
           *
           * @return void
           */
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
            <div class="table-responsive">
                <table class="table thead-light table-hover" >
                    <thead class="thead-light">
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
                    </thead>

                    <?php
                    // Selects all the items of the user for the admin panel
                    if ($type=="get"){
                        $items = "SELECT * FROM Project_Items WHERE username='$username' ORDER BY item_id DESC ";
                    }
                    // Selects all the items of the user according to the status for the user panel
                    else {
                        $items = "SELECT * FROM Project_Items WHERE username='$username' AND status='$type' ORDER BY item_id DESC";
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
                                <td scope="row"> <?php echo $item_id; ?> </td>
                                <td> <?php echo $name; ?> </td>
                                <td> <?php echo $description; ?> </td>
                                <?php
                                    echo '
                                    <td> <img src="data:image/jpeg;base64,'.base64_encode($users_row['image'] ).'" height="75" width="75" class="img-thumnail" />  </td>
                                    ';
                                ?>
                                <td> <?php echo $offer; ?> </td>
                                <?php
                                    if ($type == "get"){
                                        ?>
                                        <td> <?php echo $status; ?> </td>
                                        <?php
                                    }
                                    else if ($type == "offer"){
                                        ?>
                                        <td scope="col">
                                                 <button class="btn btn-sml" id="acceptOffer" name="accept" type="submit" value="<?php echo $item_id?>">accept</button>

                                        </td>
                                        <td><?php $User_ID = $users_row['item_id']; echo"<input type=checkbox name=$User_ID>"; ?> </td>
                                        <?php
                                    }
                                    else if ($type == "pending"){
                                        ?>
                                        <td><?php $User_ID = $users_row['item_id']; echo"<input type=checkbox name=$User_ID>"; ?> </td>
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

            </div>

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


        /**
           * Show Items
           *
           * Creates an table with the users in the database
           *
           * @return void
           */
        public function showUsers(){
           // Access database
           include ('../cms/sql_credentials.php');
           global $mysqli;
           ?>
           <form action="backEnd/admin_delete_user.php" method="post">
            <table class="table thead-light table-hover" >
                <thead class="thead-light">
                    <th scope="col"> Name </th>
                    <th scope="col"> Username </th>
                    <th scope="col"> # of items </th>
                    <th scope="col"> Profile </th>
                    <th scope="col"> Delete </th>
                </thead>

            <?php
                $users = "SELECT * FROM Project_Users ORDER BY user_id";
                if ($result = $mysqli->query($users)) {
                    // Get all users
                    while ($users_row = $result->fetch_assoc()) {
                        $ID = $users_row['user_id'];
                        $FirstName = $users_row['FirstName'];
                        $LastName = $users_row['LastName'];
                        $username = $users_row['username'];
                        $number_items = $users_row['number_items'];
                        $username = $users_row['username'];
                        ?>
                        <tr>
                            <td>
                                <div id="table_name"> <?php echo $FirstName; echo " "; echo $LastName ?>  </div>
                                <div id="table_id"> ID: <?php echo $ID; ?>  </div>
                            </td>
                            <td> <?php echo $username; ?> </td>
                            <td> <?php echo $number_items; ?> </td>
                            <td> <a href="admin_users_profile.php?Username=<?php echo $username?>"> X </a> </td>
                            <td> <?php $Admin_ID = $users_row['user_id']; echo"<input type=checkbox name=$Admin_ID>"; ?> </td>
                        </tr>

                    <?php
                    }
                    /* free result set */
                    $result->free();
                } ?>
            </table>
            <input type="submit" class="btn float-right deleteAdmin" value="Delete selected user(s)">
          </form>
        <?php
        }

        /**
           * Show Items
           *
           * Creates an table with the messages in the database
           *
           * @return void
           */
        public function showMessages(){
            // Access database
            include ('sql_credentials.php');
            global $mysqli;

            ?>

             <table class="table thead-light table-hover">
                 <thead class="thead-light">
                     <th scope="col"> ID </th>
                     <th scope="col"> Message </th>
                     <th scope="col"> Username </th>
                     <th scope="col"> Date </th>
                     <th scope="col"> Answer </th>
                 </thead>


             <?php
                 $users = "SELECT * FROM Project_Messages WHERE admin IS NULL ORDER BY message_id DESC";
                 if ($result = $mysqli->query($users)) {
                     // Get all users
                     while ($message_row = $result->fetch_assoc()) {
                         $ID = $message_row['message_id'];
                         $message = $message_row['message'];
                         $username = $message_row['username'];
                         $date = $message_row['m_date'];
                         ?>

                         <tr>
                             <td> <?php echo $ID; ?> </td>
                             <td> <?php echo $message; ?> </td>
                             <td> <a href="../admin/admin_users_profile.php?Username=<?php echo $username?>"> <?php echo $username; ?>  </a> </td>
                             <td> <?php echo $date; ?> </td>
                             <td> <a href="../admin/admin_users_profile.php?Username=<?php echo $username?>"> X </td>
                         </tr>
                     <?php
                     }
                     /* free result set */
                     $result->free();
                 }
                 ?>
             </table>
             <?php
        }

        /**
           * Show messages of a user
           *
           * Creates an table with the items of a specific user
           *
           * @param string $username
           *
           * @return void
           */
        public function showMessagesUser($username){
            ?>
            <table class="table" >
            <?php
                // Access database
                include ('../cms/sql_credentials.php');
                global $mysqli;

                $messages = "SELECT * FROM Project_Messages WHERE username='$username' ORDER BY message_id ";
                if ($result = $mysqli->query($messages)) {
                    // Get all users
                    while ($message_row = $result->fetch_assoc()) {
                        $ID = $message_row['message_id'];
                        $message = $message_row['message'];
                        $admin = $message_row['admin'];
                        $date = $message_row['m_date'];
                        if ($admin == 1){
                            ?>
                            <tr>
                                <td id="message-admin"> admin: <?php echo $message; ?> <span> <?php echo "<br>" . $date ?> </td>
                            </tr>
                            <?php
                        }
                        else{
                            ?>
                            <tr>
                                <td id="message-user"> <?php echo $username . ":" . $message ;?>  <span> <?php echo "<br>" . $date ?> </td>
                            </tr>
                            <?php
                        }
                    }
                    // free result set
                    $result->free();
                }
                ?>
            </table>
            <?php
        }

        /**
           * Show Issues
           *
           * Creates an table with the issues in the database
           *
           * @return void
           */
        public function showIssues(){
            // Access database
            include ('../cms/sql_credentials.php');
            global $mysqli;
            ?>

            <form action="backEnd/admin_delete_issue.php" method="post">
                <table class="table thead-light table-hover">
                 <thead class="thead-light">
                     <th scope="col"> ID </th>
                     <th scope="col"> Title </th>
                     <th scope="col"> Description </th>
                     <th scope="col"> E-mail </th>
                     <th scope="col"> Delete </th>
                 </thead>


                <?php
                 $problems = "SELECT * FROM Project_Problems ORDER BY problem_id DESC";
                 if ($result = $mysqli->query($problems)) {
                     // Get all users
                     while ($message_row = $result->fetch_assoc()) {
                         $ID = $message_row['problem_id'];
                         $title = $message_row['title'];
                         $description = $message_row['description'];
                         $email = $message_row['email'];
                         ?>
                         <tr>
                             <td> <?php echo $ID; ?> </td>
                             <td> <?php echo $title; ?> </td>
                             <td> <?php echo $description ?> </td>
                             <td> <?php echo $email  ?>   </td>
                             <td><?php echo"<input type=checkbox name=$ID>"; ?> </td>
                         </tr>
                     <?php
                     }
                     // free result set
                     $result->free();
                 }
                 ?>
                </table>
                <input type="submit" class="btn float-right deleteAdmin" value="Delete selected issue(s)">
            </form>
            <?php
        }

    }

?>
