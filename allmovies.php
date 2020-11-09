<?php
require_once "database.php";
$query = "SELECT SUBSTRING(description, 1, 30) as descriptionCut, id, title, poster FROM movies";
$result = mysqli_query($conn, $query);
$movies = mysqli_fetch_all($result, MYSQLI_ASSOC);
$object = json_encode($movies, JSON_PRETTY_PRINT);
echo $object;
