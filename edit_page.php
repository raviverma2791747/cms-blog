<?php require_once("./include/connection.php"); ?>
<?php require_once("./include/functions.php"); ?>
<?php require_once("./include/session.php");
logged_in();
?>

<?php require_once("./include/admin_header.php"); ?>

<?php
$heading = "";
$content = "";
$visible = 0;
if (isset($_POST["submit"])) {
    $id = $_GET["id"];
    $heading = safe_string($_POST["heading"]);
    $content = safe_string($_POST["content"]);
    if(isset($_POST["visible"])){
        $visible = 1;
    }

    if ($heading == "" || $content == "") {
        alert("Heading or content is empty!");
    } else {
        $query = "UPDATE page SET heading='{$heading}',content='{$content}',visible={$visible} WHERE id={$id};";

        $result = $con->query($query);

        if ($result) {
           alert("Post updated successfully!");
        } else {
            alert("Failed to update!");
        }
    }
}else if(isset($_GET["id"])){
    $result = get_page($_GET["id"]);
    $id= $_GET["id"];
    $page = $result->fetch_assoc();
    $heading = $page["heading"] ;
    $content = $page["content"] ;
    $visible = $page["visible"];
}else{
    redirect("./admin.php");
}

?>

<div class="container">
    <div class="card shadow">
        <form action="edit_page.php?id=<?php echo $id;?>" method="post">
        <div class="mb-10">
                <input type="checkbox" name="visible" value="1" <?php if($visible == 1){echo "checked"; } ?>>
                <label>Visible</label>
            </div>
            <div class="mb-10">
                <input class="input w-100" name="heading" placeholder="heading" value="<?php echo $heading; ?>">
            </div>
            <div class="mb-10">
                <textarea class="input w-100" name="content" rows="10" placeholder="content" style="resize: vertical;"><?php echo $content; ?></textarea>
            </div>
            <div class="mb-5">
                <input class="btn btn-primary" type="submit" name="submit" value="Update">
                <button class="btn btn-primary"><a href="./admin.php">Cancel</a></button>
            </div>
        </form>
    </div>
</div>

<?php require_once("./include/admin_footer.php") ?>