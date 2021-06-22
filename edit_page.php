<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./include/style.css">
    <title>CMS Blog Admin</title>
</head>

<body class="vh-100">
    <header class="header shadow">
        <div class="flex-grow-1">
            <h1 class="header-title"><a href="./index.php">Blog CMS Admin</a></h1>
        </div>
        <div class="d-flex justify-content-end h-100">
            <a class="header-item" href="./admin.php">Home</a>
            <a class="header-item" href="./logout.php">Logout</a>
        </div>
    </header>
    <div class="container">
        <div class="card shadow">
            <form>
                <div class="mb-10">
                    <input class="input w-100">
                </div>
                <div class="mb-10">
                    <textarea class="input w-100" rows="10"></textarea>
                </div>
            </form>
        </div>
    </div>
</body>

</html>