<?php require_once("./include/connection.php"); ?>
<?php require_once("./include/functions.php"); ?>


<?php
require_once("./include/header.php");
?>

<div id="blog-cards" class="mb-10 d-flex flex-column align-items-center">
    <?php
    $result = get_pages(true);

    if (!$result) {
        echo "<h2>No articles to show</h2>";
    } else {
        while ($page = $result->fetch_assoc()) {

            if ($page["visible"] == 1) {
                blog_card($page);
            }
        }
    }

    ?>
</div>

<?php
require_once("./include/footer.php");
?>