<?php

$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$country = filter_input(INPUT_GET, "country", FILTER_SANITIZE_STRING);
$requested_country = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$results = $requested_country->fetchAll(PDO::FETCH_ASSOC);

?>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' .  $row['head_of_state']; ?></li>
<?php endforeach;?>
