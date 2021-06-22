<?php require_once("./include/session.php");
logged_in();
?>
<?php require_once("./include/connection.php"); ?>
<?php require_once("./include/functions.php");?>

<?php require_once("./include/admin_header.php"); ?>
<div class="container">
    <div class="card shadow">
        <h2 class="text-center">Admin Blog Menu</h2>
        <div class="d-flex flex-row justify-content-space-evenly">
            <div class="btn btn-primary mb-5"><a href="./add_page.php">+ Add Post</a></div>
            <div class="btn btn-primary mb-5"><a href="./user.php">Manage Users</a></div>
        </div>
        <div>
            <table>
                <tr>
                    <th>Heading</th>
                    <th>Date</th>
                    <th>Author</th>
                    <th>Action</th>
                </tr>
                <?php
                $result = get_pages();
                while($page = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>";
                    echo  $page["heading"];
                    echo "</td>";
                    echo "<td>";
                    echo  $page["date"];
                    echo "</td>";
                    echo "<td>";
                    $author = get_user($page["author"])->fetch_assoc()["username"];
                    echo  $author;
                    echo "</td>";
                    echo "<td>";
                     echo "<a href=\"edit_page.php?id=".$page["id"]."\">Edit</a> <a href=\"delete_page.php?id=".$page["id"]."\">Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
</div>
<?php require_once("./include/admin_footer.php"); ?>