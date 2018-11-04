<?php
/**
    * Sidebar
    *
    * Sidebar for the admin panel
    *
    * @author Tritens
    * @package admin
    */
?>
<nav id="sidebar">
    <div class="sidebar-header">
        <h3>Admin</h3>
    </div>

    <ul class="sidebar-menu">
        <li class="active"> <a href="admin_dashboard.php">Dashboard</a> </li>
        <li> <a href="admin_users.php"> Users </a> </li>
        <li> <a href="admin_items.php"> Items </a> </li>
        <li> <a href="admin_messageboard.php"> Message Board </a> </li>
        <li> <a href="admin_problems.php"> Issues </a> </li>
        <li> <form action="backEnd/logoutAdmin.php" method="post"> <input type="submit" value="Log Out"> </form> </li>
    </ul>

</nav>
