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

<?php require_once("./include/footer.php")?>
