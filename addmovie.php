<?php
if (isset($_GET["id"])) {
    echo "good";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>ADD OR MODIFY MOVIE</h1>
    <br>
    <form action="" method="post">
        <label>Title</label>
        <input type="text">
        <br>
        <label>Release Year</label>
        <input type="text">
        <br>
        <label>Description</label>
        <input type="textarea">
        <br>
        <label for="">PosterPath</label>
        <input type="text">
        <br>
        <label for="">Category</label>
        <input type="text" id='category'>
        <br>


        <?php
        if (isset($_GET["id"])) {
            echo '<input type="submit" name="modify" value="Modify the movie">';
        } else {
            echo '<input type="submit" name="add" value="Add a new movie">';
        }

        ?>

    </form>

</body>

</html>