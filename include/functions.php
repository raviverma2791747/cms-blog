<?php

require_once("connection.php");

function redirect($location){
    header("Location: {$location}");
    exit;
}

function safe_string($str){
    global $con;
    $str = $con->real_escape_string($str);
    return $str;
}

function alert($str){
    echo "<script>alert('{$str}')</script>";
}

?>