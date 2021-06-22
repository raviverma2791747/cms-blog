<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./include/style.css">
    <title>Blog CMS Login</title>
</head>

<?php require_once("./include/connection.php");?>
<?php require_once("./include/functions.php");?>
<?php require_once("./include/session.php");?>

<?php 
if(isset($_POST["submit"])){
    $username =  safe_string($_POST["username"]);
    $password = safe_string($_POST["password"]);
    if($username == "" || $password == "" ){
        alert("Username or password empty");
    }else{

        $query = "SELECT * FROM users WHERE username='{$username}' LIMIT 1";
        $result = $con->query($query);
        if($result->num_rows == 0){
            alert("Invalid user!");
        }else{
            $row = $result->fetch_assoc();
            if(password_verify($password,$row["password"])){
                $_SESSION["id"] = $row["id"];
                $_SESSION["username"] = $row["username"];
                redirect("./admin.php");
            }else{
                alert("Password didn't match");
            }
        }
    }
}else if(isset($_SESSION["id"])){
    redirect("./admin.php");
} 
?>
<body class="vh-100">
    <div class="container d-flex justify-content-center align-items-center h-100">
        <div class="card shadow">
            <form action="./login.php" method="post">
                <div class="mb-5">
                    <h2 class="text-center">Blog CMS Admin Login</h2>
                </div>
                <div class="mb-5">
                    <input class="input  w-100" type="text" name="username" placeholder="username">
                </div>
                <div class="mb-5">
                    <input class="input w-100" type="password" name="password" placeholder="password">
                </div>
                <div>
                    <input class="btn btn-primary" type="submit" name="submit" value="Login">
                </div>
            </form>
        </div>
    </div>
</body>

</html>