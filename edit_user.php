<?php require_once("./include/connection.php");?>
<?php require_once("./include/functions.php")?>
<?php require_once("./include/session.php"); ?>

<?php logged_in(); ?>
<?php 
$username = null;
if(isset($_POST["submit"])){
    $id=$_GET["id"];
    $username =  safe_string($_POST["username"]);
    $password = safe_string($_POST["password"]);
    if($username == "" || $password == "" ){
        alert("Username or password empty");
    }else if(strlen($username) < 4 || strlen($password) < 8){
        alert("Username or password too short!");
    }
    else if(strlen($password) > 30 || strlen($username) >30 ){
        alert("Username or passwor too long!");
    }
    else{
        $password = password_hash($password,PASSWORD_BCRYPT);
        $query = "UPDATE users SET username='{$username}', password='{$password}' WHERE id={$id};";
        $result = $con->query($query);
        if($result){
            alert("User updated successfully!");
        }else{
           alert("failed to update user!");
        }
    }
}else if(isset($_GET["id"])){
    $id = $_GET["id"];
    $result = get_user($_GET["id"]);
    $username = $result->fetch_assoc()["username"];
}else {
    redirect("./user.php");
}
?>

<?php require_once("./include/admin_header.php"); ?>

<div class="container d-flex justify-content-center align-items-center">
    <div class="card shadow">
        <form action="./edit_user.php?id=<?php echo ($id);?>" method="post">
            <div class="mb-5">
                <h2 class="text-center">Edit User</h2>
            </div>
            <div class="mb-5">
                <input class="input mb-5  w-100" type="text" name="username" placeholder="username" value="<?php echo $username;?>">
                <small>Username must be min 4  and max 30 characters long</small>
            </div>
            <div class="mb-5">
                <input class="input w-100 mb-5" type="password" name="password" placeholder="password">
                <small>Password must be min 8  and max 30 characters long</small>
            </div>
            <div>
                <input class="btn btn-primary" type="submit" name="submit" value="Update">
                <button class="btn btn-primary"><a href="./user.php">Cancel</a></button>
            </div>
        </form>
    </div>
</div>

<?php require_once("./include/admin_footer.php") ?>