<?php
require_once("./include/connection.php");
require_once("./include/functions.php");
require_once("./include/session.php");

logged_in();

if(isset($_GET["id"])){
    $id = $_GET["id"];
    $query = "DELETE FROM page WHERE id={$id};";
    $con->query($query);
    redirect("./admin.php");
}

?>