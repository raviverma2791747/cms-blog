<?php require_once("./include/session.php");
logged_in();
?>

<?php require_once("./include/admin_header.php"); ?>
<div class="container">
    <div class="card shadow">
        <h2 class="text-center">Admin User Menu</h2>
        <div class="btn btn-primary mb-5"><a href="./add_user.php">+ Add User</a></div>
        <div>
            <table>
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                </tr>
                <?php
                 $result = get_users();
                 while($user = $result->fetch_assoc()){
                     echo "<tr>";
                     echo "<td>".$user["username"]."</td>";
                     echo "<td><a href=\"./edit_user.php?id=".urlencode($user["id"])."\">Edit</a> <a href=\"./delete_user.php?id=".urlencode($user["id"])."\">Delete</a></td>";
                     echo "</tr>";
                 }
                ?>
            </table>
        </div>
    </div>
</div>
<?php require_once("./include/admin_footer.php"); ?>