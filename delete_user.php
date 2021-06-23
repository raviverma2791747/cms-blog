<?php
require_once("./include/session.php");
require_once("./include/connection.php");
require_once("./include/functions.php");

logged_in();

if(isset($_GET["id"])){
    $id = $_GET["id"];
    $query = "DELETE FROM users WHERE id={$id} AND (SELECT COUNT(*) FROM users) >  3";
    $result = $con->query($query);
    if($_SESSION["id"] == $id){
        redirect("./logout.php");
    }else{
    redirect("./user.php");}
}
