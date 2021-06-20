<?php
require_once("./include/connection.php");
require_once("./include/functions.php");

if(isset($_POST["submit"])){
    $email = safe_string($_POST["email"]);
    $query = "INSERT INTO subscription(email) VALUES('{$email}')";
    $result = $con->query($query);
}

?>