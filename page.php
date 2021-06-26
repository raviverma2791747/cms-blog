<?php require_once("./include/connection.php");?>
<?php require_once("./include/functions.php");?>


<?php require_once("./include/header.php")?>

<?php 

if(isset($_GET["id"])){
  $id = $_GET["id"];
  $result =  get_page($id);
  $page = $result->fetch_assoc();
  $res = get_user($page["author"]);
  $author="";
  if ($res->num_rows) {
      $author = $res->fetch_assoc()["username"];
  }

}else{
  redirect("./index.php");
}
?>
<div class="container-fluid d-flex justify-content-center">

<div class="page card shadow">
  <h1><?php echo $page["heading"];?></h1>
  <span><small><time datetime="<?php echo $page["date"];?>"><?php echo nl2br(stripslashes($page["date"]));?></time></small></span><br>
  <span><em><?php echo $author; ?></em></span>
  <hr class="mb-5">
  <p><pre><?php echo $page["content"];?></pre></p>
  </section>
</div>

</div>

<footer class="footer shadow position-static">
    <div class="subscribe mb-5">
        <form id="subscribe" class="card shadow" name="subscribe" action="./subscribe.php" method="post">
            <div class="mb-5">
                <h3 class="text-center">Get Latest Updates!</h3>
            </div>
            <div class="mb-5">
                <input class="input text-center" type="text" name="email" placeholder="email">
            </div>
            <div>
                <input class="btn btn-primary w-100" type="submit" name="submit" value="Subscribe">
            </div>
        </form>
    </div>
    <div class="w-100 bg-primary text-white text-center">
       &copy; Blog CMS, All rights reserved | <a href="./login.php">Admin Login</a>
    </div>
</footer>
<script>
    document.getElementById("subscribe").onsubmit = (event) => {
        //event.preventDefault();
        let form = document.forms["subscribe"];
        let email =  form["email"].value;
        if(email == ""){
            alert("Email is empty!");
        }else {
            let validEmail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            if(validEmail.test(email)){
                return true;
            }else{
                alert("Invalid Email!");
            }
        }
        return false;
    }
</script>
</body>

</html>