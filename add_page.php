<?php require_once("./include/connection.php"); ?>
<?php require_once("./include/functions.php"); ?>
<?php require_once("./include/session.php");
logged_in();
?>

<?php require_once("./include/admin_header.php"); ?>

<?php
$heading = "";
$content = "";
if (isset($_POST["submit"])) {
    $heading = safe_string($_POST["heading"]);
    $date = date("Y-m-d");
    $author = $_SESSION["id"];
    $content = safe_string($_POST["content"]);

    if ($heading == "" || $content == "") {
        alert("Heading or content is empty!");
    } else {
        $query = "INSERT INTO page (heading,date,author,content) VALUES('{$heading}','{$date}',{$author},'{$content}');";

        $result = $con->query($query);

        if ($result) {
           redirect("./admin.php");
        } else {
            alert("Failed to post!");
        }
    }
}

?>
<div class="container">
    <div class="card shadow">
        <form action="add_page.php" method="post">
            <div class="mb-10">
                <input class="input w-100" name="heading" placeholder="heading" value="<?php echo $heading; ?>">
            </div>
            <div class="mb-10">
                <textarea class="input w-100" name="content" rows="10" placeholder="content" style="resize: vertical;"><?php echo $content; ?></textarea>
            </div>
            <div class="mb-5">
                <input class="btn btn-primary" type="submit" name="submit">
                <button class="btn btn-primary"><a href="./admin.php">Cancel</a></button>
            </div>
        </form>
    </div>
</div>

<?php require_once("./include/admin_footer.php") ?>