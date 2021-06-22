<?php require_once("./include/connection.php");?>
<?php require_once("./include/functions.php")?>

<?php 

if(isset($_POST["submit"])){
    $date = date("Y-m-d");
    $name = safe_string($_POST["name"]);
    $email = safe_string($_POST["email"]);
    $message =  safe_string(($_POST["message"]));

    if($name == "" || $email == "" || $message == ""){
        alert("Empty name,email or message");
    }else{
        $query = "INSERT INTO contact (date,name,email,message) VALUES ('{$date}','{$name}','{$email}','{$message}') ";

        $result = $con->query($query);

        if($result){
            alert("Form submitted!");
        }else{
            alert("Failed to submit form");
        }
    }
}
?>

<?php require_once("./include/header.php") ?>

<div class="d-flex justify-content-center ">
    <form action="./contact.php" method="post" id="contact-form" class="mb-10 card shadow d-flex flex-column text-center">
        <div class="mb-5">
            <h2 class="text-center">Contact</h2>
        </div>
        <div class="mb-5">
            <input class="input w-100" type="text" name="name" placeholder="name">
        </div>
        <div class="mb-5">
            <input class="input w-100" type="text" name="email" placeholder="email">
        </div>
        <div class="mb-5">
            <textarea class="input w-100" name="message" placeholder="message" rows="10" style="resize: none;"></textarea>
        </div>
        <div>
            <input class="btn btn-primary" type="submit" name="submit">
        </div>
    </form>
</div>


<?php require_once("./include/footer.php") ?>