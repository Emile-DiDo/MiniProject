<?php
$conn = mysqli_connect('localhost', 'root', '', 'miniproject', 3307);
$query = "SELECT name, COUNT(*) FROM movies JOIN categories WHERE movies.category_id=categories.id GROUP BY CATEGORIES.name ";
$results = mysqli_query($conn, $query);
while ($db_record = mysqli_fetch_assoc($results)) {

    echo '<p>';
    echo   $db_record['name']  . '(' . $db_record['COUNT(*)'] . ')';
    echo '</p>';
}
