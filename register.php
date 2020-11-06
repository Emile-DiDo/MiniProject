<?php
require_once "databas.php";
$error = "";
$email = "";
$pass = "";
$passCheck = "";
$fname = "";
$lname = "";
$found = false;
$founde = false;
$foundp = false;
$foundf = false;
$foundl = false;
$foundcheck = false;
if ($conn) {
    $query = "SELECT * FROM users";
    if (isset($_POST["login"])) {
        $error = "";
        $results = mysqli_query($conn, $query);
        $pass = htmlspecialchars(trim($_POST["pass"]));
        $passCheck = htmlspecialchars(trim($_POST["passCheck"]));
        $hashedpass = password_hash($pass, PASSWORD_DEFAULT);
        $email = strip_tags(trim($_POST["email"]));
        $fname = strip_tags(trim($_POST["firstName"]));
        $lname = strip_tags(trim($_POST["lastName"]));

        if ($email == "") {
            $founde = true;
        } elseif ($fname == "") {
            $foundf = true;
        } elseif ($lname == "") {
            $foundl = true;
        } elseif ($pass == "") {
            $foundp = true;
        } else {
            while ($db_records = mysqli_fetch_assoc($results)) {
                if ($email == $db_records["email"]) {
                    $found = true;
                }
            }
        }
        if ($foundf) {
            $error = "Please insert your Firstname.";
        }
        if ($foundl) {
            $error = "Please insert your Lastname.";
        }
        if ($founde) {
            $error = "Please insert a Email.";
        } else if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Please insert a valid Email.";
        }
        if ($foundp) {
            $error = "Please insert your Password.";
        }
        if (!$found) {
            $query2 = "INSERT INTO users (firstName, lastName, email, password) VALUES ( '" . $name . "','" .  $email . "', '" .  $hashedpass .  "')";
            $results = mysqli_query($conn, $query2);
            header("Location: login.php");
        } else {
            $error = "NO UNIQUE USER";
        }
    }
} else {
    echo "<h1>NOT CONNECTED</h1>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .alert {
            color: red;
        }
    </style>
</head>

<body>
    <h1>REGISTER NEW ACCOUNT</h1>
    <h2 class="alert"><?= $error ?></h2>
    <form action="" method="post">
        <input type="text" name="firstName" value="<?= $fname ?>" placeholder="Please insert your Firstname">
        <br>
        <input type="text" name="lastName" value="<?= $lname ?>" placeholder="Please insert your Firstname">
        <br>
        <input type="email" name="email" value="<?= $email ?>" placeholder="Please insert your Firstname">
        <br>
        <input type="password" name="pass" value="<?= $pass ?>" placeholder="Please insert your Firstname">
        <br>
        <input type="password" name="passCheck" value="<?= $passCheck ?>" placeholder="Please insert your Firstname">
        <br>
        <input type="submit" name="login" value="REGISTER">
    </form>
    <br><br>
    <form action="login.php" method="post">
        <input type="submit" value="Login">
    </form>
</body>

</html>