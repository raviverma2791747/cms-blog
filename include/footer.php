<footer  class="footer">
    <form class="card shadow" name="subscribe" action="./subscribe.php" method="post" onsubmit="return subscribe(event)">
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
</footer>
<script>
    function subscribe(event){
        event.preventDefault();
      // let form =  document.forms["subscibe"];
     //  let email = form["email"].value();
       //alert(email);
       return false;
    }
</script>
</body>
</html>