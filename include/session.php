<?php

require_once("./include/functions.php");
session_start();

function logged_in(){
    if(!isset($_SESSION["id"])){
        redirect("./login.php");
    }
}

?>