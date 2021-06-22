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

function get_users(){
    global $con;
    $query = "SELECT * FROM users ORDER BY username ASC";
    $result = $con->query($query);
    return $result;
}

function get_user($id){
    global $con;
    $query = "SELECT * FROM users WHERE id={$id}";
    $result = $con->query($query);
    return $result;
}

function get_pages(){
    global $con;
    $query = "SELECT * FROM page ORDER BY date ASC";
    $result = $con->query($query);
    return $result;
}

function get_page($id){
    global $con;
    $query = "SELECT * FROM page WHERE id={$id}";
    $result = $con->query($query);
    return $result;
}

function blog_card($page){
   echo  "<div class=\"blog card shadow mb-5\">";
   echo  "<h2 class=\"mb-5\">".$page["heading"]."</h2>";
   $author = get_user($page["author"])->fetch_assoc()["username"];
   echo  "<small>".$author."</small><br>";
   echo  "<small><time datetime=\"".$page["date"]."\">".$page["date"]."</time></small>";
   echo  "<p class=\"mb-5\">".$page["content"]."</p>";
   echo  "<button class=\"btn btn-primary\"><a href=\"page.php?id=".$page["id"]."\">Read More</a></button>";
   echo  "</div>";
}
?>