<?php
session_start();
if (isset($_POST['logout'])) {
    // session_unset();
    unset($_SESSION);
    header("Location: login.php");
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <nav>
        <ul>

            <li>
                <a href="#home.php" class="box">HOME </a>
                <a href="categories.php" class="box">CATEGORIES </a>
                <!--<a href="insert.php" class='not_visible'>ADD_MOVIES </a> -->
                <button class="disable">ADD MOVIES</button>
            </li>
            <li>
                <!-- <a href="" class="box">Login</a>
                <a href="" class="box">Register</a>  -->
                <form action="" method='POST'>
                    <input type="submit" value="LOGOUT" name='logout'>
                </form>

            </li>

        </ul>
        <hr>
        <hr>
    </nav>

</body>

</html>