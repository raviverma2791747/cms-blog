<footer class="footer">
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